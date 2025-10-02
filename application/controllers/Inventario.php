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
        // 1. Cargar la librería de paginación
        $this->load->library('pagination');

        // 3. Configuración de la paginación
        $config['base_url']    = base_url('inventario/index');
        $config['total_rows']  = $this->Inventario_model->contar_operaciones();
        $config['per_page']    = 20; // 20 registros por página
        $config['uri_segment'] = 3;  // El segmento de la URL donde está el número de página

        // Para que los filtros funcionen con la paginación
        $config['reuse_query_string'] = TRUE; 

        // 4. (Opcional pero recomendado) Estilos para Bootstrap 5
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'Primero';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Último';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        // 5. Inicializar la paginación
        $this->pagination->initialize($config);

        // 6. Obtener el offset (desde qué registro empezar)
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data['productos'] = $this->Inventario_model->get_all_pagination($config['per_page'], $offset);
        $data['categorias'] = $this->Categoria_model->getAll();
        $data['links'] = $this->pagination->create_links();
        $this->load->view('inventario/index', $data);
    }

    public function filtrar($id) {
        $this->load->library('pagination');
        $data['productos'] = $this->Producto_model->filterCategory($id);
        $data['categorias'] = $this->Categoria_model->getAll();
        $data['links'] = $this->pagination->create_links();
        $this->load->view('inventario/index', $data);
    }
}

?>