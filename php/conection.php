<?php

function abrirBdd(){
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "46521541";
    $baseDeDatos = "pokedex";

     return mysqli_connect($servidor, $usuario, $contraseña, $baseDeDatos);
}
/*
function cerrarBdd(){
    $conexion->close();
}
*/
?>