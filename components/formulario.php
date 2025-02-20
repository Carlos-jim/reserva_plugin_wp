<?php
require_once plugin_dir_path(__FILE__) . '/config_formulario/dataServices.php';

// Enqueue FullCalendar CSS and JS
function agregar_fullcalendar()
{
    // FullCalendar CSS
    wp_enqueue_style(
        'fullcalendar-css',
        'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css'
    );

    // FullCalendar JS
    wp_enqueue_script(
        'fullcalendar-js',
        'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js',
        array('jquery'),
        '5.10.1',
        true
    );

    // FullCalendar Locale (opcional, si necesitas otro idioma)
    wp_enqueue_script(
        'fullcalendar-locale',
        'https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js',
        array('fullcalendar-js'),
        '5.10.1',
        true
    );
}
add_action('wp_enqueue_scripts', 'agregar_fullcalendar');


// Función para mostrar el formulario de reserva
function mostrar_formulario_reserva()
{
    ob_start();
?>
    <form id="form-reserva" method="post">
        <!-- Calendario -->
        <div id="seleccion-fecha">
            <h3>Seleccione fecha:</h3>
            <div id="calendario"></div>
        </div>

        <!-- Horarios -->
        <div id="seleccion-hora">
            <h3>Seleccione hora:</h3>
            <select name="hora" required>
                <option value="">-- Elegir hora --</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
            </select>
        </div>

        <!-- Campos personales -->
        <div class="info-personal">
            <h3>Información personal</h3>
            <label>Nombre y Apellido <span class="campo-obligatorio">*</span>
                <input type="text" name="nombre" required>
            </label>

            <!-- Teléfono con código de país -->
            <label>Teléfono</label>
            <div class="telefono-container">
                <select name="codigo_pais" required>
                    <?php
                    $codigos_paises = obtener_codigos_paises();
                    foreach ($codigos_paises as $codigo => $pais) {
                        echo "<option value=\"$codigo\">$pais ($codigo)</option>";
                    }
                    ?>
                </select>
                <input type="tel" name="telefono" placeholder="Ingrese su número" required>
            </div>

            <label>Email <span class="campo-obligatorio">*</span>
                <input type="email" name="email" required>
            </label>
        </div>

        <?php wp_nonce_field('guardar_reserva', 'reserva_nonce'); ?>

        <div>
            <h1>Resumen de la reserva</h1>
        </div>

        <div class="div-buttons">
            <input type="submit" name="enviar_reserva" value="Reservar">
            <input type="submit" name="cancelar_reserva" value="Cancelar">
        </div>
    </form>

    <style>
        .telefono-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .telefono-container select {
            width: 120px;
            padding: 5px;
        }

        .telefono-container input {
            flex-grow: 1;
            padding: 5px;
        }

        .div-buttons {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var selectedDate = null; // Variable para almacenar la fecha seleccionada

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es', // Cambia 'es' por el idioma que necesites
                dateClick: function(info) {
                    // Remover el color de la fecha previamente seleccionada
                    if (selectedDate) {
                        selectedDate.classList.remove('selected-date');
                    }

                    // Marcar la nueva fecha seleccionada
                    selectedDate = info.dayEl;
                    selectedDate.classList.add('selected-date');

                    // Guardar la fecha seleccionada en un input oculto o procesarlo como se requiera
                    document.getElementById('fecha_seleccionada').value = info.dateStr;
                }
            });
            calendar.render();
        });

        // Agregar estilos para resaltar la fecha seleccionada
        var style = document.createElement('style');
        style.innerHTML = `
    .selected-date {
        background-color: #6492f6 !important;
        color: white !important;
    }
`;
        document.head.appendChild(style);
    </script>
<?php
    return ob_get_clean();
}
