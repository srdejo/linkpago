<?php

class ComercioUsuario
{
    public $usuario;
    public $id_comercio;

    //constructor de la clase
	function __construct($id_comercio, $usuario){        
		$this->usuario = $usuario;
		$this->id_comercio = $id_comercio;
    }

    public static function save($comercio_usuario){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO COMERCIO_USUARIO VALUES(:usuario,:id_comercio)');
        $insert->bindValue('usuario',$comercio_usuario->usuario);
        $insert->bindValue('id_comercio',$comercio_usuario->id_comercio);
        $insert->execute();
    }
}