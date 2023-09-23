<?php

//CONEXION CON LA BASE DE DATOS

include_once "conection.php";

$conexion = abrirBdd();
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$resultado1 = mysqli_query($conexion, "SELECT * FROM Pokemon");
$resultado2 = mysqli_query($conexion, "SELECT * FROM Tipo");
$resultado3 = mysqli_query($conexion, "SELECT * FROM Pokemon_tipo");


$pokemones = array();
$tipos = array();
$pokemones_tipos = array();

// Recorre las filas y agrega cada fila al array
while ($fila = mysqli_fetch_assoc($resultado1)) {
    $pokemones[] = $fila;
}
while ($fila = mysqli_fetch_assoc($resultado2)) {
    $tipos[] = $fila;
}
while ($fila = mysqli_fetch_assoc($resultado3)) {
    $pokemones_tipos[] = $fila;
}


function generarDetails($pokemones,$tipos, $pokemones_tipos){
    // Obtén la URL actual
    $actualURL = $_SERVER['REQUEST_URI'];

    // Parsea la URL para obtener los parámetros
    $queryString = parse_url($actualURL, PHP_URL_QUERY);

    // Parsea los parámetros para obtener el valor de 'id'
    parse_str($queryString, $queryParams);


    $id = $queryParams['id'];

    // Busca el Pokémon con el ID correspondiente en el array $pokemones
    foreach ($pokemones as $pokemon) {
        if ($pokemon['id'] == $id) {
            $calcularTotal = $pokemon['ataque']+$pokemon['defensa']+$pokemon['at_especial']+$pokemon['def_especial']+$pokemon['velocidad'];
            $numeroFormateado = sprintf("%03d", $pokemon['nro']);
                ?>
                <div id="card_details">
                    <div class="card border-0 w-100" id="card_details2">
                        <img id="card_details_img" src="./imagenes/pokemones/<?php echo $pokemon['imagen'] ?>" class="card-img-top" alt="...">
                        <div class="card-body p-5 w-100" id="card-body_d">
                            <div id="titulo_details" class="d-flex justify-content-between align-items-flex-start">
                                <h5 class="card-title"><?php echo $pokemon['nombre'] ?>
                                    <cite title="Source Title" id="subtitulo"> #<?php echo $numeroFormateado ?></cite>
                                </h5>
                                <div class="d-flex gap-3" style="gap: 5px;">
                                    <?php generarTarjetaDeTipo(obtenerTiposDeUnPokemon($pokemon, $tipos, $pokemones_tipos), true) ?>
                                </div>
                            </div>
                            <p class="card-text my-3"><?php echo $pokemon['informacion'] ?></p>
                            
                            <div class="w-100 div_tabla">
                            <table class="table ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ataque</th>
                                        <th scope="col">Defensa</th>
                                        <th scope="col">Ataque especial</th>
                                        <th scope="col">Defensa especial</th>
                                        <th scope="col">Velocidad</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo $pokemon['ataque']?></td>
                                        <td><?php echo $pokemon['defensa']?></td>
                                        <td><?php echo $pokemon['at_especial']?></td>
                                        <td><?php echo $pokemon['def_especial']?></td>
                                        <td><?php echo $pokemon['velocidad']?></td>
                                        <td><?php echo $calcularTotal?></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            break;
        }
    }
}

function generarTarjetaDeTipo($tipos, $conTexto){
    foreach ($tipos as $tipo) { 
        if($conTexto == true){
            ?>
                <div class="tipos_de_pokemon <?php echo $tipo['tipo'] ?>">
                    <img class="img_tipos_de_pokemon" src="./imagenes/tipos/<?php echo $tipo['icon']?>">
                    <span class=""> <?php echo $tipo['tipo'] ?></span>
                </div>
                <?php
        }else{
                            ?>
                <div class="tipos_de_pokemon2 >">
                    <img class="img_tipos_de_pokemon p-0" src="./imagenes/tipos/<?php echo $tipo['icon']?>">
                </div>
                <?php
        }
    
    }

}



function generarTarjetas($pokemones,$tipos, $pokemones_tipos){
    for ($i = 0; $i < sizeof($pokemones); $i++) {
        
        $numeroFormateado = sprintf("%03d", $pokemones[$i]['nro']);
        generarPopÚpEliminar($pokemones[$i], $numeroFormateado);
        $resumen = extraerTexto($pokemones[$i]['informacion'], ".");
        ?>
        <div class="card border-0 ">
            <img class="card-img-top w-100" id="img_card" src="./imagenes/pokemones/<?php echo $pokemones[$i]['imagen'] ?>"
                alt="<?php echo $pokemones[$i]['imagen'] ?>">
            <div class="card-body d-flex flex-column justify-content-between ">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?php echo $pokemones[$i]['nombre'] ?>
                        <cite title="Source Title" id="subtitulo"> #<?php echo $numeroFormateado ?></cite>
                    </h5>
                    <div class="d-flex gap-3" style="gap: 5px;">
                        <?php generarTarjetaDeTipo(obtenerTiposDeUnPokemon($pokemones[$i], $tipos, $pokemones_tipos), false) ?>
                    </div>
                </div>
                

                <p class="card-text">
                    <?php echo $resumen ?>
                </p>
                <div class="card_botones card_div_price_buton d-flex">
                    <a href="./details.php?id=<?php echo $pokemones[$i]['id'] ?>" class="btn w-100"
                        id="<?php echo $pokemones[$i]['id'] ?>">View more ></a>
                </div>
                <div class="card_edicion card_div_price_buton d-flex pt-2">
                    <a href="./administrar.php?editar=<?php echo $pokemones[$i]['id'] ?>" class="btn btn-outline-info w-100 "
                        id="<?php echo $pokemones[$i]['id'] ?>">Editar contenido</a>
                    <button type="button" class="btn  btn-outline-danger w-100" data-toggle="modal" data-target="#exampleModal<?php echo $pokemones[$i]['id'] ?>">
                    Eliminar</button>
                </div>
            </div>
        </div>
        <?php
    };
}

function generarPopÚpEliminar($pokemon, $numeroFormateado){
    ?>
    <div class="modal fade" id="exampleModal<?php echo $pokemon['id'] ?>" tabindex="-1" role="dialog" 
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="card-title">Eliminar: <?php echo $pokemon['nombre'] ?>
                        <cite title="Source Title" id="subtitulo"> #<?php echo $numeroFormateado ?></cite>
                    </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Esta seguro de que desea eliminar este pokemon? Una vez realize esta accion no podra deshacer los cambios realizados</p>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn " data-dismiss="modal">Volver a inicio</button>
                        <button type="button" class="btn btn-danger" id=" <?php echo $pokemon['id']?>">Elimina pokemon</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

function obtenerTiposDeUnPokemon($pokemon, $tipos, $pokemones_tipos){
    $tiposDelPokemon = array();
    for ($i=0; $i < sizeof($pokemones_tipos); $i++) { 
        if($pokemones_tipos[$i]['id_pokemon'] == $pokemon['id']){
            array_push($tiposDelPokemon, buscarTipo($tipos, 'id' ,$pokemones_tipos[$i]['id_tipo']));
        }
    }
    return $tiposDelPokemon;
}

function buscarTipo($tipos, $propiedad, $valor_buscado){
    for ($i=0; $i < sizeof($tipos); $i++) { 
        if($tipos[$i][$propiedad] == $valor_buscado){
            return $tipos[$i];
        }
    }
        
}


function extraerTexto($texto, $discriminante){
    $resultado = "";
    for ($i = 0; $i < strlen($texto); $i++) {
        if ($texto[$i] != $discriminante) $resultado .= $texto[$i];
        else break;
    }
    return $resultado;
}




?>