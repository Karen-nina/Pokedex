<?php


function generarAdministradorEditable($pokemones, $tipos, $pokemones_tipos){
foreach ($pokemones as $pokemon) {
    if($pokemon['id'] == $_GET['editar']){
        ?>
        <form action="" id="administrar">
                <div class="infoBasica"> 
                    <div id="infoBasica_div1">
                        <img id="imagen_enviada" src="./imagenes/pokemones/<?php echo $pokemon['imagen']?>" alt="<?php echo $pokemon['imagen']?>">
                        <div id="editarImagen" >
                            <img src="./imagenes/icono_editar.png" alt="" class="w-100 p-5">
                            <input type="file" id="fileInput" style="display: none;">
                        </div> 
                    </div>
                    <div class="w-100">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Numero en la pokedex</label>
                                <input type="number" class="form-control" id="nombre"  value="<?php echo $pokemon['nro']?>"  placeholder="Ingrese el numero">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre"  value="<?php echo $pokemon['nombre']?>"  placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipos_multiple">Tipo de pockemon</label>
                                <select name="tipos_multiple" class="form-control w-100" id="tipos_multiple" multiple>
                                    <<?php generarFiltrosDeUnaArray($tipos, obtenerTiposDeUnPokemon($pokemon, $tipos, $pokemones_tipos));?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3"><?php echo $pokemon['informacion']?></textarea>
                        </div>
        
                    </div>
                
                </div>

                <div class="border-top py-4">
                    <h5>Caracteristicas base</h5>
                    <div class="form-row align-items-end">
                        
                        <div class="form-group col-md-2">
                            <label for="ps">Puntos de salud</label>
                            <input type="number" class="form-control" id="ps" value="<?php echo $pokemon['ps']?>"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ataque">Puntos de ataque</label>
                            <input type="number" class="form-control" id="ataque" value="<?php echo $pokemon['ataque']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="defensa">Puntos de defensa</label>
                            <input type="number" class="form-control" id="defensa" value="<?php echo $pokemon['defensa']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="at_especial">Puntos de ataque especial</label>
                            <input type="number" class="form-control" id="at_especial" value="<?php echo $pokemon['at_especial']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="def_especial">Puntos de defensa especial</label>
                            <input type="number" class="form-control" id="def_especial" value="<?php echo $pokemon['def_especial']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="velocidad">Puntos de velocidad</label>
                            <input type="number" class="form-control" id="velocidad" value="<?php echo $pokemon['velocidad']?>" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" >
                        </div>                  
                    </div>
                </div>


                
                <button id="boton_busqueda" class="btn" type="submit">Modificar pokemon </button>
            </form>
        <?php
    }
}
}

function generarAdministrador(){
    ?>
    <form action="" id="administrar" method="POST">
            <div class="infoBasica"> 
                <div id="infoBasica_div1">
                    <img id="imagen_enviada" src="./imagenes/silueta.jpg" alt="">
                    <div id="editarImagen" >
                        <img src="./imagenes/icono_editar.png" alt="" class="w-100 p-5">
                        <input type="file" id="fileInput" style="display: none;">
                    </div> 
                </div>
                <div class="w-100">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Numero en la pokedex</label>
                            <input type="number" class="form-control" id="nro" name="nro"placeholder="Ingrese el numero" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipos_multiple">Tipo de pockemon</label>
                            <select name="tipos_multiple" class="form-control w-100" id="tipos_multiple" multiple required>
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
                        <input type="number" class="form-control" id="ps"  placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ataque">Puntos de ataque</label>
                        <input type="number" class="form-control" id="ataque" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="defensa">Puntos de defensa</label>
                        <input type="number" class="form-control" id="defensa" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="at_especial">Puntos de ataque especial</label>
                        <input type="number" class="form-control" id="at_especial" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="def_especial">Puntos de defensa especial</label>
                        <input type="number" class="form-control" id="def_especial" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="velocidad">Puntos de velocidad</label>
                        <input type="number" class="form-control" id="velocidad" placeholder="Ingrese un numero" min="1" pattern="^[0-9]+" required>
                    </div>                  
                </div>
            </div>



        <button id="boton_agregar" class="btn btn-primary" type="submit" name="accion" value="agregar">Agregar Pokémon</button>

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

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    agregarPokemon();
    }
function agregarPokemon (){

        $validacion = validarPokemon();
        if ($validacion){
        $conexion=abrirBdd();
        $nro = $_POST['nro'];
        $nombre = $_POST['nombre'];
        $tipos = implode(',', $_POST['tipos_multiple']); // Convertir el array de tipos en una cadena
        $informacion = $_POST['informacion'];
        $ps = $_POST['ps'];
        $ataque = $_POST['ataque'];
        $defensa = $_POST['defensa'];
        $at_especial = $_POST['at_especial'];
        $def_especial = $_POST['def_especial'];
        $velocidad = $_POST['velocidad'];
        $query= "INSERT INTO `Pokemon` (`nro`, `imagen`, `nombre`, `ps`, `ataque`, `defensa`, `at_especial`, `def_especial`, `velocidad`, `informacion`) VALUES
        ('$nro', 'imagen.png', '$nombre', '$ps', '$ataque', '$defensa', '$at_especial', '$def_especial', '$velocidad', '$informacion')";

        $resultado = mysqli_query($conexion, $query);
        if ($resultado){
            echo "pokemon agregado";
        }else{
            echo "no se pudo agregar";
        }
        $conexion->close();
    }else{
            echo "ocurrio un error al agregar pokemon";
        }
}

function validarPokemon(){
    $nroPokemon = $_POST['nro'];
    $nombrePokemon = $_POST['nombre'];
    $conexion = abrirBdd();
    $query = "SELECT COUNT(*) as count FROM Pokemon WHERE nro = '$nroPokemon' AND nombre = '$nombrePokemon'";
    $resultado = mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) > 0){
        return false;
    }else{
        return true;
    }
    $conexion->close();
}

function editarPokemon (){


}



function eliminarPokemon(){


}

?>