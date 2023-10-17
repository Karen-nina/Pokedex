<?php
function abrirBdd(){
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "pokedex";

    return mysqli_connect($servidor, $usuario, $contraseña, $baseDeDatos);
}

?>