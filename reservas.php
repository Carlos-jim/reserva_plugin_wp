<?php
/*
Plugin Name: Reservas
Plugin URI: https://tusitio.com/mi-primer-plugin
Description: Un plugin personalizado para reservas.
Version: 1.0.0
Author: Carlos Jimenez
Author URI: https://h4ruuuru-portafolio.vercel.app/
License: GPL2
*/

// Incluir el archivo del formulario
require_once plugin_dir_path(__FILE__) . '/components/formulario.php';
require_once plugin_dir_path(__FILE__) . '/components/menu-admin/menu.php';
include_once plugin_dir_path(__FILE__) . '/src/empleados.php';
include_once plugin_dir_path(__FILE__) . '/src/citas.php';


// Registrar shortcode para el formulario
add_shortcode('formulario_reserva', 'mostrar_formulario_reserva');



