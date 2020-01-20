<?php
include 'conexion.php';
include 'clases/usuario.php';
class usuarioDao extends conexion
{
	protected static $con ;

	public static function getConexion()
	{
		self::$con = conexion::conectar();
	}

	private static function desconectar()
	{
		self::$con = null;
	}


	public static function get($usuario)
		{
			$query ="select * from usuario where email = :email and password = :password";
			self::getConexion();

			$resultado = self::$con->prepare($query);

			$email = $usuario->getEmail();
			$pass = $usuario->getPassword();



			$resultado -> bindParam(":email",$email);
			$resultado -> bindParam(":password",$pass);

			$resultado -> execute();

			$filas = $resultado->fetch();

			$usuario = new usuario();
			$usuario ->setNombre($filas["nombre"]);
			$usuario ->setA_paterno($filas["a_paterno"]);
			$usuario ->setA_materno($filas["a_materno"]);
			$usuario ->setEmail($filas["email"]);
			$usuario ->setPassword($filas["password"]);
			$usuario ->setNickname($filas["nickname"]);


			return $usuario;


		}


		public static function registrar($usuario)
		{
			$query ="insert into usuario(nombre,a_paterno,a_materno,email,password,nickname)
			values(:nombre,:a_paterno,:a_materno,:email,:password,:nickname)";



			self::getConexion();

			$resultado = self::$con->prepare($query);



			$nom = $usuario->getNombre();
			$a_p = $usuario->getA_paterno();
			$a_m = $usuario->getA_materno();
			$email = $usuario->getEmail();
			$nick = $usuario->getNickName();
			$pass = $usuario->getPassword();


			$resultado -> bindParam(":nombre",$nom);   //nombre
			$resultado -> bindParam(":a_paterno",$a_p); //a patern
			$resultado -> bindParam(":a_materno",$a_m); // a mater
			$resultado -> bindParam(":email",$email); //email
			$resultado -> bindParam(":nickname",$nick); //nick
			$resultado -> bindParam(":password",$pass); //pass




			$resultado -> execute();


			if($resultado->rowCount() > 0)
			{
				//return true;
				/*$filas = $resultado->fetch();
				if($filas["nickname"] == $nick
					&& $filas["password"] == $pass)
				{*/
					return true;
					//echo "no";
				//}
			}

			return false;

		}




		public static function login ($usuario)
		{
		$query ="select * from usuario where email = :email and password = :password";
		self::getConexion();

		$resultado = self::$con->prepare($query);

		$nick = $usuario->getEmail();
		$pass = $usuario->getPassword();



		$resultado -> bindParam(":email",$nick);
		$resultado -> bindParam(":password",$pass);

		$resultado -> execute();

		if($resultado->rowCount() > 0)
		{
			//return true;
			$filas = $resultado->fetch();
			if($filas["email"] == $nick
				&& $filas["password"] == $pass)
			{
				return true;
			}
		}

		return false;

		}


		public static function actualizar($usuario)
		{
			$query ="update usuario set nombre = :nombre,a_paterno = :a_paterno,a_materno = :a_materno,password =:password, nickname = :nickname
			where  email = :email";



			self::getConexion();

			$resultado = self::$con->prepare($query);



			$nom = $usuario->getNombre();
			$a_p = $usuario->getA_paterno();
			$a_m = $usuario->getA_materno();
			$nick = $usuario->getNickName();
			$pass = $usuario->getPassword();
			$email = $usuario->getEmail();



			$resultado -> bindParam(":nombre",$nom);   //nombre
			$resultado -> bindParam(":a_paterno",$a_p); //a patern
			$resultado -> bindParam(":a_materno",$a_m); // a mater
			$resultado -> bindParam(":email",$email); //email
			$resultado -> bindParam(":nickname",$nick); //nick
			$resultado -> bindParam(":password",$pass); //pass
			//$resultado -> bindParam(":privilegio",$pri); //pri

			$resultado -> execute();


			if($resultado->rowCount() > 0)
			{
				//return true;
				/*$filas = $resultado->fetch();
				if($filas["nickname"] == $nick
					&& $filas["password"] == $pass)
				{*/
					return true;
					//echo "no";
				//}
			}

			return false;

		}
}
