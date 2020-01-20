<?php

include '../usuarioControlador.php';
include '../assets/php/conexion.php';
include '../helps.php';


//header('Content-Type: application/json');

//$resultado = array("estado" => "true");

if(isset($_POST["txtNombre"]) && isset($_POST["txtPaterno"]) && isset($_POST["txtMaterno"]) && isset($_POST["txtEmail"]) && isset($_POST["txtNickname"]) && isset($_POST["txtPassword"]) )

	{
			$txtNombre  = validar_campos($_POST["txtNombre"]);
			$txtUsuario = validar_campos( $_POST["txtNickname"] );  //nickname
			$txtPaterno = validar_campos($_POST["txtPaterno"]);
			$txtMaterno = validar_campos($_POST["txtMaterno"]);
			$txtEmail = validar_campos($_POST["txtEmail"]);
			$txtPassword = validar_campos($_POST["txtPassword"] );

			$verif = "SELECT * FROM usuario WHERE email='$txtEmail'";
			$answ = $conn->query($verif);

			$row = $answ->fetch();
					if($txtEmail == $row['email']){
						echo "<script>
										alert('Este correo ya fue registrado');
										window.location='registro.php';
									</script>";
					}
				else{
					$ban = usuarioControlador::registrar($txtNombre,$txtPaterno,$txtMaterno,$txtEmail,$txtUsuario,$txtPassword) ;

					$query = "INSERT INTO principal(usuario_email) VALUES ('$txtEmail')";
					$resultado = $conn->query($query);

					if($ban)
					{

					 	//echo $usuario->getNickname();
						$usuario = new usuario();

						$usuario = usuarioControlador::get($txtUsuario,$txtPassword);
						$_SESSION["usuario"] = array(

							"nombre" =>  $usuario->getNickname(),
							"a_paterno" =>  $usuario->getNickname(),
							"a_materno" =>  $usuario->getNickname(),
							"email" =>  $usuario->getNickname(),
							"nickname" =>  $usuario->getNickname());

							header("location:../perfil/cerrarSesion.php");
						//return print(json_encode($resultado));
					}
				}
			}

//sultado = array("estado" => "false");
//return print(json_encode($resultado));
//echo "adasdas";
