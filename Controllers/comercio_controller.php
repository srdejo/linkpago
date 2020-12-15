<?php

class ComercioController
{
	public function __construct()
	{
	}

	public function index()
	{
		$comercios = Comercio::all();
		require_once('Views/comercio/index.php');
	}

	public function register()
	{
		require_once('Views/comercio/register.php');
	}

	//guardar
	public function save($comercio, $usuario)
	{
		try {

			$id_comercio =  Comercio::save($comercio);
			Usuario::save($usuario);
			$comercio_usuario = new ComercioUsuario($id_comercio, $usuario->usuario);
			ComercioUsuario::save($comercio_usuario);
			header('Location: ../index.php?controller=comercio&action=index');
		} catch (Exception $e) {
			echo $e->getMessage(), "\n";
		}
	}

	public function error()
	{
		require_once('Views/comercio/error.php');
	}
}


//obtiene los datos del comercio desde la vista y redirecciona a comercioController.php
if (isset($_POST['action'])) {
	$comercioController = new comercioController();
	//se añade el archivo comercio.php
	require_once('../Models/comercio.php');
	//se añade el archivo comercio.php
	require_once('../Models/usuario.php');
	//se añade el archivo comercio.php
	require_once('../Models/comercio_usuario.php');

	//se añade el archivo para la conexion
	require_once('../connection.php');

	if ($_POST['action'] == 'register') {
		$comercio = new Comercio(null, $_POST['nombre'], $_POST['nit'], $_POST['direccion']);
		$usuario = new Usuario($_POST['usuario'], $_POST['clave'], $_POST['rol_id']);
		$comercioController->save($comercio, $usuario);
	}
}
