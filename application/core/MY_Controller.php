<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // --- LÓGICA DE VERIFICACIÓN DE PERMISOS ---

        // 1. Verificar si el usuario ha iniciado sesión
        if (!$this->session->userdata('is_logged_in')) {
            // Si no hay sesión, lo redirigimos a la página de login
            redirect('login');
        }

        // 2. Obtener el rol del usuario y el recurso que intenta acceder
        $rol_usuario = $this->session->userdata('rol_nombre');
        $controlador_actual = $this->router->fetch_class(); // El controlador (ej: 'productos')

        // 3. Definir las reglas de acceso
        //    Aquí definimos qué roles pueden acceder a qué controladores.
        $permisos = [
            'Administrador' => ['categorias', 'compras', 'dashboard', 'inventario', 'productos', 'proveedores', 'reportes', 'usuarios', 'ventas'],
            'Supervisor'    => ['inventario', 'ventas', 'compras', 'dashboard', 'reportes'],
            'Vendedor'      => ['ventas', 'dashboard'],
            'Bodega/Almacen' => ['inventario', 'compras', 'dashboard']
        ];

        // 4. Comprobar si el rol del usuario tiene permiso para el controlador actual
        //    Primero, nos aseguramos de que el rol exista en nuestra lista de permisos.
        if (isset($permisos[$rol_usuario])) {
            // Luego, verificamos si el controlador actual está en la lista de permitidos para ese rol.
            if (!in_array($controlador_actual, $permisos[$rol_usuario])) {
                // Si NO está en la lista, el acceso es denegado.
                $this->mostrar_acceso_denegado();
            }
            // Si está en la lista, la ejecución continúa normalmente en el controlador hijo.
        } else {
            // Si el rol del usuario no está definido en nuestros permisos, denegamos por seguridad.
            $this->mostrar_acceso_denegado();
        }
    }

    /**
     * Método privado para mostrar una vista de error de acceso.
     */
    private function mostrar_acceso_denegado()
    {
        // Establecemos el código de estado HTTP a "403 Forbidden"
        $this->output->set_status_header('403');

        // Cargamos una vista de error
        $this->load->view('errors/acceso_denegado_view');

        // Detenemos la ejecución del script para que no continúe cargando el controlador solicitado.
        // Usamos `exit()` de CodeIgniter para asegurar que todo se detenga correctamente.
        echo $this->output->get_output();
        exit();
    }
}
