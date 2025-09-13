<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Estado_model');
    }

    public function editar_perfil($id)
    {
        if ($this->session->userdata('id_usuarios') != $id) {
            redirect('dashboard');
        }
        $data['usuario'] = $this->Usuario_model->get_by_id($id);
        $data['estados'] = $this->Estado_model->getAllStateUser();
        $data['documentos'] = $this->Usuario_model->get_all_document_types();
        $data['roles'] = $this->Usuario_model->get_all_roles();
        $this->load->view('usuarios/perfil', $data);
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

    public function actualizar_perfil($id)
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
            'trim|exact_length[10]|numeric|callback_telefono_usuario_unico'
        );
        $this->form_validation->set_rules('id_tipo_documento', 'Tipo Documento', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['usuario'] = $this->Usuario_model->get_by_id($id);
            $data['documentos'] = $this->Usuario_model->get_all_document_types();
            $this->load->view('usuarios/perfil', $data);
        } else {
            $nombre_imagen = $this->input->post('imagen_actual'); // Variable para guardar el nombre de la imagen

            // 1. Configuración para la subida de la imagen
            $config['upload_path']          = './uploads/perfiles/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 2048; // 2MB
            $config['encrypt_name']         = TRUE; // Renombra el archivo para evitar colisiones

            $this->load->library('upload', $config);

            // 2. Verificamos si se subió un archivo y si es válido
            if (!empty($_FILES['imagen_perfil']['name'])) {
                if ($this->upload->do_upload('imagen_perfil')) {
                    // Si la subida es exitosa, obtenemos el nombre del archivo
                    $data_upload = $this->upload->data();
                    $nombre_imagen = $data_upload['file_name'];
                } else {
                    // Si la subida falla, preparamos el error para mostrarlo en la vista
                    $data['error_upload'] = $this->upload->display_errors();
                    $data['usuario'] = $this->Usuario_model->get_by_id($id);
                    $data['documentos'] = $this->Usuario_model->get_all_document_types();
                    $this->load->view('usuarios/perfil', $data);
                    return; // Detenemos la ejecución
                }
            }
            $data = [
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                'telefono' => $this->input->post('telefono'),
                'id_tipo_documento' => $this->input->post('id_tipo_documento'),
                'imagen' => $nombre_imagen ? $nombre_imagen : NULL // Guardamos el nombre o NULL
            ];
            $this->Usuario_model->update($id, $data);
            $this->session->set_userdata('imagen', $data['imagen']);
            redirect('dashboard');
        }
    }
}
