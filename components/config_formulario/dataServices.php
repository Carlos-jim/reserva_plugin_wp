<?php
function obtener_codigos_paises() {
    $response = wp_remote_get('https://restcountries.com/v3.1/all');
    
    if (is_wp_error($response)) {
        return [];
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    $codigos = [];

    foreach ($data as $pais) {
        if (isset($pais['idd']['root']) && isset($pais['idd']['suffixes'])) {
            $codigo = $pais['idd']['root'] . $pais['idd']['suffixes'][0];
            $nombre = $pais['name']['common'];
            $codigos[$codigo] = $nombre;
        }
    }

    asort($codigos); // Ordenar por nombre del país
    return $codigos;
}

?>