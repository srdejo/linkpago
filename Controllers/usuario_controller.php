<?php 

	class UsuarioController
	{	
		public function __construct(){}

		public function index(){
			$usuarios=Usuario::all();
			require_once('Views/Usuario/index.php');
		}

		public function register(){
			$roles = Rol::all();
			require_once('Views/Usuario/register.php');
		}
		
		public function login($usuario){
			$roles = Usuario::login($usuario);
			header('Location: ../index.php');
		}

		//guardar
		public function save($usuario){
			Usuario::save($usuario);
			header('Location: ../index.php');
		}

		public function update($usuario){
			Usuario::update($usuario);
			header('Location: ../index.php');
		}

		public function delete($id){
			//se está de dentro del directorio Controllers y se debe salir con ../
			require_once('../Models/usuario.php');
			Usuario::delete($id);
			header('Location: ../index.php');
		}
		
		public function error(){
			require_once('Views/Usuario/error.php');
		} 
	}


	//obtiene los datos del usuario desde la vista y redirecciona a UsuarioController.php
	if (isset($_POST['action'])) {
		$usuarioController= new UsuarioController();
		//se añade el archivo usuario.php
		require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		require_once('../connection.php');

		if ($_POST['action']=='register') {
			$usuario= new Usuario($_POST['usuario'],$_POST['clave'],$_POST['rol_id']);
			$usuarioController->save($usuario);
		}elseif ($_POST['action']=='update') {
			$usuario= new Usuario($_POST['usuario'],$_POST['clave'],$_POST['rol_id']);
			$usuarioController->update($usuario);
		}elseif($_POST['action']=='login'){
			$usuario= new Usuario($_POST['usuario'],$_POST['clave'],null);
			$usuarioController->login($usuario);
		}
	}

	//se verifica que action esté definida
	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'&$_GET['action']!='index') {
			require_once('../connection.php');
			$usuarioController=new UsuarioController();
			//para eliminar
			if ($_GET['action']=='delete') {		
				$usuarioController->delete($_GET['usuario']);
			}elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('../Models/rol.php');	
				require_once('../Models/usuario.php');	
				$roles = Rol::all();			
				$usuario=Usuario::getByUsuario($_GET['usuario']);		
				//var_dump($usuario);
				//$usuarioController->update();
				require_once('../Views/Usuario/update.php');
			}	
		}	
	}
?>