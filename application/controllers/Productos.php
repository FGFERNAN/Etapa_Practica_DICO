<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->model('Estado_model');
    }


    public function index()
    {
        $data['productos'] = $this->Producto_model->getAll();
        $this->load->view('productos/index', $data);    
    }

    public function crear()
    {
        $data['estados'] = $this->Estado_model->getAll();
        $this->load->view('productos/crear', $data);
    }

    public function guardar()
    {
        $data = [
            'nombre' => $this->input->post('nombre'),
            'precio' => $this->input->post('precio'),
            'descripcion' => $this->input->post('descripcion'),
            'stock' => $this->input->post('stock'),
            'imagen' => $this->input->post('imagen'),
            'categoriasID' => $this->input->post('categoriasID'),
            'proveedoresID' => $this->input->post('proveedoresID'),
            'estadoID' => $this->input->post('estadoID')
        ];
        $this->Producto_model->create($data);
        redirect('productos');
    }

    public function editar($id)
    {
        $data['estados'] = $this->Estado_model->getAll();
        $data['producto'] = $this->Producto_model->getById($id);
        $this->load->view('productos/editar', $data);
    }

    public function actualizar($id)  {
        $data = [
            'nombre' => $this->input->post('nombre'),
            'precio' => $this->input->post('precio'),
            'descripcion' => $this->input->post('descripcion'),
            'stock' => $this->input->post('stock'),
            'imagen' => $this->input->post('imagen'),
            'categoriasID' => $this->input->post('categoriasID'),
            'proveedoresID' => $this->input->post('proveedoresID'),
            'estadoID' => $this->input->post('estadoID')
        ];

        $this->Producto_model->update($id, $data);
        redirect('productos');
    }

    public function eliminar($id) {
        $this->Producto_model->delete($id);
        redirect('productos');
    }
}
