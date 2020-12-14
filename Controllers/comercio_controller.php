<?php 

	class ComercioController
	{	
		public function __construct(){}

		public function index(){
			$comercios=Comercio::all();
			require_once('Views/comercio/index.php');
		}

		public function register(){
			require_once('Views/comercio/register.php');
		}

		//guardar
		public function save($comercio, $usuario){
			$id_comercio =  Comercio::save($comercio);
			Usuario::save($usuario);
			$comercio_usuario = new ComercioUsuario($id_comercio, $usuario->usuario);
			ComercioUsuario::save($comercio_usuario);

			header('Location: ../index.php');
		}

/* 		public function update($comercio){
			Comercio::update($comercio);
			header('Location: ../index.php');
		}

		public function delete($id){
			//se está de dentro del directorio Controllers y se debe salir con ../
			require_once('../Models/Comercio.php');
			Comercio::delete($id);
			header('Location: ../index.php');
		} */
		
		public function error(){
			require_once('Views/comercio/error.php');
		} 
	}


	//obtiene los datos del comercio desde la vista y redirecciona a comercioController.php
	if (isset($_POST['action'])) {
		$comercioController= new comercioController();
		//se añade el archivo comercio.php
		require_once('../Models/comercio.php');
		//se añade el archivo comercio.php
		require_once('../Models/usuario.php');		
		//se añade el archivo comercio.php
		require_once('../Models/comercio_usuario.php');
		
		//se añade el archivo para la conexion
		require_once('../connection.php');

		if ($_POST['action']=='register') {
			$comercio= new Comercio(null, $_POST['nombre'], $_POST['nit'], $_POST['direccion']);
			$usuario= new Usuario($_POST['usuario'],$_POST['clave'],$_POST['rol_id']);
			$comercioController->save($comercio, $usuario);
		}elseif ($_POST['action']=='update') {
			$comercio= new Comercio(null, $_POST['nombre'], $_POST['nit'], $_POST['direccion']);
			/* $comercioController->update($comercio); */
		}		
	}
/* 
	//se verifica que action esté definida
	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'&$_GET['action']!='index') {
			require_once('../connection.php');
			$comercioController=new comercioController();
			//para eliminar
			if ($_GET['action']=='delete') {		
				$comercioController->delete($_GET['comercio']);
			}elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('../Models/rol.php');	
				require_once('../Models/comercio.php');	
				$roles = Rol::all();			
				$comercio=comercio::getBycomercio($_GET['comercio']);		
				//var_dump($comercio);
				//$comercioController->update();
				require_once('../Views/comercio/update.php');
			}	
		}	
	} */
