<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function index() {
        if($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        } else {
            $this->load->view('auth/index');
        }
    }

    public function login() {
        if($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            $user = $this->Usuario_model->get_user_by_email($email);

            if($user) {
                if(password_verify($contrasena, $user->contrasena)) {
                    $session_data = array(
                        'id_usuarios' => $user->id_usuarios,
                        'nombre' => $user->nombre,
                        'apellidos' => $user->apellidos,
                        'email' => $user->email,
                        'rol_nombre' => $user->rol_nombre,
                        'is_logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Contraseña incorrecta.');
                    $this->load->view('auth/index');
                }
            } else {
                $this->session->set_flashdata('info', 'El email no está registrado.');
                $this->load->view('auth/index');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/index');
    }
}
?>