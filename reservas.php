<?php
/*
Plugin Name: Reservas
Plugin URI: https://tusitio.com/mi-primer-plugin
Description: Un plugin personalizado para reservas.
Version: 1.0.0
Author: Carlos Jimenez
Author URI: https://tusitio.com
License: GPL2
*/

// Incluir el archivo del formulario
require_once plugin_dir_path(__FILE__) . '/components/formulario.php';

// Registrar shortcode para el formulario
add_shortcode('formulario_reserva', 'mostrar_formulario_reserva');



