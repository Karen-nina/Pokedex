<?php
include_once "./php/registro.php";
include_once "./php/usuario.php";
$mensajeUsuario = "El usuario debe tener al menos 6 caracteres y no tener espacios.";
$mensajeClave = "La clave debe tener al menos 6 caracteres, incluyendo al menos una letra mayúscula y al menos un número.";

if (isset($_POST['enviar'])) {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $clave = isset($_POST['clave']) ? $_POST['clave'] : "";
    $clave2 = isset($_POST['clave2']) ? $_POST['clave2'] : "";

    if (!empty($usuario)) {
        if (!validarUsuario($usuario)) {
            $mensajeUsuario = '<cite title="Source Title" style="color: red">' . "Usuario inválido. $mensajeUsuario" . '</cite>';
        }
    }

    if (!empty($clave)) {
        if (!validarClave($clave)) {
            $mensajeClave = '<cite title="Source Title" style="color: red">' . "Clave inválida. $mensajeClave" . '</cite>';
        }
    }

    if(!compararClaves($clave, $clave2)){
        $errorClaves =  '<cite title="Source Title" style="color: red">' . "Las claves no coinciden" . '</cite>';
    }

    if(!buscarUsuario($usuario)){
        $errorExistente=  '<cite title="Source Title" style="color: red">' . "El usuario ya existe" . '</cite>';
    }

    if(validarClave($clave) && validarUsuario($usuario) && compararClaves($clave, $clave2) && buscarUsuario($usuario)){
        $nuevoUsuario = new Usuario($nombre, $apellido, $usuario, $clave);
        registrarUsuario($nuevoUsuario);
        header("Location: http://localhost/pokedex/login.html");
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./imagenes/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <title>SingIn</title>
</head>

<body>

    <main id="ingreso">
        <form class=" p-5" id="ingreso" action="singin.php" method="post">
            <div class="titulo_form">
                <h2>Create una cuenta</h2>
                <cite title="Source Title">Si ya tienes una cuenta <a  href="./login.html">Ingresa</a> o vuelve a <a href="./index.php">inicio</a></cite>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
                </div>
            </div>
            <div class="form">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
            </div>
            <?php
            echo  '<cite title="Source Title"> '. $mensajeUsuario . '  </cite>';
            if(isset($errorExistente)){
                echo $errorExistente;
            }

            ?>
            <div class="form-row">
                <div class="col">
                    <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" name="clave2" placeholder="Repetir contraseña" required>
                </div>
            </div>
            <?php
            echo  '<cite title="Source Title"> '. $mensajeClave . '  </cite>';
            if(!empty($errorClaves)) {
                echo $errorClaves;
            }
            ?>
            <button type="submit" class="btn btn-outline-info w-100" name="enviar">Registrarse</button>
            <cite title="Source Title">* Al registrarse acepta los terminos y condiciones de la empresa, asi como el uso de cookies.</cite>
        </form>



    </main>


</body>

</html>