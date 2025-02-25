<?php
function pagina_citas()
{
    global $wpdb;

    // Consulta para obtener las citas
    $tabla_citas = $wpdb->prefix . 'appointments'; // Cambia esto si tu tabla tiene otro nombre
    $citas = $wpdb->get_results("SELECT * FROM $tabla_citas ORDER BY fecha_hora DESC");

    // HTML para mostrar las citas
    echo '<div class="wrap">';
    echo '<h1>Gestión de Citas</h1>';
    echo '<div style="display: flex; justify-content: flex-end; align-items: center; padding: 10px 0;">
    <button id="openModal" style="background-color: #2271b1; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px; display: flex; align-items: center; gap: 8px;">
    <span class="dashicons dashicons-calendar"></span>
    Añadir Cita
</button>
  </div>';

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

    // Modal HTML
    echo '
    <div id="employeeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Añadir Cita</h2>
            <form id="employeeForm">
                <label for="name">Nombre *</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Correo *</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Teléfono *</label>
                <input type="text" id="phone" name="phone" required>

                <label for="ubicacion">Ubicación *</label>
                <select id="ubicacion" name="ubicacion" required>

                <label for="servicio">Servicio *</label>
                <select id="servicio" name="servicio" required>

                <label for="trabajador">Trabajador *</label>
                <select id="trabajador" name="trabajador" required>

                <label for="fecha">Fecha *</label>
                <select id="fecha" name="fecha" required>

                <label for="hora">Hora *</label>
                <select id="hora" name="hora" required>

                <label for="estado">Estado *</label>
                <select id="estado" name="estado" required>

                <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                    <button type="button" class="cancel">Cancelar</button>
                    <button type="submit" class="save">Guardar</button>
                </div>
            </form>
        </div>
    </div>';
}
