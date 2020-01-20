<?php
  session_start();
   if(!isset($_SESSION["usuario"]))
  {
  	//if($_SESSION["usuario"]["nombre"]  == "dan")
    //header("location:login/login.html");-->

    header("location:../login/login.html");
   }
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Perfil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 		<script  type = " text/javascript "  src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js " > </script>
  		<script  type = "text/javascript"  src = " https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" > </script>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html">CodeBox</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
          <li><a href="../index.php">Home</a></li>
					<li><a href="perfil.php">Perfil</a></li>
					<li><a href="../repositorio/raiz.php">Repositorio</a></li>
					<li><a href="../compartida/raiz.php">Documentos Compartidos</a></li>
					<li><a href="cerrarSesion.php">Cerrrar Sesion</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Hola <?php  echo $_SESSION["usuario"]["nombre"] ?></h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">

					<div class="content" style="text-align: center;">


						<form id="" action="actualizarCode.php" method="post">
						<table>
						<tr>
							<td>Nombre:</td>
							<td><input type="text" name="txtNombre" class="textbox" required value="<?php  echo $_SESSION["usuario"]["nombre"] ?>"></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>
							<td><input type="text" name="txtPaterno" class="textbox" required value="<?php  echo $_SESSION["usuario"]["a_paterno"] ?>"></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>
							<td><input type="text" name="txtMaterno" class="textbox" required value="<?php  echo $_SESSION["usuario"]["a_materno"] ?>"></td>
						</tr>

						<tr>
							<td>Nickname</td>
							<td><input type="text" name="txtNickname" class="textbox" required value="<?php  echo $_SESSION["usuario"]["nickname"] ?>"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="Password" name="txtPassword" class="textbox" required></td>
						</tr>

						<tr style="visibility: hidden;">
							<td><input type="text" name="txtEmail" class="textbox" value="<?php  echo $_SESSION["usuario"]["email"] ?>" ></td>
						</tr

						<tr>
							<td>&nbsp</td>
							<td><input type="submit" value="Actualizar" class="boton" required></td>
						</tr>
				</table>
		        </div>
		        </div>
			</section>

		<!-- Footer
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; CodeBox
					</div>
				</div>
			</footer>
-->
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

						<script  src="app.js"></script>

			<script  src="overhang.min.js"></script>


	</body>
</html>
