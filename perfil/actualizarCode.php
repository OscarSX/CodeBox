<?php
//session_start();
include '../usuarioControlador.php';
include '../helps.php';

session_start();
header('Content-Type: application/json');

$resultado = array("estado" => "true");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST["txtNombre"]) && isset($_POST["txtPaterno"]) && isset($_POST["txtMaterno"]) && isset($_POST["txtNickname"])  && isset($_POST["txtPassword"]) )

	{
			$txtNombre  = validar_campos($_POST["txtNombre"]);
			$txtUsuario =  $_POST["txtNickname"] ;  //nickname
			$txtPaterno = validar_campos($_POST["txtPaterno"]);
			$txtMaterno = validar_campos($_POST["txtMaterno"]);
			$txtPassword = validar_campos($_POST["txtPassword"] );
			$email= validar_campos($_POST["txtEmail"]);
			$ban = usuarioControlador::actualizar($txtNombre,$txtUsuario,$txtPaterno,$txtMaterno,$txtPassword,$email);

			if($ban)
			{

			 	//echo $usuario->getNickname();
				$usuario = new usuario();

				$usuario = usuarioControlador::get($email,$txtPassword);
				$_SESSION["usuario"] = array(

					"nombre" =>  $usuario->getNombre(),
					"a_paterno" =>  $usuario->getA_paterno(),
					"a_materno" =>  $usuario->getA_materno(),
					"email" =>  $usuario->getEmail(),
					"nickname" =>  $usuario->getNickname(),

					);




					header("location:perfil.php");
				//return print(json_encode($resultado));
			}

	}

}
else
{
header("location:perfil.php");
}
//sultado = array("estado" => "false");
//return print(json_encode($resultado));
//echo "adasdas";
