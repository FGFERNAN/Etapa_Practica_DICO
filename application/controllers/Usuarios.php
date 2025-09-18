<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Estado_model');
    }

    public function index()
    {
        $data['usuarios'] = $this->Usuario_model->get_all();
        $this->load->view('usuarios/index', $data);
    }

    public function archivo()
    {
        $data['usuarios'] = $this->Usuario_model->get_inactive();
        $this->load->view('usuarios/archivo', $data);
    }

    public function crear()
    {
        $data['estados'] = $this->Estado_model->getAllStateUser();
        $data['documentos'] = $this->Usuario_model->get_all_document_types();
        $data['roles'] = $this->Usuario_model->get_all_roles();
        $this->load->view('usuarios/crear', $data);
    }

    public function guardar()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|min_length[15]|valid_email|is_unique[usuarios.email]',
            array(
                'is_unique' => 'El email ya existe.'
            )
        );
        $this->form_validation->set_rules(
            'telefono',
            'Telefono',
            'required|trim|exact_length[10]|numeric|is_unique[usuarios.telefono]',
            array(
                'is_unique' => 'El telefono ya existe.'
            )
        );
        $this->form_validation->set_rules(
            'contrasena',
            'Contraseña',
            'required|trim|min_length[6]|max_length[8]|regex_match[/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,8})\S$/]',
            array(
                'regex_match' => 'La contraseña debe tener al entre 6 y 8 caracteres, al menos una mayúscula, una minúscula y un número.'
            )
        );
        $this->form_validation->set_rules('id_roles', 'Roles', 'required');
        $this->form_validation->set_rules('id_estado_usuario', 'Estado', 'required');
        $this->form_validation->set_rules('id_tipo_documento', 'Tipo Documento', 'required');
        $this->form_validation->set_rules(
            'id_usuarios',
            'N° Documento',
            'required|exact_length[10]|numeric|is_unique[usuarios.id_usuarios]',
            array(
                'is_unique' => 'El numero de documento ya existe.'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data['estados'] = $this->Estado_model->getAllStateUser();
            $data['documentos'] = $this->Usuario_model->get_all_document_types();
            $data['roles'] = $this->Usuario_model->get_all_roles();
            $this->load->view('usuarios/crear', $data);
        } else {
            $password_hash = password_hash($this->input->post('contrasena'), PASSWORD_DEFAULT);
            $data = [
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                'telefono' => $this->input->post('telefono'),
                'contrasena' => $password_hash,
                'id_roles' => $this->input->post('id_roles'),
                'id_estado_usuario' => $this->input->post('id_estado_usuario'),
                'id_tipo_documento' => $this->input->post('id_tipo_documento'),
                'id_usuarios' => $this->input->post('id_usuarios')
            ];

            $this->Usuario_model->insert($data);
            redirect('usuarios');
        }
    }

    public function editar($id)
    {
        $data['usuario'] = $this->Usuario_model->get_by_id($id);
        $data['estados'] = $this->Estado_model->getAllStateUser();
        $data['documentos'] = $this->Usuario_model->get_all_document_types();
        $data['roles'] = $this->Usuario_model->get_all_roles();
        $this->load->view('usuarios/editar', $data);
    }

    public function email_usuario_unico($email)
    {
        $id = $this->input->post('id_usuarios');
        $this->db->where('email', $email);
        $this->db->where('id_usuarios !=', $id);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_usuario_unico', 'El email "' . $email . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function telefono_usuario_unico($telefono)
    {
        $id = $this->input->post('id_usuarios');
        $this->db->where('telefono', $telefono);
        $this->db->where('id_usuarios !=', $id);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('telefono_usuario_unico', 'El telefono "' . $telefono . '" ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function actualizar($id)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|min_length[15]|valid_email|callback_email_usuario_unico'
        );
        $this->form_validation->set_rules(
            'telefono',
            'Telefono',
            'required|trim|exact_length[10]|numeric|callback_telefono_usuario_unico'
        );
        $this->form_validation->set_rules('id_roles', 'Roles', 'required');
        $this->form_validation->set_rules('id_estado_usuario', 'Estado', 'required');
        $this->form_validation->set_rules('id_tipo_documento', 'Tipo Documento', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['usuario'] = $this->Usuario_model->get_by_id($id);
            $data['estados'] = $this->Estado_model->getAllStateUser();
            $data['documentos'] = $this->Usuario_model->get_all_document_types();
            $data['roles'] = $this->Usuario_model->get_all_roles();
            $this->load->view('usuarios/editar', $data);
        } else {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                'telefono' => $this->input->post('telefono'),
                'id_roles' => $this->input->post('id_roles'),
                'id_estado_usuario' => $this->input->post('id_estado_usuario'),
                'id_tipo_documento' => $this->input->post('id_tipo_documento'),
            ];
            $this->Usuario_model->update($id, $data);
            redirect('usuarios');
        }
    }

    public function eliminacion_logica($id) {
        $data = ['id_estado_usuario' => 2];
        $this->Usuario_model->update($id, $data);
        redirect('usuarios');
    }

    /*
    public function eliminacion_fisica($id) {
        $this->Usuario_model->delete($id);
        redirect('usuarios/papelera');
    }
    */

    public function activar($id)
    {
        $data = ['id_estado_usuario' => 1];
        $this->Usuario_model->update($id, $data);
        redirect('usuarios');
    }
}
