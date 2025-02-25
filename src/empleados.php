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
    <button id="openModal" style="background-color: #2271b1; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px; display: flex; align-items: center; gap: 8px;">
    <span class="dashicons dashicons-businessperson"></span>
    Añadir Empleado
</button>
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
        <a href="#" class="edit" title="Editar">
            <span class="dashicons dashicons-edit"></span>
        </a>
        <a href="#" class="delete" title="Eliminar">
            <span class="dashicons dashicons-trash"></span>
        </a>
      </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No hay empleados registrados.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Modal HTML
    echo '
    <div id="employeeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Añadir Empleado</h2>
            <form id="employeeForm">
                <label for="name">Nombre *</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Descripción *</label>
                <input type="text" id="description" name="description" required>

                <label for="email">Correo *</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Teléfono *</label>
                <input type="text" id="phone" name="phone" required>

                <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                    <button type="button" class="cancel">Cancelar</button>
                    <button type="submit" class="save">Guardar</button>
                </div>
            </form>
        </div>
    </div>';
}
