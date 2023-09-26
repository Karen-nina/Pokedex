<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!$_GET) header('Location: index.php?pagina=1');
include_once "./php/main.php";
include_once "./php/paginacion.php";
include_once "./php/aplicarFiltros.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/animations.css">
    <link rel="icon" href="./imagenes/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Home</title>
</head>

<body>
    <header class="d-flex bd-highlight gradient-background" id="header">

        <div class="div_logo  ">
            <a href="./index.php"><img id="logo" src="./imagenes/logo2.png" alt="logo"></a>
        </div>
        <?php
        if (isset($_SESSION['ingreso'])) {
            $usuario = $_SESSION['ingreso'];
        ?>
            <nav class="d-flex" id="nav_heder2">
                <img src="./imagenes/profile.png" class="" id="img_perfil">
                <span><?php echo $usuario['nombre'] . " " . $usuario['apellido'] . '<br>' .
                            $usuario['usuario'] ?></span>
                <a href="./php/cerrarSession.php" class="cerrarSession">Cerrar Sesión</a>
            </nav>
        <?php

        } else {
        ?>
            <nav class="d-flex w-100 " id="nav_heder">
                <a class="nav_a" href="./login.php">Iniciar sesion</a>
                <a class="nav_a" href="singin.php">Registrarse</a>
            </nav>
        <?php
        }
        ?>

    </header>

    <main class="d-flex flex-column align-items-center pb-5 ">

        <div class="titulo_filtros pt-5 gradient-background w-100">
            <h1 id="encabezado">Busca un pokemon por su nombre</h1>

            <form method="POST" action="" id="filtros" class="d-flex align-items-center w-100 ">

                <select name="tipoPokemon" class="form-control" id="select_tipo">
                    <option value="all" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "all") ? 'selected' : "" ?>>
                        Todos los tipos</option>
                    <option value="Agua" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Agua") ? 'selected' : "" ?>>
                        Agua</option>
                    <option value="Fuego" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Fuego") ? 'selected' : "" ?>>
                        Fuego</option>
                    <option value="Planta" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Planta") ? 'selected' : "" ?>>
                        Planta</option>
                    <option value="Electrico" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Electrico") ? 'selected' : "" ?>>
                        Electrico</option>
                    <option value="Hielo" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Hielo") ? 'selected' : "" ?>>
                        Hielo</option>
                    <option value="Lucha" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Lucha") ? 'selected' : "" ?>>
                        Lucha</option>
                    <option value="Veneno" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Veneno") ? 'selected' : "" ?>>
                        Veneno</option>
                    <option value="Tierra" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Tierra") ? 'selected' : "" ?>>
                        Tierra</option>
                    <option value="Volador" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Volador") ? 'selected' : "" ?>>
                        Volador</option>
                    <option value="Psiquico" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Psiquico") ? 'selected' : "" ?>>
                        Psiquico</option>
                    <option value="Bicho" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Bicho") ? 'selected' : "" ?>>
                        Bicho</option>
                    <option value="Roca" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Roca") ? 'selected' : "" ?>>
                        Roca</option>
                    <option value="Fantasma" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Fantasma") ? 'selected' : "" ?>>
                        Fantasma</option>
                    <option value="Acero" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Acero") ? 'selected' : "" ?>>
                        Acero</option>
                    <option value="Dragon" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Dragon") ? 'selected' : "" ?>>
                        Dragon</option>
                    <option value="Normal" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Normal") ? 'selected' : "" ?>>
                        Normal</option>
                    <option value="Hada" <?php echo (isset($_POST["tipoPokemon"]) && $_POST['tipoPokemon'] == "Hada") ? 'selected' : "" ?>>
                        Hada</option>
                </select>


                <select name="ordenar" id="ordenar" class="form-control">
                    <option value="menor" <?php echo (isset($_POST["ordenar"]) && $_POST['ordenar'] == "menor") ? 'selected' : "" ?>>Menor
                        a mayor N°</option>
                    <option value="mayor" <?php echo (isset($_POST["ordenar"]) && $_POST['ordenar'] == "mayor") ? 'selected' : "" ?>>Mayor
                        a menor N°</option>
                    <option value="ascendente" <?php echo (isset($_POST["ordenar"]) && $_POST['ordenar'] == "ascendente") ? 'selected' : "" ?>>
                        A --- Z</option>
                    <option value="descendente" <?php echo (isset($_POST["ordenar"]) && $_POST['ordenar'] == "descendente") ? 'selected' : "" ?>>
                        Z --- A</option>
                </select>


                <input id="input_search" name="input_search" class="form-control w-100 mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">


                <button id="boton_busqueda" class="btn" type="submit">Filtrar </button>
            </form>
        </div>


        <?php if (isset($_SESSION['ingreso'])) {
        ?>
            <ul class="administrar">
                <li id="administrar_li" class="gradient-background">
                    <a href="./administrar.php?editar=0">Agregar pokemon</a>
                    <a href="./administrar.php?editar=0" class="imagen"><img src="./imagenes/icono_agregar.png" alt="" class="img_admin" id="editar"></a>
                </li>
            </ul>
        <?php
        } ?>


        <section id="section_cards" class="d-flex justify-content-center  border-0 cards_home <?php if (!isset($_SESSION['ingreso'])) echo "pt-5"?>">
            <?php
            $pokemonesParaMostrar = $pokemones;

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $pokemonesParaMostrar = aplicarFiltros($pokemones, $tipos, $pokemones_tipos);
                $_GET['pagina'] = 1;
                $_SESSION['filtros'] = $pokemonesParaMostrar;
            } elseif (isset($_SESSION['filtros'])) {
                $pokemonesParaMostrar = $_SESSION['filtros'];
            } else {
                $pokemonesParaMostrar = $pokemones;
            }
            if (sizeof($pokemonesParaMostrar) == 0) {
            ?>
                <div class="w-100 text-center p-5 m-5"><img src="./imagenes/mensaje.jpg" alt=""></div>
            <?php
                $pokemonesParaMostrar = $pokemones;
            }
            $elementosPorPagina = 20;
            $cantidadDePaginas = floor(sizeof($pokemonesParaMostrar) / $elementosPorPagina);
            $pokemonesParaMostrar = aplicarPaginacion($pokemonesParaMostrar, $elementosPorPagina);
            generarTarjetas($pokemonesParaMostrar, $tipos, $pokemones_tipos);
            ?>
        </section>

        <nav aria-label="Page navigation example" <?php echo ($cantidadDePaginas + 1 == 1) ? 'style="display: none;"' : "" ?>>
            <ul class="pagination  gradient-background mb-5">
                <li class="page-item2 " <?php echo ($_GET['pagina'] == 1) ? 'style="display: none;"' : "" ?>>
                    <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <li class="page-item" <?php echo ($_GET['pagina'] == 1) ? 'style="display: none;"' : "" ?>>
                    <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>"><?php echo $_GET['pagina'] - 1 ?></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] ?>"><?php echo $_GET['pagina'] ?></a>
                </li>
                <li class="page-item" <?php echo ($_GET['pagina'] == $cantidadDePaginas + 1) ? 'style="display: none;"' : "" ?>>
                    <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] + 1 ?>"><?php echo $_GET['pagina'] + 1 ?></a>
                </li>

                <li class="page-item2" <?php echo ($_GET['pagina'] == $cantidadDePaginas + 1) ? 'style="display: none;"' : "" ?>>
                    <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </main>


    <footer class="footer pt-3 text-center gradient-background">
        <p class="w-100">
            Programacion web II - Proyecto grupal Pokedex <br>
            Rocio Belen Crespo -
            Karen Nina Coela -
            Duilio Martin Rubio -
            Emiliano Javier Roldán <br>
            © UNLaM 2018 v2.1.0. Todos los derechos reservados.
        </p>
    </footer>

    <!-- <script src="./js/main.js"></script> -->
</body>

</html>