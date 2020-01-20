<?php

include '../usuarioControlador.php';
include '../helps.php';

session_start();

if(isset($_POST["txtEmail"]) && isset($_POST["txtPassword"]))
{
	$txtUsuario = validar_campos( $_POST["txtEmail"] );
	$txtPassword = validar_campos($_POST["txtPassword"] );

	if( usuarioControlador::login($txtUsuario,$txtPassword))
	{

	 	//echo $usuario->getNickname();
		$usuario = usuarioControlador::get($txtUsuario,$txtPassword);

		$_SESSION["usuario"] = array(
			"nombre" =>  $usuario->getNombre(),
			"a_paterno" =>  $usuario->getA_paterno(),
			"a_materno" =>  $usuario->getA_materno(),
			"email" =>  $usuario->getEmail(),
			"nickname" =>  $usuario->getNickname()
		);
		//return print(json_encode($resultado));
	}
}

if(!isset($_SESSION["usuario"]))
  {

		header("location:login.html");
  }
  else
  {
		//$resultado = array("estado" => "true");
		//return print(json_encode($resultado));
		header("location:../index.php");
  }



//echo "adasdas";
?>
