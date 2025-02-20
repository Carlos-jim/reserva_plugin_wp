jQuery(document).ready(function($) {
    $('.tabla-calendario td').click(function() {
        $('.tabla-calendario td').removeClass('seleccionado');
        $(this).addClass('seleccionado');
        $('#seleccion-fecha').append('<input type="hidden" name="fecha" value="' + $(this).text() + '">');
    });
});