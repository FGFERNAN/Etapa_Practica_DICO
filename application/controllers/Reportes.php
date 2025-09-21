<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Importar la clase Dompdf al principio del archivo
use Dompdf\Dompdf;
use Dompdf\Options;
class Reportes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_model');
    }

    public function index()
    {
        // 1. Cargar la librería de paginación
        $this->load->library('pagination');

        // 2. Recoger las fechas desde la URL (método GET)
        $fecha_inicio = $this->input->get('fecha_inicio');
        $fecha_fin = $this->input->get('fecha_fin');

        // 3. Crear un array de filtros para pasarlo al modelo
        $filtros = [
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];

        // 3. Configuración de la paginación
        $config['base_url']    = base_url('reportes/index');
        $config['total_rows']  = $this->Reporte_model->contar_operaciones($filtros);
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
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // 4. Pedir los datos al modelo, pasándole los filtros
        $data['operaciones'] = $this->Reporte_model->get_all_pagination($config['per_page'], $offset, $filtros);
        $data['tipo_operacion'] = $this->Reporte_model->get_all_operations();

        // 8. Crear los enlaces y pasarlos a la vista
        $data["links"] = $this->pagination->create_links();
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

    public function exportar_pdf()
    {

        // 1. Cargar la librería Dompdf
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        // 2. Recoger las fechas desde la URL (método GET)
        $fecha_inicio = $this->input->get('fecha_inicio');
        $fecha_fin = $this->input->get('fecha_fin');

        // 3. Crear un array de filtros para pasarlo al modelo
        $filtros = [
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];

        $data['operaciones'] = $this->Reporte_model->get_all($filtros);

        // 4. Cargar la vista de la factura en una variable
        //    El tercer parámetro `TRUE` hace que la vista se devuelva como una cadena de texto
        $html = $this->load->view('reportes/reporte_operaciones_pdf', $data, TRUE);

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE); // Permite cargar imágenes/CSS externos si los tuvieras
        $dompdf = new Dompdf($options);

        // 5. Cargar, renderizar y enviar el PDF al navegador
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // 'landscape' (horizontal) es mejor para tablas anchas
        $dompdf->render();

        $nombre_archivo = "reporte_operaciones_" . date("Y-m-d") . ".pdf";
        $dompdf->stream($nombre_archivo, array("Attachment" => false));
    }
}
