<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            redirect('inventario');
        } else {
            $this->load->view('auth/index');
        }
    }

    public function login()
    {
        if ($this->session->userdata('is_logged_in')) {
            redirect('inventario');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            $user = $this->Usuario_model->get_user_by_email($email);

            if ($user) {
                if (password_verify($contrasena, $user->contrasena)) {
                    $session_data = array(
                        'id_usuarios' => $user->id_usuarios,
                        'nombre' => $user->nombre,
                        'apellidos' => $user->apellidos,
                        'email' => $user->email,
                        'rol_nombre' => $user->rol_nombre,
                        'imagen' => $user->imagen,
                        'is_logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);
                    redirect('inventario');
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/index');
    }

    public function recuperar_contrasena()
    {
        $this->load->view('auth/recuperar_contrasena');
    }

    // Procesa la solicitud de recuperación
    public function send_recovery_link()
    {
        $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/recuperar_contrasena');
        } else {
            $email = $this->input->post('email');
            $user = $this->Usuario_model->get_user_by_email($email);

            if ($user) {
                // Generar un token único y seguro
                $token = bin2hex(random_bytes(32));
                // Establecer tiempo de expiración (ej. 15 minutos desde ahora)
                $expires_at = date('Y-m-d H:i:s', strtotime('+15 minutes'));

                // Guardar el token en la base de datos
                $this->Usuario_model->set_reset_token($user->id_usuarios, $token, $expires_at);

                // Enviar el correo
                $this->send_email($email, $token);
            }

            // Mensaje genérico para no revelar si un correo existe o no
            $this->session->set_flashdata('success', 'Si tu correo está registrado, recibirás un enlace para recuperar tu contraseña.');
            redirect('auth/recuperar_contrasena');
        }
    }

    // Muestra el formulario para establecer la nueva contraseña
    public function reset_password($token) {
        $user = $this->Usuario_model->get_user_by_token($token);

        // Validar si el token es válido y no ha expirado
        if ($user && strtotime($user->reset_token_expires_at) > time()) {
            $data['token'] = $token;
            $this->load->view('auth/nueva_contrasena', $data);
        } else {
            $this->session->set_flashdata('error', 'El enlace de recuperación no es válido o ha expirado. Por favor, solicita uno nuevo.');
            redirect('auth/recuperar_contrasena');
        }
    }

    // Procesa la actualización de la contraseña
    public function update_password() {
        $token = $this->input->post('token');
        
        $this->form_validation->set_rules(
            'contrasena',
            'Contraseña',
            'required|trim|min_length[6]|max_length[8]|regex_match[/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,8})\S$/]',
            array(
                'regex_match' => 'La contraseña debe tener al entre 6 y 8 caracteres, al menos una mayúscula, una minúscula y un número.'
            )
        );
        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required|matches[contrasena]',
            array(
                'matches' => 'Las contraseñas no coinciden.'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, volvemos a mostrar el formulario
            $data['token'] = $token;
            $this->load->view('auth/nueva_contrasena', $data);
        } else {
            $user = $this->Usuario_model->get_user_by_token($token);
            if ($user && strtotime($user->reset_token_expires_at) > time()) {
                $new_password = $this->input->post('contrasena');
                // ¡Importante! Hashear la contraseña antes de guardarla
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                
                $this->Usuario_model->update_password($user->id_usuarios, $hashed_password);

                $this->session->set_flashdata('success', '¡Tu contraseña ha sido actualizada con éxito! Ya puedes iniciar sesión.');
                redirect('login'); // Redirigir a la página de login
            } else {
                $this->session->set_flashdata('error', 'El enlace de recuperación no es válido o ha expirado.');
                redirect('auth/recuperar_contrasena');
            }
        }
    }

    // Función privada para enviar el correo
    private function send_email($recipient_email, $token) {
        $this->load->library('email'); // Carga la librería de email de CI
        // La configuración se toma de application/config/email.php

        $recovery_link = base_url() . 'auth/reset_password/' . $token;

        $message  = "<h1>Recuperación de Contraseña</h1>";
        $message .= "<p>Hola,</p>";
        $message .= "<p>Hemos recibido una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:</p>";
        $message .= "<a href='" . $recovery_link . "'>Restablecer mi contraseña</a>";
        $message .= "<p>Si no solicitaste esto, puedes ignorar este correo.</p>";
        $message .= "<p>El enlace expirará en 15 minutos.</p>";

        $this->email->from('no-reply@misupermercado.com', 'Sistema de Supermercado');
        $this->email->to($recipient_email);
        $this->email->subject('Recuperación de Contraseña');
        $this->email->message($message);

        // Intentar enviar el correo
        if (!$this->email->send()) {
            // Puedes loguear el error si lo necesitas
            // log_message('error', $this->email->print_debugger());
        }
    }

}
