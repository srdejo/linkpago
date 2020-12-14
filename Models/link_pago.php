<?php

class LinkPago
{
    public $token;
    public $fecha_uso;
    public $peticion_pago_id;

    function __construct($token, $peticion_pago_id, $fecha_uso)
    {
        $this->fecha_uso = $fecha_uso;
        $this->token = $token;
        $this->peticion_pago_id = $peticion_pago_id;
    }

    
    public static function save($peticion_pago_id)
    {
        $token = uniqid();
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO LINK_PAGOS VALUES(null,:token, null, :peticion_pago_id)');
        $insert->bindValue('token', $token);
        $insert->bindValue('peticion_pago_id', $peticion_pago_id);
		$insert->execute();
    }

    public static function usar($token){
        $db=Db::getConnect();
		$update=$db->prepare('UPDATE LINK_PAGOS SET fecha_uso=:fecha_uso WHERE token=:token');
		$update->bindValue('fecha_uso', date('Y-m-d H:i:s'));
		$update->bindValue('token',$token);
		$update->execute();
    }

}