<?php
function aplicarFiltros($pokemones, $tipos, $pokemones_tipos){
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

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
        if(isset($_POST["ordenar"])){
            $resultado = ordenarPokemones($_POST["ordenar"], $resultado);
        }
    
        return $resultado;
    }
}

function ordenarPokemones($orden, $pokemonesParaMostrar){

    // Ordenar los Pokémon según la opción seleccionada
    switch ($orden) {
    case "menor":
    // Ordenar de menor a mayor número
        usort($pokemonesParaMostrar, function ($a, $b) {
        return $a['id'] - $b['id'];
    });
    break;
    case "ascendente":
     // Ordenar alfabéticamente de A a Z
    usort($pokemonesParaMostrar, function ($a, $b) {
        return strcmp($a['nombre'], $b['nombre']);
        });
    break;
    case "descendente":
     // Ordenar alfabéticamente de Z a A
    usort($pokemonesParaMostrar, function ($a, $b) {
    return strcmp($b['nombre'], $a['nombre']);
        });
    break;
    default:
    // Ordenar de mayor a menor número (predeterminado)
    usort($pokemonesParaMostrar, function ($a, $b) {
        return $b['id'] - $a['id'];
    });
    }
    return $pokemonesParaMostrar;
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