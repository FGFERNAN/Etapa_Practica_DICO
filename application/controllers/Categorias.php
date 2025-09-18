<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
        $this->load->model('Estado_model');
        $this->load->model('Producto_model');
    }

    public function index()
    {
        $data['categorias'] = $this->Categoria_model->getAll();
        $this->load->view('categorias/index', $data);
    }

    public function archivo()
    {
        $data['categorias'] = $this->Categoria_model->getInactive();
        $this->load->view('categorias/archivo', $data);
    }

    public function crear()
    {
        $data['estados'] = $this->Estado_model->getAllStateCategory();
        $this->load->view('categorias/crear', $data);
    }

    public function nombre_categoria_unico($nombre)
    {
        $id = $this->input->post('id_categorias');

        $this->db->where('nombre', $nombre);
        $this->db->where('id_categorias !=', $id);
        $query = $this->db->get('categorias');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('nombre_categoria_unico', 'La categoría "' . $nombre . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function guardar()
    {
        $this->form_validation->set_rules(
            'nombre',
            'Nombre',
            'required|trim|min_length[3]|max_length[50]|is_unique[categorias.nombre]',
            array(
                'is_unique' => 'La categoría ya existe.',
            )
        );
        $this->form_validation->set_rules('id_estado_categoria', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateCategory();
            $this->load->view('categorias/crear', $data);
        } else {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'id_estado_categoria' => $this->input->post('id_estado_categoria')
            ];

            $this->Categoria_model->create($data);
            redirect('categorias');
        }
    }

    public function editar($id)
    {
        $data['estados'] = $this->Estado_model->getAllStateCategory();
        $data['categoria'] = $this->Categoria_model->getById($id);
        $this->load->view('categorias/editar', $data);
    }

    public function actualizar($id)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]|callback_nombre_categoria_unico');
        $this->form_validation->set_rules('id_estado_categoria', 'Estado', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateCategory();
            $data['categoria'] = $this->Categoria_model->getById($id);
            $this->load->view('categorias/editar', $data);
        } else {
            $id_estado = $this->input->post('id_estado_categoria');
            $cantidad = $this->Categoria_model->getCantidadProductos($id);

            if ($id_estado == 2 || $id_estado == 4 && $cantidad > 0) {
                $this->session->set_flashdata('error', 'No se puede inactivar la categoría porque aún tiene productos asignados.');
                redirect('categorias/editar/' . $id);
                return;
            }

            $data = [
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'id_estado_categoria' => $id_estado
            ];

            $this->Categoria_model->update($id, $data);
            redirect('categorias');
        }
    }

    public function asociar($id)
    {
        $data['categoria'] = $this->Categoria_model->getById($id);
        $data['productos'] = $this->Producto_model->getByCategory($id);
        $this->load->view('categorias/asociar', $data);
    }

    public function asignar($id_categoria)
    {
        $productos_ids = $this->input->post('productos_ids');

        if (!empty($productos_ids)) {
            $this->Categoria_model->asignar_categoria($productos_ids, $id_categoria);
        }
        redirect('categorias');
    }


    public function eliminacionLogica($id)
    {
        $cantidad = $this->Categoria_model->getCantidadProductos($id);

        if ($cantidad > 0) {
            $this->session->set_flashdata('error', 'No se puede eliminar la categoría porque aún tiene productos asignados.');
        } else {
            $data = ['id_estado_categoria' => 2];
            $this->Categoria_model->update($id, $data);
        }
        redirect('categorias');
    }

    /*
    public function eliminacionFisica($id)
    {
        $this->Categoria_model->delete($id);
        redirect('categorias/papelera');
    }
    */

    public function activar($id)
    {
        $data = ['id_estado_categoria' => 1];
        $this->Categoria_model->update($id, $data);
        redirect('categorias');
    }
}
