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
?>