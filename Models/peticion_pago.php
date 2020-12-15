<?php

class PeticionPago
{
    public $id;
    public $descripcion;
    public $monto;
    public $comision;
    public $franquisia;
    public $comercio_id;
    public $forma_pago_id;
    public $estado;

    //constructor de la clase
    function __construct($id, $descripcion, $monto, $comision, $franquisia, $comercio_id, $forma_pago_id, $estado)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->monto = $monto;
        $this->comision = $comision;
        $this->franquisia = $franquisia;
        $this->comercio_id = $comercio_id;
        $this->forma_pago_id = $forma_pago_id;
        $this->estado = $estado;
    }

    public static function save($peticion_pago)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO PETICION_PAGO VALUES(null,:descripcion,:monto,:comision,:franquisia,:comercio_id,:forma_pago_id)');
        $insert->bindValue('descripcion', $peticion_pago->descripcion);
        $insert->bindValue('monto', $peticion_pago->monto);
        $insert->bindValue('comision', $peticion_pago->comision);
        $insert->bindValue('franquisia', $peticion_pago->franquisia);
        $insert->bindValue('comercio_id', $peticion_pago->comercio_id);
        $insert->bindValue('forma_pago_id', $peticion_pago->forma_pago_id);
        $insert->execute();
        return Db::ultimoId();
    }

    //función para obtener todos los usuarios
    public static function all()
    {
        $listaPagos = [];
        $db = Db::getConnect();
        $sql = $db->query('SELECT P.*, L.token, L.fecha_uso, CASE WHEN L.fecha_uso IS NULL THEN "PENDIENTE" ELSE "PAGO" END AS estado FROM PETICION_PAGO P INNER JOIN LINK_PAGOS L ON P.id = L.peticion_pago_id');

        foreach ($sql->fetchAll() as $link) {
            $listaPagos[] = new PeticionPago(
                $link['id'],
                $link['descripcion'],
                $link['monto'],
                $link['comision'],
                $link['franquisia'],
                $link['comercio_id'],
                $link['token'],
                $link['estado']
            );
        }
        return $listaPagos;
    }

    public static function getByToken($token)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT p.* FROM `peticion_pago` p INNER JOIN link_pagos l ON p.id = l.peticion_pago_id WHERE token = :token AND fecha_uso IS NULL');
        $select->bindValue('token', $token);
        $select->execute();

        //asignarlo al objeto usuario
        $peticionPagoDb = $select->fetch();
        $peticionPago = new PeticionPago(
            $peticionPagoDb['id'],
            $peticionPagoDb['descripcion'],
            $peticionPagoDb['monto'],
            $peticionPagoDb['comision'],
            $peticionPagoDb['franquisia'],
            $peticionPagoDb['comercio_id'],
            $peticionPagoDb['forma_pago_id'],
            "PENDIENTE"
        );
        return $peticionPago;
    }

    //la función para obtener un usuario por el usuario
    public static function getByUsuario($usuario)
    {
        //buscar
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
        $select->bindValue('usuario', $usuario);
        $select->execute();
        //asignarlo al objeto usuario
        $usuarioDb = $select->fetch();
        $usuario = new Usuario($usuarioDb['usuario'], $usuarioDb['clave'], $usuarioDb['rol_id']);
        return $usuario;
    }
}
