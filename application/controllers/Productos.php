<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
    public function index() {
        $this->load->view('productos/index');
    }

    public function crear() {
        $this->load->view('productos/crear');
    }

    public function editar() {
        $this->load->view('productos/editar');
    }
}
?>