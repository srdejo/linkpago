<?php

class Pago
{
    public $peticion_pago_id;
    public $persona_id;
    public $referencia_efecty;
    public $numero_tarjeta;

    function __construct($peticion_pago_id,$persona_id,$referencia_efecty,$numero_tarjeta)
    {
        $this->peticion_pago_id = $peticion_pago_id;
        $this->persona_id = $persona_id;
        $this->referencia_efecty = $referencia_efecty;
        $this->numero_tarjeta = $numero_tarjeta;
    }

    public static function save($pago)
	{
		$db = Db::getConnect();
		$insert = $db->prepare('INSERT INTO TRANSACCION VALUES(null,:peticion_pago_id,:persona_id,:referencia_efecty,:numero_tarjeta)');
		$insert->bindValue('peticion_pago_id', $pago->peticion_pago_id);
		$insert->bindValue('persona_id', $pago->persona_id);
		$insert->bindValue('referencia_efecty', $pago->referencia_efecty);
		$insert->bindValue('numero_tarjeta', $pago->numero_tarjeta);
		$insert->execute();
	}
    
}