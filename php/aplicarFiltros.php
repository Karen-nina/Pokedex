<?php

function aplicarFiltros($pokemones, $tipos, $pokemones_tipos){
    $resultado = $pokemones; // Inicialmente, $resultado contiene todos los Pokémon

    if (isset($_POST["tipoPokemon"]) && $_POST["tipoPokemon"] != 'all') {
        $tipoPokemon = $_POST["tipoPokemon"];

        $buscarTipoPorId = buscarTipo($tipos,'tipo' ,$tipoPokemon);

        $resultado = obtenerPokemonPorTipo($buscarTipoPorId, $pokemones_tipos, $pokemones);
    }
    if (isset($_POST["input_search"])) {
        $busqueda = $_POST["input_search"];

        $resultado = filtrarPorNombre($busqueda, $resultado);
    }

    return $resultado;

}

function filtrarPorNombre($busqueda, $pokemones) {
    $resultadosFiltrados = array();

    foreach ($pokemones as $pokemon) {
        if (stripos($pokemon['nombre'], $busqueda) !== false || stripos($pokemon['nombre'], $busqueda) === 0) {
            array_push($resultadosFiltrados, $pokemon);
        }
    }

    return $resultadosFiltrados;
}

function obtenerPokemonPorTipo($tipo, $pokemones_tipos, $pokemones){
    $pokemonesFiltrados = array();

    for ($i = 0; $i < sizeof($pokemones_tipos); $i++) {
        if($pokemones_tipos[$i]['id_tipo'] === $tipo['id']){
            array_push($pokemonesFiltrados , buscarPokemonPorId($pokemones_tipos[$i]['id_pokemon'], $pokemones));
        }
    }
    
    return $pokemonesFiltrados;
}


function buscarPokemonPorId($id, $pokemones){
    foreach ($pokemones as $pokemon) {
        if($pokemon['id'] == $id){
            return $pokemon;
        }
    }

}

?>



