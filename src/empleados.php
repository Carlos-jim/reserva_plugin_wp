<?php
function pagina_empleados()
{
    global $wpdb;
    $tabla_empleados = $wpdb->prefix . "empleados";

    // Obtener empleados de la base de datos
    $empleados = $wpdb->get_results("SELECT * FROM $tabla_empleados ORDER BY id DESC");

    // Iniciar HTML
    echo '<div class="wrap">';
    echo '<h1>Gestión de Empleados</h1>';
    echo '<div style="display: flex; justify-content: flex-end; align-items: center; padding: 10px 0;">
    <a href="#" class="page-title-action" style="text-decoration: none;">
        <button style="background-color: #2271b1; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px;">
            Añadir Empleado
        </button>
    </a>
  </div>';

    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead style="background-color: #F4F5FD;">
        <tr>
            <th style="font-weight: bold;">ID</th>
            <th style="font-weight: bold;">NOMBRE</th>
            <th style="font-weight: bold;">DESCRIPCIÓN</th>
            <th style="font-weight: bold;">CORREO</th>
            <th style="font-weight: bold;">ENLACE</th>
            <th style="font-weight: bold;">ACCIONES</th>
        </tr>
      </thead>';
    echo '<tbody>';

    if ($empleados) {
        foreach ($empleados as $empleado) {
            echo '<tr>';
            echo '<td>' . esc_html($empleado->id) . '</td>';
            echo '<td><strong>' . esc_html($empleado->nombre) . '</strong></td>';
            echo '<td>' . esc_html($empleado->descripcion) . '</td>';
            echo '<td>' . esc_html($empleado->email) . '</td>';
            echo '<td><a href="' . esc_url($empleado->link) . '" target="_blank">' . esc_html($empleado->link) . '</a></td>';
            echo '<td>
                    <a href="#" class="edit">✏️</a>
                    <a href="#" class="delete">🗑️</a>
                  </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No hay empleados registrados.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
