<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Compra_model');
        $this->load->model('Proveedor_model');
        $this->load->model('Producto_model');
    }

    public function index()
    {
        $data['compras'] = $this->Compra_model->getAllCompras();
        $data['proveedores'] = $this->Proveedor_model->getAll();
        $this->load->view('compras/index', $data);
    }

    public function filtrar($id_proveedor) {
        $data['compras'] = $this->Compra_model->filterProveedor($id_proveedor);
        $data['proveedores'] = $this->Proveedor_model->getAll();
        $this->load->view('compras/index', $data);
    }

    public function detalle($id_compra)
    {
        $data['detalle'] = $this->Compra_model->verDatelleCompra($id_compra);
        $this->load->view('compras/detalle', $data);
    }

    public function realizar($proveedor_id = null)
    {
        $data['proveedores'] = $this->Proveedor_model->getAll();
        $data['productos'] = $this->Producto_model->filterProveedor($proveedor_id);
        $data['proveedor_id'] = $proveedor_id;
        $this->load->view('compras/realizar', $data);
    }

    public function guardar()
    {
        $this->form_validation->set_rules('id_proveedores', 'Proveedor', 'required');
        // Validar cada lote individualmente
        $lotes = $this->input->post('lote');

        if (is_array($lotes)) {
            foreach ($lotes as $index => $lote) {
                if (!empty($lote)) {
                    $this->form_validation->set_rules(
                        "lote[$index]",
                        "Lote",
                        'required|trim|is_unique[detalle_compra.lote]',
                        array(
                            'is_unique' => 'El lote "' . $lote . '" ya existe. Los lotes deben ser únicos.'
                        )
                    );
                }
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $proveedor_id = $this->input->post('id_proveedores');
            $data['proveedor_id'] = $proveedor_id;
            $data['productos'] = $this->Producto_model->filterProveedor($proveedor_id);
            $data['proveedores'] = $this->Proveedor_model->getAll();
            $this->load->view('compras/realizar', $data);
        } else {
            // Datos de la compra
            $compra_data = [
                'id_proveedores' => $this->input->post('id_proveedores'),
                'total' => $this->input->post('total'),
            ];

            // Insertar compra principal
            $id_compra = $this->Compra_model->createCompra($compra_data);


            // Procesar detalles de productos
            $productos_ids = $this->input->post('ids_productos');
            $cantidades = $this->input->post('cantidad');
            $precios = $this->input->post('precio_unitario');
            $lotes = $this->input->post('lote');
            $fechas_vencimiento = $this->input->post('fecha_vencimiento');


            if (is_array($productos_ids)) {
                for ($i = 0; $i < count($productos_ids); $i++) {
                    if (!empty($productos_ids[$i]) && !empty($cantidades[$i]) && !empty($precios[$i])) {
                        $detalle_data = [
                            'cantidad' => $cantidades[$i],
                            'precio_unitario' => $precios[$i],
                            'id_compras' => $id_compra,
                            'id_productos' => $productos_ids[$i],
                            'lote' => $lotes[$i],
                            'fecha_vencimiento' => $fechas_vencimiento[$i],
                        ];

                        $this->Compra_model->createDetalleCompra($detalle_data);

                        // Actualizar stock del producto
                        $this->Producto_model->actualizar_stock($productos_ids[$i], $cantidades[$i]);
                    }
                }
            }
            redirect('compras');
        }
    }
}
