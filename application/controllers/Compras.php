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
        $this->load->view('compras/index', $data);
    }

    public function detalle($id_compra) {
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


        if ($this->form_validation->run() == FALSE) {
            $data['proveedores'] = $this->Proveedor_model->getAll();
            $this->load->view('compras/realizar', $data);
        } else {
            // Datos de la compra
            $compra_data = [
                'id_proveedores' => $this->input->post('id_proveedores'),
                'total' => $this->input->post('total')
            ];

            // Insertar compra principal
            $id_compra = $this->Compra_model->createCompra($compra_data);


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
                            'id_compras' => $id_compra,
                            'id_productos' => $productos_ids[$i],
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
