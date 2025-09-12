<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedores extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proveedor_model');
        $this->load->model('Estado_model');
        $this->load->model('Producto_model');
    }

    public function index()
    {
        $data['proveedores'] = $this->Proveedor_model->getAll();
        $this->load->view('proveedores/index', $data);
    }

    public function papelera()
    {
        $data['proveedores'] = $this->Proveedor_model->getInactive();
        $this->load->view('proveedores/papelera', $data);
    }

    public function crear()
    {
        $data['estados'] = $this->Estado_model->getAllStateProveedor();
        $this->load->view('proveedores/crear', $data);
    }

    public function nombre_proveedor_unico($nombre)
    {
        $id = $this->input->post('id_proveedores');

        $this->db->where('nombre', $nombre);
        $this->db->where('id_proveedores !=', $id);
        $query = $this->db->get('proveedores');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('nombre_proveedor_unico', 'El proveedor "' . $nombre . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function contacto_proveedor_unico($contacto)
    {
        $id = $this->input->post('id_proveedores');

        $this->db->where('contacto', $contacto);
        $this->db->where('id_proveedores !=', $id);
        $query = $this->db->get('proveedores');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('contacto_proveedor_unico', 'El contacto "' . $contacto . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function telefono_proveedor_unico($telefono)
    {
        $id = $this->input->post('id_proveedores');

        $this->db->where('telefono', $telefono);
        $this->db->where('id_proveedores !=', $id);
        $query = $this->db->get('proveedores');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('telefono_proveedor_unico', 'El telefono "' . $telefono . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function nit_proveedor_unico($nit)
    {
        $id = $this->input->post('id_proveedores');

        $this->db->where('nit', $nit);
        $this->db->where('id_proveedores !=', $id);
        $query = $this->db->get('proveedores');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('nit_proveedor_unico', 'El NIT "' . $nit . '" ya existe.');
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
            'required|trim|min_length[3]|max_length[50]|is_unique[proveedores.nombre]',
            array(
                'is_unique' => 'El proveedor ya existe.',
            )
        );
        $this->form_validation->set_rules(
            'contacto',
            'Contacto',
            'required|valid_email|is_unique[proveedores.contacto]',
            array(
                'is_unique' => 'El contacto ya existe.'
            )
        );
        $this->form_validation->set_rules(
            'telefono',
            'Telefono',
            'integer|exact_length[10]|is_unique[proveedores.telefono]',
            array(
                'is_unique' => 'El telefono ya existe.'
            )
        );
        $this->form_validation->set_rules('empresa', 'Empresa', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules(
            'nit',
            'NIT',
            'required|integer|exact_length[9]|is_unique[proveedores.nit]',
            array(
                'is_unique' => 'El NIT ya existe.'
            )
        );
        $this->form_validation->set_rules('id_estado_proveedor', 'Estado', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateProveedor();
            $this->load->view('proveedores/crear', $data);
        } else {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'contacto' => $this->input->post('contacto'),
                'telefono' => $this->input->post('telefono'),
                'empresa' => $this->input->post('empresa'),
                'nit' => $this->input->post('nit'),
                'id_estado_proveedor' => $this->input->post('id_estado_proveedor')
            ];

            $this->Proveedor_model->create($data);
            redirect('proveedores');
        }
    }

    public function editar($id)
    {
        $data['estados'] = $this->Estado_model->getAllStateProveedor();
        $data['proveedor'] = $this->Proveedor_model->getById($id);
        $this->load->view('proveedores/editar', $data);
    }

    public function actualizar($id)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]|callback_nombre_proveedor_unico');
        $this->form_validation->set_rules('contacto', 'Contacto', 'required|valid_email|callback_contacto_proveedor_unico');
        $this->form_validation->set_rules('telefono', 'Telefono', 'integer|exact_length[10]|callback_telefono_proveedor_unico');
        $this->form_validation->set_rules('empresa', 'Empresa', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('nit', 'NIT', 'required|integer|exact_length[9]|callback_nit_proveedor_unico');
        $this->form_validation->set_rules('id_estado_proveedor', 'Estado', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateProveedor();
            $data['proveedor'] = $this->Proveedor_model->getById($id);
            $this->load->view('proveedores/editar', $data);
        } else {
            $id_estado = $this->input->post('id_estado_proveedor');
            $cantidad = $this->Proveedor_model->getCantidadProductos($id);
            if ($id_estado == 2 || $id_estado == 3 || $id_estado == 4 || $id_estado == 5 || $id_estado == 8 || $id_estado == 9 && $cantidad > 0) {
                $this->session->set_flashdata('error', 'No se puede inactivar la categoría porque aún tiene productos asignados.');
                redirect('proveedores/editar/' . $id);
                return;
            }
            $data = [
                'nombre' => $this->input->post('nombre'),
                'contacto' => $this->input->post('contacto'),
                'telefono' => $this->input->post('telefono'),
                'empresa' => $this->input->post('empresa'),
                'nit' => $this->input->post('nit'),
                'id_estado_proveedor' => $id_estado
            ];

            $this->Proveedor_model->update($id, $data);
            redirect('proveedores');
        }
    }

    public function asociar($id)
    {
        $data['proveedor'] = $this->Proveedor_model->getById($id);
        $data['productos'] = $this->Producto_model->getByProveedor($id);
        $data['productos_c'] = $this->Producto_model->getByProveedorContingencia($id);
        $this->load->view('proveedores/asociar', $data);
    }

    public function asignar($id_proveedor)
    {
        $productos_ids = $this->input->post('productos_ids');

        if (!empty($productos_ids)) {
            $this->Proveedor_model->asignar_proveedor($productos_ids, $id_proveedor);
        }
        redirect('proveedores');
    }

    public function asignar_contingencia($id_proveedor)
    {
        $productos_ids = $this->input->post('productos_ids');

        if (!empty($productos_ids)) {
            $this->Proveedor_model->asignar_proveedor_c($productos_ids, $id_proveedor);
        }
        redirect('proveedores');
    }

    public function eliminacionLogica($id)
    {
        $data = ['id_estado_proveedor' => 2];
        $this->Proveedor_model->update($id, $data);
        redirect('proveedores');
    }

    public function eliminacionFisica($id)
    {
        $cantidad = $this->Proveedor_model->getCantidadProductos($id);

        if ($cantidad > 0) {
            $this->session->set_flashdata('error', 'No se puede eliminar el proveedor porque aún tiene productos asignados.');
        } else {
            $this->Proveedor_model->delete($id);
        }
        redirect('proveedores/papelera');
    }

    public function activar($id)
    {
        $data = ['id_estado_proveedor' => 1];
        $this->Proveedor_model->update($id, $data);
        redirect('proveedores/papelera');
    }
}
