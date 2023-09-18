<?php

function aplicarPaginacion($pokemones, $elementosPorPagina){
    $resultado = array();
    $paginaActual = intval($_GET['pagina']);
    $inicio = ($paginaActual -1)*$elementosPorPagina;
    $final = $inicio + $elementosPorPagina;

    if ($final > sizeof($pokemones)) {
        $final = sizeof($pokemones);
    }
    

    for ($i=$inicio; $i < $final; $i++) { 
        array_push($resultado, $pokemones[$i]);
    }

    return $resultado;
}

