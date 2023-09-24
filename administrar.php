<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/animations.css">
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <title>Details</title>
</head>

<body>
    <header class="d-flex bd-highlight gradient-background" id="header">
        <div class="div_logo">
            <img id="logo" src="./imagenes/logo2.png" alt="logo">
        </div>
        <nav class="d-flex w-100 " id="nav_heder">
            <a href="./login.html">Iniciar sesion</a>
            <a href="./singin.html">Registrarse</a>
        </nav>
    </header>

    <main id="main_admin" class="m-5 p-5 d-flex flex-column align-items-center">

    <?php
    include_once "./php/main.php";
    include_once "./php/administrar.php";
    if($_GET['editar'] == 0){
        generarAdministrador();
    }else{
        generarAdministradorEditable($pokemones, $tipos, $pokemones_tipos);
    }
    ?>

    </main>

    <footer id="footer_absolute" class="footer pt-3 text-center">
        <p class="w-100">
            Programacion web II - Proyecto grupal Pokedex <br>
            Rocio Belen Crespo -
            Karen NIna Coela -
            Duilio Martin Rubio -
            Rocio crespo
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="./js/administrar.js"></script>
    <script>
        new MultiSelectTag('tipos_multiple')  // id
    </script>
</body>

</html>