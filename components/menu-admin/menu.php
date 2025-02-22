<?php

function mi_plugin_menu()
{
    // Agregar menú principal
    add_menu_page(
        'Citas',
        'Citas',
        'manage_options',
        'mi-plugin-citas',
        'pagina_citas',
        'dashicons-calendar',
        25
    );

    add_submenu_page(
        'mi-plugin-citas', // Slug del menú principal
        'Citas',      // Título de la página
        'Citas',      // Título del menú
        'manage_options', // Capacidad requerida
        'mi-plugin-citas', // Slug de la página
        'pagina_citas'    // Función de callback
    );
    add_submenu_page(
        'mi-plugin-citas', // Slug del menú principal
        'Empleados',      // Título de la página
        'Empleados',      // Título del menú
        'manage_options', // Capacidad requerida
        'mi-plugin-empleados', // Slug de la página
        'pagina_empleados'    // Función de callback
    );

    add_submenu_page(
        'mi-plugin-citas',
        'Ajustes',
        'Ajustes',
        'manage_options',
        'mi-plugin-ajustes',
        'pagina_ajustes'
    );
}


// Función para la página de Ajustes
function pagina_ajustes()
{
    echo '<h1>Ajustes del Plugin</h1>';
}

// Hook para agregar el menú
add_action('admin_menu', 'mi_plugin_menu');
