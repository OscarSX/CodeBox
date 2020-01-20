<?php

class conexion{

	/*
	Conexion a la base de datos con PDO
	*/

	public static function Conectar()
	{
		try {
			$conexion = new PDO("mysql:host=localhost; dbname=codebox","root","");
			//echo "conectado";
			return $conexion;

		} catch (PDOException $ex) {
			die($ex->getMessage());
		}
	}
}
//Conexion::Conectar();
