<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $resultado = $pokemones; // Inicialmente, $resultado contiene todos los Pokémon

    if (isset($_POST["tipoPokemon"])) {
        $tipoPokemon = $_POST["tipoPokemon"];
        
        $buscarTipoPorId = buscarTipoPorNombre($tipos, $tipoPokemon);

        $resultado = obtenerPokemonPorTipo($buscarTipoPorId, $pokemones_tipos, $pokemones);
    }
    if (isset($_POST["input_search"])) {
        $busqueda = $_POST["input_search"];
        // Filtrar por nombre del Pokémon
        $resultado = filtrarPorNombre($busqueda, $resultado);
    }

    if (empty($resultado)) {
        ?><img src="./imagenes/mensaje.jpg" alt="" id="mensaje_notFound"><?php
    } else {
        generarTarjetas($resultado);
    }
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



