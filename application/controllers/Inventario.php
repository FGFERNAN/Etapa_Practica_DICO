<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventario extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Inventario_model');
        $this->load->model('Categoria_model');
        $this->load->model('Producto_model');
    }

    public function index() {
        $data['productos'] = $this->Inventario_model->getAll();
        $data['categorias'] = $this->Categoria_model->getAll();
        $this->load->view('inventario/index', $data);
    }

    public function filtrar($id) {
        $data['productos'] = $this->Producto_model->filterCategory($id);
        $data['categorias'] = $this->Categoria_model->getAll();
        $this->load->view('inventario/index', $data);
    }
}

?>