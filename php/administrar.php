<?php

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    if ($accion === 'agregar') {
        agregarPokemon();
    } elseif ($accion === 'editar') {
        if (isset($_GET['editar'])) {
            editarPokemon($_GET['editar']);
        }
    }
    unset($_SESSION['filtros']);
    header('Location: ./index.php');
}

function eliminarPokemon(){
    $id = $_GET['eliminar'];
    $conn = abrirBdd();

    mysqli_query($conn, "DELETE FROM Pokemon_Tipo WHERE id_pokemon = $id;");
    mysqli_query($conn,"DELETE FROM Pokemon WHERE id = $id;");

    header('Location: ./index.php');
    $conn->close();
}

function generarAdministradorEditable($pokemones, $tipos, $pokemones_tipos){
foreach ($pokemones as $pokemon) {
    if($pokemon['id'] == $_GET['editar']){
        ?>
        <form action="" id="administrar" method="post" enctype="multipart/form-data">
                <div class="infoBasica"> 
                    <div id="infoBasica_div1">
                        <img id="imagen_enviada" src="./imagenes/pokemones/<?php echo $pokemon['imagen']?>" alt="<?php echo $pokemon['imagen']?>">
                        <div id="editarImagen" >
                            <img src="./imagenes/icono_editar.png" alt="" class="w-100 p-5">
                            <input type="file" id="fileInput" name="fileInput" style="display: none;">
                        </div> 
                    </div>
                    <div class="w-100">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Numero en la pokedex</label>
                                <input type="number" class="form-control" id="nro" name="nro"  value="<?php echo $pokemon['nro']?>"  placeholder="Ingrese el numero">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $pokemon['nombre']?>"  placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipos_multiple">Tipo de pockemon</label>
                                <select name="tipos_multiple[]" class="form-control w-100" id="tipos_multiple" multiple>
                                    <?php generarFiltrosDeUnaArray($tipos, obtenerTiposDeUnPokemon($pokemon, $tipos, $pokemones_tipos));?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control"  id="informacion"  name="informacion" rows="3"><?php echo $pokemon['informacion']?></textarea>
                        </div>
        
                    </div>
                
                </div>

                <div class="border-top py-4">
                    <h5>Caracteristicas base</h5>
                    <div class="form-row align-items-end">
                        
                        <div class="form-group col-md-2">
                            <label for="ps">Puntos de salud</label>
                            <input type="number" class="form-control" id="ps" name="ps" value="<?php echo $pokemon['ps']?>"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ataque">Puntos de ataque</label>
                            <input type="number" class="form-control" id="ataque" name="ataque" value="<?php echo $pokemon['ataque']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="defensa">Puntos de defensa</label>
                            <input type="number" class="form-control" id="defensa" name="defensa" value="<?php echo $pokemon['defensa']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="at_especial">Puntos de ataque especial</label>
                            <input type="number" class="form-control" id="at_especial" name="at_especial" value="<?php echo $pokemon['at_especial']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="def_especial">Puntos de defensa especial</label>
                            <input type="number" class="form-control" id="def_especial" name="def_especial" value="<?php echo $pokemon['def_especial']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="velocidad">Puntos de velocidad</label>
                            <input type="number" class="form-control" id="velocidad" name="velocidad" value="<?php echo $pokemon['velocidad']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>                  
                    </div>
                </div>


            <button id="boton_editar" class="btn" type="submit" name="accion" value="editar">Modificar Pokémon</button>
            </br>
            <a class="btn btn-danger" href="./index.php">Cancelar</a>


            </form>


        <?php
        }
    }
}

function generarAdministrador(){
    ?>
    <form action="" id="administrar" method="POST"  enctype="multipart/form-data">
            <div class="infoBasica"> 
                <div id="infoBasica_div1">
                    <img id="imagen_enviada" src="./imagenes/silueta.jpg" alt="">
                    <div id="editarImagen" >
                        <img src="./imagenes/icono_editar.png" alt="" class="w-100 p-5">
                        <input type="file" id="fileInput" name="fileInput" style="display: none;">
                    </div> 
                </div>
                <div class="w-100">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Numero en la pokedex</label>
                            <input type="number" class="form-control" id="nro" name="nro" placeholder="Ingrese el numero" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipos_multiple">Tipo de pockemon</label>
                            <select name="tipos_multiple[]" class="form-control w-100" id="tipos_multiple" multiple>
                                <option value="1">Planta</option>
                                <option value="2">Fuego</option>
                                <option value="3">Agua</option>
                                <option value="4">Bicho</option>
                                <option value="5">Normal</option>
                                <option value="6">Volador</option>
                                <option value="7">Veneno</option>
                                <option value="8">Electrico</option>
                                <option value="9">Tierra</option>
                                <option value="10">Hada</option>
                                <option value="11">Lucha</option>
                                <option value="12">Psiquico</option>
                                <option value="13">Roca</option>
                                <option value="14">Fantasma</option>
                                <option value="15">Hielo</option>
                                <option value="16">Acero</option>
                                <option value="17">Dragon</option>
                            </select>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Informacion del pokemon</label>
                        <textarea class="form-control"  name="informacion" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
    
                </div>
            
            </div>

            <div class="border-top py-4">
                <h5>Caracteristicas base</h5>
                <div class="form-row align-items-end">
                    
                    <div class="form-group col-md-2">
                        <label for="ps">Puntos de salud</label>
                        <input type="number" class="form-control" id="ps" name="ps" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ataque">Puntos de ataque</label>
                        <input type="number" class="form-control" id="ataque" name="ataque" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="defensa">Puntos de defensa</label>
                        <input type="number" class="form-control" id="defensa" name="defensa"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="at_especial">Puntos de ataque especial</label>
                        <input type="number" class="form-control" id="at_especial" name="at_especial"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="def_especial">Puntos de defensa especial</label>
                        <input type="number" class="form-control" id="def_especial" name="def_especial"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="velocidad">Puntos de velocidad</label>
                        <input type="number" class="form-control" id="velocidad" name="velocidad" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>                  
                </div>
            </div>



        <button id="boton_agregar" class="btn btn-primary" type="submit" name="accion" value="agregar">Agregar Pokémon</button>
        <a class="btn btn-danger" href="./index.php">Cancelar</a>
    </form>

    <?php
}

function generarFiltrosDeUnaArray($tipos, $tiposSeleccionados){
    foreach($tipos as $tipo){
        if (in_array($tipo, $tiposSeleccionados)) {
            echo '<option selected value="'.$tipo['tipo'].'">'.$tipo['tipo'].'</option>';
        }else{
            echo '<option value="'.$tipo['tipo'].'">'.$tipo['tipo'].'</option>';
        }
    }
}

function agregarPokemon() {
    $validacion = validarPokemon();

    if ($validacion) {
        $conexion = abrirBdd();
        $nro = $_POST['nro'];
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];
        $ps = $_POST['ps'];
        $ataque = $_POST['ataque'];
        $defensa = $_POST['defensa'];
        $at_especial = $_POST['at_especial'];
        $def_especial = $_POST['def_especial'];
        $velocidad = $_POST['velocidad'];
        
        if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES["fileInput"]["tmp_name"] , "./imagenes/pokemones/" . $_FILES['fileInput']['name']);
            $imagen = $_FILES['fileInput']['name'];
        } else {
            $imagen =  "silueta.png";

        }
        


        $tipos = $_POST['tipos_multiple'];

        $queryPokemon =( "INSERT INTO `Pokemon` (`nro`, `imagen`, `nombre`, `ps`, `ataque`, `defensa`, `at_especial`, `def_especial`, `velocidad`, `informacion`) VALUES
            ('$nro', '$imagen', '$nombre', '$ps', '$ataque', '$defensa', '$at_especial', '$def_especial', '$velocidad', '$informacion')");

        
        $resultadoPokemon = mysqli_query($conexion, $queryPokemon);

        $idPokemon = mysqli_insert_id($conexion); 
        if ($resultadoPokemon) {
            // recorre los tipos
            foreach ($tipos as $tipo) {
                $queryTipo = "INSERT INTO Pokemon_Tipo (id_pokemon, id_tipo) VALUES ('$idPokemon', '$tipo')";
                echo $queryTipo . "\n";
                $resultadoTipo = mysqli_query($conexion, $queryTipo);

                if (!$resultadoTipo) {
                    echo "Error al insertar tipo: " . mysqli_error($conexion);
                }
            }

        }

        $conexion->close();
    }
}

function validarPokemon(){
    $nroPokemon = $_POST['nro'];
    $nombrePokemon = $_POST['nombre'];
    $conexion = abrirBdd();
    $query = "SELECT COUNT(*) as count FROM `Pokemon` WHERE nro = '$nroPokemon' OR nombre = '$nombrePokemon'";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        return false;
    }

    $fila = mysqli_fetch_assoc($resultado);
    $conteo = $fila['count'];

    if ($conteo > 0){
        return false; // Ya existe un Pokémon con ese número o nombre.
    } else {
        return true; // No existe un Pokémon con ese número o nombre.
    }

    $conexion->close();
}

function editarPokemon($id) {
    $conexion = abrirBdd();

    $pokemon = mysqli_query($conexion, "SELECT * FROM `Pokemon` WHERE id = '$id'");

    if (mysqli_num_rows($pokemon) > 0) {
        $pokemonExistente = mysqli_fetch_assoc($pokemon);
        $nro = $_POST["nro"];
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];
        $ps = $_POST['ps'];
        $ataque = $_POST['ataque'];
        $defensa = $_POST['defensa'];
        $at_especial = $_POST['at_especial'];
        $def_especial = $_POST['def_especial'];
        $velocidad = $_POST['velocidad'];

        if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES["fileInput"]["tmp_name"] , "./imagenes/pokemones/" . $_FILES['fileInput']['name']);
            $imagen = $_FILES['fileInput']['name'];
        } else {
            $imagen =  $pokemonExistente['imagen'];

        }

        $query = "UPDATE `pokedex`.`pokemon` SET `nro` = '$nro', `nombre` = '$nombre', `imagen` = '$imagen', `ps` = '$ps', `ataque` = '$ataque', 
        `defensa` = '$defensa', `at_especial` = '$at_especial', `def_especial` = '$def_especial', `velocidad` = '$velocidad', `informacion` = '$informacion' WHERE (`id` = '$id');";

        $modificarPokemonQuery = mysqli_query($conexion, $query);


        if ($modificarPokemonQuery) {
            $tiposActualizados = $_POST['tipos_multiple'];

            // Borra los tipos anteriores del Pokémon
            $queryBorrarTipos = "DELETE FROM `pokemon_tipo` WHERE id_pokemon = $id";
            mysqli_query($conexion, $queryBorrarTipos);

            // Inserta los nuevos tipos en la tabla pokemon_tipo
            foreach ($tiposActualizados as $tipo) {
                $tipo = trim($tipo); // Elimina espacios en blanco alrededor del nombre del tipo
                $queryInsertarTipo = "INSERT INTO `pokemon_tipo` (id_pokemon, id_tipo) VALUES ($id, (SELECT id FROM `tipo` WHERE tipo = '$tipo'))";
                mysqli_query($conexion, $queryInsertarTipo);
            }

        }

        
    }

    $conexion->close();
}



function traerValoresDeTipo($conexion, $tiposActualizados) {
    $valoresDeTipo = array();

    if (is_array($tiposActualizados)) {
        foreach ($tiposActualizados as $tipo) {
            $tipo = trim($tipo);
            $query = "SELECT id FROM tipo WHERE tipo = '$tipo'";
            $resultado = mysqli_query($conexion, $query);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);
                $idTipo = $fila['id'];
                $valoresDeTipo[] = $idTipo;
            }
        }
    }

    return $valoresDeTipo;
}


?>