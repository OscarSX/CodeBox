<!DOCTYPE HTML>
<?php
session_start();
 ?>

<html>
	<head>
		<title>CodeBox | Documentos Compartidos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo">CodeBox</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../perfil/perfil.php">Perfil</a></li>
					<li><a href="../repositorio/raiz.php">Repositorio</a></li>
					<li><a href="raiz.php">Documentos Compartidos</a></li>
					<li><a href="../perfil/cerrarSesion.php">Cerrrar Sesion</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Documentos Compartidos</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<hr />

							<form action="../assets/php/crearCarpetaCompartida.php" method="post">
  							<input type="text" name="nombre_carpeta" placeholder="Nombre de la carpeta" required><br>
  							<input type="submit" name="crear" value="Crear carpeta compartida"><br>
							</form>
							<hr />

    					<ol>
								<?php
									include "../assets/php/conexion.php";

									$emailUs = $_SESSION["usuario"]["email"];

								  /*$query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
								  $res_idR = $conn->query($query);
								  $row = $res_idR->fetch();
								  $id = $row['id_principal'];*/
								  $query = "SELECT * FROM usuario AS us INNER JOIN carpeta_compartida_has_usuario AS ccu on us.email = ccu.usuario_email INNER JOIN carpeta_compartida AS cc on ccu.carpeta_compartida_id_carpeta = cc.id_carpeta
								  WHERE us.email='$emailUs' ORDER BY cc.nombre ASC";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
                      if($row['permiso'] == 1){
                        echo "<a href='raiz/carpeta.php?id=".$row['id_carpeta']."'>".$row['nombre']." </a>";
  											echo "Fecha: ".$row['fecha']."";
                       	echo "<p><a href='../assets/php/delCarpComp.php?id=".$row['id_carpeta']."'>Eliminar</a> </p>";
                      }
											else{
                        echo "<a href='raiz/carpeta.php?id=".$row['id_carpeta']."'>".$row['nombre']." </a>";
  											echo "<p>Fecha: ".$row['fecha']."</p>";
                      }
										}
									}
									else{
										echo "ERROR: No se que pasó";
									}
								?>

									<br>
									<br>


    					</ol>
						<hr />
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; CodeBox
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>
