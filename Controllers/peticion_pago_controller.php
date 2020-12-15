<?php

class PeticionPagoController
{
    public function __construct()
    {
    }

    public function index()
    {
        $comercios = Comercio::all();        
        $forma_pagos = FormaPago::all();
        $pagos = PeticionPago::all();
        require_once('Views/PeticionPago/index.php');
    }
/*
    public function register()
    {        
        $comercios = Comercio::all();        
        $forma_pagos = FormaPago::all();
        require_once('Views/PeticionPago/register.php');
    }
*/
    //guardar
    public function save($peticion_pago)
    {
        $peticion_pago_id = PeticionPago::save($peticion_pago);
        LinkPago::save($peticion_pago_id);
        header('Location: ../index.php');
    }


    public function error()
    {
        require_once('Views/comercio/error.php');
    }
}

if (isset($_POST['action'])) {
    $pagoController= new PeticionPagoController();
    require_once('../Models/link_pago.php');
    
    require_once('../Models/peticion_pago.php');
    //se añade el archivo para la conexion
    require_once('../connection.php');

    if ($_POST['action']=='register') {
        $peticion_pago = new PeticionPago(null, $_POST['descripcion'],$_POST['monto'],$_POST['comision'], $_POST['franquisia'],$_POST['comercio_id'],$_POST['forma_pago_id'], null);
        $pagoController->save($peticion_pago);
    }		
}