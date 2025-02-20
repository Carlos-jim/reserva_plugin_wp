<?php

function mi_plugin_menu() {
    // Agregar menú principal
    add_menu_page(
        'Gestión de Citas',    
        'Citas',              
        'manage_options',      
        'mi-plugin-citas',     
        'pagina_citas',        
        'dashicons-calendar',  
        25                     
    );

    // Agregar submenús
    add_submenu_page(
        'mi-plugin-citas',  
        'Citas',            
        'Citas',            
        'manage_options',   
        'mi-plugin-citas',  
        'pagina_citas'      
    );

    add_submenu_page(
        'mi-plugin-citas',
        'Empleados',
        'Empleados',
        'manage_options',
        'mi-plugin-empleados',
        'pagina_empleados'
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

// Función para la página de Citas
function pagina_citas() {
    global $wpdb;

    // Consulta para obtener las citas
    $tabla_citas = $wpdb->prefix . 'appointments'; // Cambia esto si tu tabla tiene otro nombre
    $citas = $wpdb->get_results("SELECT * FROM $tabla_citas ORDER BY fecha_hora DESC");

    // HTML para mostrar las citas
    echo '<div class="wrap">';
    echo '<h1>Gestión de Citas</h1>';

    // Comienza la tabla
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>Servicio</th>
                <th>Trabajador</th>
                <th>Cliente</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
          </thead>';
    echo '<tbody>';

    // Mostrar las citas
    if (count($citas) > 0) {
        foreach ($citas as $cita) {
            echo '<tr>';
            echo '<td>' . esc_html($cita->id) . '</td>';
            echo '<td>' . esc_html($cita->ubicacion) . '</td>';
            echo '<td>' . esc_html($cita->servicio) . '</td>';
            echo '<td>' . esc_html($cita->trabajador) . '</td>';
            echo '<td>' . esc_html($cita->cliente) . '</td>';
            echo '<td>' . esc_html($cita->fecha_hora) . '</td>';
            echo '<td>' . esc_html($cita->estado) . '</td>';
            echo '<td><a href="#">Ver</a> | <a href="#">Editar</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="8">No hay citas disponibles.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

// Función para la página de Empleados
function pagina_empleados() {
    echo '<h1>Gestión de Empleados</h1>';
}

// Función para la página de Ajustes
function pagina_ajustes() {
    echo '<h1>Ajustes del Plugin</h1>';
}

// Hook para agregar el menú
add_action('admin_menu', 'mi_plugin_menu');
