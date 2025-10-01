<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Configuración de la Librería de Email de CodeIgniter
| -------------------------------------------------------------------
| Este archivo contiene la configuración para enviar correos.
| Para usar Gmail, necesitas generar una "Contraseña de aplicación"
| si tienes la verificación en dos pasos activada.
|
| Reemplaza los valores con tus propias credenciales de correo.
*/

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com'; // O 'smtp.gmail.com'
$config['smtp_port'] = 465;
$config['smtp_user'] = 'fgfernan2508@gmail.com'; // <-- TU CORREO DE GMAIL
$config['smtp_pass'] = 'cmyi qupv ukrw zewe'; // <-- TU CONTRASEÑA DE APLICACIÓN
$config['smtp_timeout'] = '7';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // o 'text'
$config['validation'] = TRUE; // bool whether to validate email or not