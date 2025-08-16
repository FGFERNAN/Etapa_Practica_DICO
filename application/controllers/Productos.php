<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->model('Estado_model');
        $this->load->model('Marca_model');
        $this->load->model('Categoria_model');
        $this->load->model('Proveedor_model');
    }


    public function index()
    {
        $data['productos'] = $this->Producto_model->getAll();
        $data['categorias'] = $this->Categoria_model->getAll();
        $this->load->view('productos/index', $data);
    }

    public function filtrar($id) {
        $data['productos'] = $this->Producto_model->filterCategory($id);
        $data['categorias'] = $this->Categoria_model->getAll();
        $this->load->view('productos/index', $data);
    }

    public function papelera()
    {
        $data['productos'] = $this->Producto_model->getInactive();
        $this->load->view('productos/papelera', $data);
    }

    public function crear()
    {
        $data['estados'] = $this->Estado_model->getAllStateProduct();
        $data['marca'] = $this->Marca_model->getAll();
        $data['categorias'] = $this->Categoria_model->getAllCategoriesForProducts();
        $data['proveedores'] = $this->Proveedor_model->getAllProveedoresForProducts();
        $this->load->view('productos/crear', $data);
    }

    public function guardar()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('id_marca', 'Marca', 'required');
        $this->form_validation->set_rules('precio_compra', 'Precio Compra', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('lote', 'Lote', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('id_categorias', 'Categorias', 'required');
        $this->form_validation->set_rules('id_proveedores', 'Proveedores', 'required');
        $this->form_validation->set_rules('id_estado_producto', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateProduct();
            $data['marca'] = $this->Marca_model->getAll();
            $data['categorias'] = $this->Categoria_model->getAllCategoriesForProducts();
            $data['proveedores'] = $this->Proveedor_model->getAllProveedoresForProducts();
            $this->load->view('productos/crear', $data);
        } else {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'id_marca' => $this->input->post('id_marca'),
                'descripcion' => $this->input->post('descripcion'),
                'precio_compra' => $this->input->post('precio_compra'),
                'precio_venta' => $this->input->post('precio_venta'),
                'stock' => $this->input->post('stock'),
                'lote' => $this->input->post('lote'),
                'imagen' => $this->input->post('imagen'),
                'id_categorias' => $this->input->post('id_categorias'),
                'id_proveedores' => $this->input->post('id_proveedores'),
                'id_estado_producto' => $this->input->post('id_estado_producto')
            ];

            $this->Producto_model->create($data);
            redirect('productos');
        }
    }

    public function editar($id)
    {
        $data['estados'] = $this->Estado_model->getAllStateProduct();
        $data['marca'] = $this->Marca_model->getAll();
        $data['producto'] = $this->Producto_model->getById($id);
        $data['categorias'] = $this->Categoria_model->getAllCategoriesForProducts();
        $data['proveedores'] = $this->Proveedor_model->getAllProveedoresForProducts();
        $this->load->view('productos/editar', $data);
    }

    public function actualizar($id)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('id_marca', 'Marca', 'required');
        $this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('id_categorias', 'Categorias', 'required');
        $this->form_validation->set_rules('id_proveedores', 'Proveedores', 'required');
        $this->form_validation->set_rules('id_estado_producto', 'Estado', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateProduct();
            $data['marca'] = $this->Marca_model->getAll();
            $data['producto'] = $this->Producto_model->getById($id);
            $data['categorias'] = $this->Categoria_model->getAllCategoriesForProducts();
            $data['proveedores'] = $this->Proveedor_model->getAllProveedoresForProducts();
            $this->load->view('productos/editar', $data);
        } else {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'id_marca' => $this->input->post('id_marca'),
                'descripcion' => $this->input->post('descripcion'),
                'precio_venta' => $this->input->post('precio_venta'),
                'stock' => $this->input->post('stock'),
                'imagen' => $this->input->post('imagen'),
                'id_categorias' => $this->input->post('id_categorias'),
                'id_proveedores' => $this->input->post('id_proveedores'),
                'id_estado_producto' => $this->input->post('id_estado_producto')
            ];

            $this->Producto_model->update($id, $data);
            redirect('productos');
        }
    }

    public function activar($id)
    {
        $data = ['id_estado_producto' => 1];
        $this->Producto_model->update($id, $data);
        redirect('productos');
    }

    public function eliminacionLogica($id)
    {
        $data = ['id_estado_producto' => 2];
        $this->Producto_model->update($id, $data);
        redirect('productos');
    }

    public function eliminacionFisica($id)
    {
        $this->Producto_model->delete($id);
        redirect('productos/papelera');
    }
}
