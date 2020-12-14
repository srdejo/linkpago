<?php

class Comercio
{
	//atributos
	public $id;
	public $nombre;
	public $nit;
	public $direccion;

	//constructor de la clase
	function __construct($id, $nombre, $nit, $direccion)
	{
		$this->id=$id;
		$this->nombre=$nombre;
		$this->nit=$nit;
		$this->direccion=$direccion;
	}

	//función para obtener todos los Comercios
	public static function all(){
		$listaComercios =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM comercio');

		// carga en la $listaComercios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $rol) {
			$listaComercios[]= new Rol($rol['id'],$rol['nombre'],$rol['nit'],$rol['direccion']);
		}
		return $listaComercios;
    }
}