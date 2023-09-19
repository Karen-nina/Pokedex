<?php
include_once "main.php";
include_once "usuario.php";


function validarClave($clave1){
    $regex = '/^(?=.*[A-Z])(?=.*\d).{6,}$/';
    return (preg_match($regex, $clave1));
}

function validarUsuario($usuario){
    $regex = '/^\S{6,}$/';
    return (preg_match($regex, $usuario));
}

function compararClaves($clave1, $clave2){
    return $clave1==$clave2;
}

function buscarUsuario($usuario){
    global $conexion;
    $query= "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) > 0){
        return false; //usuario existente
        } else {
        return true;
        }
    }

function registrarUsuario($nuevoUsuario){
    $nombre = $nuevoUsuario->getNombre();
    $apellido = $nuevoUsuario->getApellido();
    $usuario = $nuevoUsuario->getUsuario();
    $clave = $nuevoUsuario->getClave();
    global $conexion;
    $querySQL = "INSERT INTO Usuario (nombre, apellido, usuario, clave) VALUES ('$nombre', '$apellido', '$usuario', '$clave')";
    if($conexion->query($querySQL)===true){
        echo 'Registro creado';
    } else {
        echo "Error " . $querySQL . "<br>" . $conexion->error;
    }
    $conexion->close();
    }
?>

