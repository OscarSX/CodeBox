<?php

include 'usuarioDao.php';
class usuarioControlador
{

	public static function get($email , $password)
	{
		$obj_usuario1 = new usuario();
		$obj_usuario1->setEmail($email);
		$obj_usuario1->setPassword($password);

		return usuarioDao::get($obj_usuario1);
	}

	public static function registrar($nombre,$a_paterno,$a_materno,$email,$nickname,$password)
	{
		$obj_usuario2 = new usuario();

		$obj_usuario2 ->setNombre($nombre);
		$obj_usuario2 ->setA_paterno($a_paterno);
		$obj_usuario2 ->setA_materno($a_materno);
		$obj_usuario2 ->setEmail($email);
		$obj_usuario2 ->setNickname($nickname);
		$obj_usuario2 ->setPassword($password);


		return usuarioDao::registrar($obj_usuario2);
	}


	public function login($email,$password)
	{
		$obj_usuario = new usuario();
		$obj_usuario->setEmail($email);
		$obj_usuario->setPassword($password);

		return usuarioDao::login($obj_usuario);
	}

	public function actualizar($nombre,$nickname,$a_paterno,$a_materno,$password,$email)
	{
		$obj_usuario2 = new usuario();

		$obj_usuario2 ->setNombre($nombre);
		$obj_usuario2 ->setA_paterno($a_paterno);
		$obj_usuario2 ->setA_materno($a_materno);
		$obj_usuario2 ->setEmail($email);
		$obj_usuario2 ->setNickname($nickname);
		$obj_usuario2 ->setPassword($password);


		return usuarioDao::actualizar($obj_usuario2);
	}

}
