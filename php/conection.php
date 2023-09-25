<?php

function abrirBdd(){
    $servidor = "localhost:33067";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "pokedex";

    return mysqli_connect($servidor, $usuario, $contraseña, $baseDeDatos);
}
/*
function cerrarBdd(){
    $conexion->close();
}
*/

function eliminarPokemon($id){
    // $idpokemon = buscarIDPokemon($datos_poke);
    $conn = abrirBdd();
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    $deleteTipoPokemon = "DELETE FROM Pokemon_Tipo WHERE id_pokemon = $id;";
    var_dump($deleteTipoPokemon);
    $resultadoTipo = mysqli_query($conn, $deleteTipoPokemon);
    $sql = "delete from pokemon where id = {$id}";
    var_dump($sql);
    $resultadoPokemon = mysqli_query($conn, $sql);
    // $resultado = mysqli_query($conn, $sql);

    if ($resultadoTipo == true && $resultadoPokemon == true) {
        echo "Se elimino con exito el pokemon";
    }else {
        echo "No se pudo eliminar el pokemon.";
    }
    $conn->close();
}
?>