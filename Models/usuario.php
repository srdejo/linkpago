<?php

class Usuario
{
	//atributos
	public $usuario;
	public $clave;
	public $rol;

	//constructor de la clase
	function __construct($usuario, $clave, $rol)
	{
		$this->usuario = $usuario;
		$this->clave = $clave;
		$this->rol = $rol;
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

	//la función para registrar un usuario
	public static function save($usuario)
	{
		$db = Db::getConnect();
		$insert = $db->prepare('INSERT INTO USUARIOS VALUES(:usuario,:clave,:rol_id)');
		$insert->bindValue('usuario', $usuario->usuario);
		$insert->bindValue('clave', $usuario->clave);
		$insert->bindValue('rol_id', $usuario->rol);
		$insert->execute();
	}

	//la función para actualizar 
	public static function update($usuario)
	{
		$db = Db::getConnect();
		$update = $db->prepare('UPDATE usuarios SET clave=:clave, rol_id=:rol_id WHERE usuario=:usuario');
		$update->bindValue('usuario', $usuario->usuario);
		$update->bindValue('clave', $usuario->clave);
		$update->bindValue('rol_id', $usuario->rol);
		$update->execute();
	}

	// la función para eliminar por el usuario
	public static function delete($usuario)
	{
		$db = Db::getConnect();
		$delete = $db->prepare('DELETE FROM usuarios WHERE usuario=:usuario');
		$delete->bindValue('usuario', $usuario);
		$delete->execute();
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

	public static function login($usuario)
	{
		//buscar
		$db = Db::getConnect();
		$select = $db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario AND clave=:clave');
		$select->bindValue('usuario', $usuario->usuario);
		$select->bindValue('clave', $usuario->clave);
		$select->execute();

		//asignarlo al objeto usuario
		$usuarioDb = $select->fetch();
		if (!$usuarioDb) {
			return false;
		} else { 
			$_SESSION['user_id'] = $usuarioDb['usuario'];
			return true;
		}
	}
}
