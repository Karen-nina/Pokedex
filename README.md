# Pokedex

Pokedex es una pagina web que permite a los usuarios consultar información de los distintos pokemones, y los usuarios registrados pueden agregar, eliminar o modificar pokemones.


![Logo](/imagenes/presentacion/home.png)

## Indice
* [Funcionalidades principales](#funcionalidades-principales)
* [Objetivo](#objetivo)
* [Screenshots](#screenshots)
* [Lenguajes](#-Lenguajes)
* [Como ejecutar](#como-ejecutar)
* [Colaboradores](#colaboradores)

## Funcionalidades principales
- Buscar pokemones por tipo (agua-fuego-tierra, etc.)
- Buscar pokemon por nombre
- Registra usuarios como administradores
- El usuario logueado puede dar de alta un pokemon
- El usuario logueado puede dar de baja un pokemon
- El usuario logueado puede editar un pokemon

## Objetivo
El proyecto se realizó con el objetivo de implementar los conceptos básicos de PHP antes de iniciar un proyecto MVC.

## Screenshots
![Logo](/imagenes/presentacion/registrarse.png)
![Logo](/imagenes/presentacion/editar.png)
![Logo](/imagenes/presentacion/espec.png)

## 🛠 Lenguajes
HTML, CSS, JavaScript, PHP, MySQL.

## Como ejecutar
El proyecto debe clonarse en la carpeta htdocs del xampp.
```
$ git clone https://github.com/rociocrespo200/Pokedex.git
```
Ver la pagina
```
localhost:(port)/Pokedex
```
La base de datos se encuentra en la carpeta /data/data_pokedex.sql, la conexion a la base esta configurada por defecto en el usuario "root" y contraseña vacia, si se quiere cambiar puede hacerlo desde el archivo php/conection.php  
```
function abrirBdd(){
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "pokedex";

    return mysqli_connect($servidor, $usuario, $contraseña, $baseDeDatos);
}
```

## Colaboradores
- Rocio Belen Crespo - https://www.github.com/rociocrespo200
- Karen Nina Coela - https://github.com/Karen-nina
- Duilio Martin Rubio - https://github.com/DuRubio
- Emiliano Javier Roldán - https://github.com/EmilianoRold4n
