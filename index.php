<!DOCTYPE html>
<html lang="en">
<?php
    if (!$_GET) header('Location: index.php?pagina=1');
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/animations.css">
    <link rel="icon" href="./imagenes/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Home</title>
</head>

<body>
    <header class="d-flex bd-highlight gradient-background" id="header">

        <div class="div_logo  ">
            <img id="logo" src="./imagenes/logo2.png" alt="logo">
        </div>
        <nav class="d-flex w-100 " id="nav_heder">
            <a href="./login.html">Iniciar sesion</a>
            <a href="./singin.html">Registrarse</a>
        </nav>
        <!-- <nav class="d-flex" id="nav_heder2">
            <img src="./imagenes/profile.png" class="" id="img_perfil">
            <span>Rocio Crespo <br> rociocrespo200</span>
        </nav> -->
    </header>

    <main class="d-flex flex-column align-items-center pb-5">
        
        <div class="titulo_filtros pt-5 gradient-background w-100">
            <h1 id="encabezado">Busca un pokemon por su nombre</h1>

            <form method="POST" action="" id="filtros" class="d-flex align-items-center w-100 ">

                <select name="tipoPokemon" class="form-control" id="select_tipo">
                    <option selected="true" disabled="disabled">Filtrar por tipo</option>
                    <option value="Agua">Agua</option>
                    <option value="Fuego">Fuego</option>
                    <option value="Planta">Planta</option>
                    <option value="Electrico">Electrico</option>
                    <option value="Hielo">Hielo</option>
                    <option value="Lucha">Lucha</option>
                    <option value="Veneno">Veneno</option>
                    <option value="Tierra">Tierra</option>
                    <option value="Volador">Volador</option>
                    <option value="Psiquico">Psiquico</option>
                    <option value="Bicho">Bicho</option>
                    <option value="Roca">Roca</option>
                    <option value="Fantasma">Fantasma</option>
                    <option value="Acero">Acero</option>
                    <option value="Dragon">Dragon</option>
                    <option value="Normal">Normal</option>
                    <option value="Hada">Hada</option>
                </select>

                <select name="ordenar" id="ordenar" class="form-control">
                    <option value="mayor">Mayor a menor N°</option>
                    <option value="menor">Menor a mayor N°</option>
                    <option value="ascendente">A --- Z</option>
                    <option value="descendente">Z --- A</option>
                </select>

                <input id="input_search" name="input_search" class="form-control w-100 mr-sm-2" type="search"
                    placeholder="Buscar" aria-label="Search">


                <button id="boton_busqueda" class="btn" type="submit">Filtrar </button>
            </form>

        </div>



        <section id="section_cards" class="d-flex justify-content-center  border-0 cards_home">
            <?php
            include_once "./php/main.php";
            include_once "./php/paginacion.php";
            //------------------
            $pokemonesParaMostrar = $pokemones;
            

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                include_once "./php/aplicarFiltros.php";
                $pokemonesParaMostrar = aplicarFiltros($pokemones, $tipos, $pokemones_tipos);
            }

            if(sizeof($pokemonesParaMostrar) == 0){
                ?> <div class="w-100"><img src="./imagenes/mensaje.jpg" alt="" class="mensaje d-block w-100"></div><?php
                $pokemonesParaMostrar = $pokemones;
            }
            $pokemonesParaMostrar = aplicarPaginacion($pokemonesParaMostrar);
            generarTarjetas($pokemonesParaMostrar,$tipos,$pokemones_tipos);
            ?>
        </section>
            <nav aria-label="Page navigation example">
                <ul class="pagination  gradient-background mb-5">
                    <li class="page-item2">
                        <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] - 1?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item" <?php echo ($_GET['pagina'] == 1)? 'style="display: none;"' : ""?>>
                        <a class="page-link" href="./index.php?pagina=<?php echo ($_GET['pagina'] == 1) - 1?>"><?php echo $_GET['pagina'] - 1?></a></li>
                    <li class="page-item"><a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina']?>"><?php echo $_GET['pagina']?></a></li>
                    <li class="page-item"><a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] + 1?>"><?php echo $_GET['pagina'] + 1?></a></li>
                    <li class="page-item2">
                        <a class="page-link" href="./index.php?pagina=<?php echo $_GET['pagina'] + 1?>" aria-label="Next">
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
            Karen NIna Coela -
            Duilio Martin Rubio -
            Rocio crespo <br>
            © UNLaM 2018 v2.1.0. Todos los derechos reservados.
        </p>
    </footer>

    <!-- <script src="./js/main.js"></script> -->
</body>

</html>