<?php
$servidor ="localhost";
$usuario = "root";
$contraseña = "46521541";
$baseDeDatos = "pokedex";

$conexion = mysqli_connect($servidor,$usuario,$contraseña,$baseDeDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);

}
$resultado1 = mysqli_query($conexion,"SELECT * FROM Pokemon");
$resultado2 = mysqli_query($conexion,"SELECT * FROM Tipo");
$resultado3 = mysqli_query($conexion,"SELECT * FROM Pokemon_tipo");

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


// for ($i=0; $i < sizeof($pokemones); $i++) { 
//     echo $pokemones[$i]['nombre'];
// };
// echo "<br>";
// for ($i=0; $i < sizeof($tipos); $i++) { 
//     echo $tipos[$i]['tipo'];
// };
// echo "<br>";
// for ($i=0; $i < sizeof($pokemones_tipos); $i++) { 
//     echo $pokemones_tipos[$i]['id_pokemon'];
// };

?>