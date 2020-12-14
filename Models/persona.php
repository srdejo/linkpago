<?php

class Persona
{
    public $nombre;
    public $apellido;
    public $direccion;
    public $correo;
    public $telefono;

    function __construct($nombre,$apellido,$direccion,$correo,$telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }

    public static function save($persona)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO PERSONA VALUES(null,:nombre, :apellido, :direccion, :correo, :telefono)');
        $insert->bindValue('nombre', $persona->nombre);
        $insert->bindValue('apellido', $persona->apellido);
        $insert->bindValue('direccion', $persona->direccion);
        $insert->bindValue('correo', $persona->correo);
        $insert->bindValue('telefono', $persona->telefono);
		$insert->execute();
        return Db::ultimoId();
    }
}
