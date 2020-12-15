<?php
if (!isset($_SESSION)) {
	session_start();
}

class Db
{
	private static $instance = NULL;

	private function __construct()
	{
	}

	private function __clone()
	{
	}

	public static function getConnect()
	{
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			self::$instance = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '', $pdo_options);
		}
		return self::$instance;
	}

	public static function ultimoId()
	{
		return self::$instance->lastInsertId();
	}
}
