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

    //constructor de la clase
    function __construct($id, $descripcion, $monto, $comision, $franquisia, $comercio_id, $forma_pago_id)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->monto = $monto;
        $this->comision = $comision;
        $this->franquisia = $franquisia;
        $this->comercio_id = $comercio_id;
        $this->forma_pago_id = $forma_pago_id;
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
        $listaUsuarios = [];
        $db = Db::getConnect();
        $sql = $db->query('SELECT * FROM usuarios u INNER JOIN roles r ON u.rol_id = r.id');

        // carga en la $listaUsuarios cada registro desde la base de datos
        foreach ($sql->fetchAll() as $usuario) {
            $listaUsuarios[] = new Usuario($usuario['usuario'], $usuario['clave'], $usuario['rol']);
        }
        return $listaUsuarios;
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
            $peticionPagoDb['forma_pago_id']
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
