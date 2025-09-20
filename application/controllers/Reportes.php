<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_model');
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
        $data['operaciones'] = $this->Reporte_model->get_all($filtros);
        $data['tipo_operacion'] = $this->Reporte_model->get_all_operations();
        $this->load->view('reportes/index', $data);
    }

    public function filtrar()
    {
        // El 3 representa el tercer segmento de la URL (1=reportes, 2=filtrar, 3=Actualización%20Producto)
        $tipo_operacion_url = $this->uri->segment(3);

        // Ahora decodificamos el valor para restaurar los espacios
        $tipo_operacion_limpio = urldecode($tipo_operacion_url);
        $data['operaciones'] = $this->Reporte_model->filter_by_operation($tipo_operacion_limpio);
        $data['tipo_operacion'] = $this->Reporte_model->get_all_operations();
        $this->load->view('reportes/index', $data);
    }
}
