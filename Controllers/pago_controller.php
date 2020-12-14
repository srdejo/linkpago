<?php

class PagoController
{
    public function __construct()
    {
    }

    public function index()
    {
        $comercios = Comercio::all();
        require_once('Views/Pago/index.php');
    }

    public function token()
    {
        $token = $_GET['token'];
        $peticion_pago = PeticionPago::getByToken($token);
        $comercios = Comercio::all();
        $forma_pagos = FormaPago::all();
        require_once('Views/Pago/register.php');
    }

    //guardar
    public function save($persona, $pago, $token)
    {
        $persona_id = Persona::save($persona);
        $pago->persona_id = $persona_id;
        Pago::save($pago);
        LinkPago::usar($token);
        header('Location: ../index.php');
    }

    public function error()
    {
        require_once('Views/pago/error.php');
    }
}

if (isset($_POST['action'])) {
    $pagoController = new PagoController();
    require_once('../Models/pago.php');
    require_once('../Models/persona.php');
    require_once('../Models/link_pago.php');

    //se añade el archivo para la conexion
    require_once('../connection.php');

    if ($_POST['action'] == 'register') {
        $referencia_efecty = isset($_POST['referencia_efecty']) ? $_POST['referencia_efecty'] : null;
        $numero_tarjeta = isset($_POST['numero_tarjeta']) ? $_POST['numero_tarjeta'] : null;
        $pago = new Pago($_POST['peticion_pago_id'], null, $referencia_efecty, $numero_tarjeta);
        $persona = new Persona($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['correo'], $_POST['telefono']);
        $token = $_POST['token'];
        $pagoController->save($persona, $pago, $token);
    }
}
