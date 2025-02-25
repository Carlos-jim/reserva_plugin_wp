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


function cargar_recursos_empleados() {
    wp_enqueue_style('empleados-css', plugin_dir_url(__FILE__) . '/style/modal_add.css');
    wp_enqueue_script('empleados-js', plugin_dir_url(__FILE__) . '/js/modal_add.js', array(), false, true);
    // Cargar Dashicons
    wp_enqueue_style('dashicons');
}
add_action('admin_enqueue_scripts', 'cargar_recursos_empleados');