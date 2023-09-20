<?php
include_once "main.php";
include_once "conection.php";

function ingresar(){
    
    if(isset($_POST["ingreso"])){
        
        if(isset($_POST["userName"]) && isset($_POST["password"])){ //si se ingresaron todos los campos
            
            $usuarioEncontrado = buscarUsuario($_POST["userName"]);
            
            if(buscarUsuario($_POST["userName"]) != null){
                echo $_POST["userName"] . "<br>";
                echo $_POST["password"];
                $usuarioEncontrado = buscarUsuario($_POST["userName"]);
                if($usuarioEncontrado['clave']== $_POST["password"]){
                    session_start();
                    $_SESSION['ingreso'] = $usuarioEncontrado;
                    header('Location: index.php');
                }else{
                    echo '<cite title="Source Title" style="color: red"> La contraseña no coincide</cite>';
                }

            }else if(!buscarUsuario($_POST["userName"])){
                echo '<cite title="Source Title" style="color: red">El usuario no existe</cite>';
            }
                
        }

    }
}


function buscarUsuario($nombreUsuario){
    $conexion = abrirBdd();
    $query = "SELECT * FROM usuario WHERE usuario.usuario = '$nombreUsuario'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0){
        $conexion->close();
        return mysqli_fetch_assoc($resultado); 
    } else {
        $conexion->close();
        return null; 
    }
}
