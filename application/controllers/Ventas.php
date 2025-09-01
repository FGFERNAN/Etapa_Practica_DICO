<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('Proveedor_model');
        $this->load->model('Producto_model');
    }

    public function index()
    {
        // 1. Recoger las fechas desde la URL (método GET)
        $fecha_inicio = $this->input->get('fecha_inicio');
        $fecha_fin = $this->input->get('fecha_fin');

        // 2. Crear un array de filtros para pasarlo al modelo
        $filtros = [
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];

        // 3. Pedir los datos al modelo, pasándole los filtros
        $data['ventas'] = $this->Venta_model->getVentasConFiltros($filtros);
        $this->load->view('ventas/index', $data);
    }

    public function detalle($id_venta)
    {
        $data['detalle'] = $this->Venta_model->verDatelleVenta($id_venta);
        $this->load->view('ventas/detalle', $data);
    }

    public function facturar()
    {
        $data['productos'] = $this->Producto_model->filterStock();
        $this->load->view('ventas/facturar', $data);
    }


    public function guardar()
    {
        $this->form_validation->set_rules('cliente', 'Cliente', 'required|alpha');

        $productos_ids = $this->input->post('ids_productos');
        $cantidades = $this->input->post('cantidad');

        if (is_array($productos_ids) && is_array($cantidades)) {
            foreach ($cantidades as $index => $cantidad) {
                if (!empty($cantidad) && !empty($productos_ids[$index])) {
                    $id_producto = $productos_ids[$index];
                    $producto_db = $this->Producto_model->getById($id_producto);
                    $stock_real = $producto_db ? $producto_db->stock : 0; 
                    $this->form_validation->set_rules(
                        "cantidad[$index]",
                        "Cantidad del producto '" . ($producto_db ? $producto_db->nombre : 'Desconocido') . "'", 
                        'required|integer|greater_than[0]|less_than_equal_to[' . $stock_real . ']',
                        array(
                            'less_than_equal_to' => 'La cantidad excede el stock disponible (' . $stock_real . ').'
                        )
                    );
                }
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $data['productos'] = $this->Producto_model->filterStock();
            $this->load->view('ventas/facturar', $data);
        } else {
            // Datos de la compra
            $venta_data = [
                'cliente' => $this->input->post('cliente'),
                'total' => $this->input->post('total'),
            ];

            // Insertar compra principal
            $id_venta = $this->Venta_model->createVenta($venta_data);


            // Procesar detalles de productos
            $productos_ids = $this->input->post('ids_productos');
            $cantidades = $this->input->post('cantidad');
            $precios = $this->input->post('precio_unitario');


            if (is_array($productos_ids)) {
                for ($i = 0; $i < count($productos_ids); $i++) {
                    if (!empty($productos_ids[$i]) && !empty($cantidades[$i]) && !empty($precios[$i])) {
                        $detalle_data = [
                            'cantidad' => $cantidades[$i],
                            'precio_unitario' => $precios[$i],
                            'id_ventas' => $id_venta,
                            'id_productos' => $productos_ids[$i],
                        ];

                        $this->Venta_model->createDetalleVenta($detalle_data);

                        // Actualizar stock del producto
                        $this->Producto_model->disminuir_stock($productos_ids[$i], $cantidades[$i]);
                    }
                }
            }
            redirect('ventas');
        }
    }
}
