<?php

class FormaPago
{
	//atributos
	public $id;
	public $forma_pago;

	//constructor de la clase
	function __construct($id, $forma_pago)
	{
		$this->id=$id;
		$this->forma_pago=$forma_pago;
	}

	//función para obtener todos los usuarios
	public static function all(){
		$listaFormaPago =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM forma_pago');

		foreach ($sql->fetchAll() as $forma_pago) {
			$listaFormaPago[]= new FormaPago($forma_pago['id'],$forma_pago['forma_pago']);
		}
		return $listaFormaPago;
    }
}