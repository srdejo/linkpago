<?php

class Rol
{
	//atributos
	public $id;
	public $rol;

	//constructor de la clase
	function __construct($id, $rol)
	{
		$this->id=$id;
		$this->rol=$rol;
	}

	//función para obtener todos los usuarios
	public static function all(){
		$listaRoles =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM roles');

		// carga en la $listaRoles cada registro desde la base de datos
		foreach ($sql->fetchAll() as $rol) {
			$listaRoles[]= new Rol($rol['id'],$rol['rol']);
		}
		return $listaRoles;
    }
}