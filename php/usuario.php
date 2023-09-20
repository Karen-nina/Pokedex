<?php
class Usuario
{
    private $nombre;
    private $apellido;
    private $usuario;
    private $clave;


    public function __construct($nombre, $apellido, $usuario, $clave)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }


}

?>