<!DOCTYPE HTML>
<?php
session_start();
 ?>

<html>
	<head>
		<title>CodeBox | Repositorio</title>
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
					<li><a href="raiz.php">Repositorio</a></li>
					<li><a href="../compartida/raiz.php">Documentos Compartidos</a></li>
					<li><a href="../perfil/cerrarSesion.php">Cerrrar Sesion</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Repositorio</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<hr />
							<form action="../assets/php/upFile.php" method="post" enctype="multipart/form-data">
                <input type="file" name="myfile" required> </br></br>
								<textarea name="comentario" placeholder="Inserta alguna explicacion del archivo (opcional)"></textarea> </br>
								<input type="submit" name="enviar" value="Subir Archivo"></br>
            	</form>

							<hr />
							<a href='raiz.php'>Raiz</a> /
							<hr />

							<form action="../assets/php/crearCarpeta.php" method="post">
  							<input type="text" name="nombre_carpeta" placeholder="Nombre de la carpeta" required><br>
  							<input type="submit" name="crear" value="Crear carpeta"><br>
							</form>
							<hr />

    					<ol>
								<?php
									include "../assets/php/conexion.php";

									$emailUs = $_SESSION["usuario"]["email"];

								  $query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
								  $res_idR = $conn->query($query);
								  $row = $res_idR->fetch();
								  $id = $row['id_principal'];

									$query = "SELECT * FROM carpeta WHERE principal_id_principal='$id' ORDER BY nombre asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											echo "<a href='raiz/carpeta.php?id=".$row['id_carpeta']."'>".$row['nombre']." </a>";
											echo "Fecha: ".$row['fecha']."";
                      echo "<p><a href='../assets/php/delCarp.php?id=".$row['id_carpeta']."'>Eliminar</a> </p>";
										}
									}
									else{
										echo "ERROR: No se que pasó";
									}
								?>

									<br>
									<br>

								<?php
									include "../assets/php/conexion.php";

									$emailUs = $_SESSION["usuario"]["email"];

								  	$query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
								  	$res_idR = $conn->query($query);
								  	$row = $res_idR->fetch();
									$id = $row['id_principal'];

									$query = "SELECT * FROM archivo WHERE carpeta_id_carpeta IS NULL and principal_id_principal=$id ORDER BY fecha asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											echo "<li><a href='view.php?id=".$row['id_Archivo']."' target='_blank'>".$row['nombre']."</a> </li>";
											echo "Fecha: ".$row['fecha']." <br/> Descripcion: ".$row['descripcion']."";
                      echo "<p><a href='../assets/php/delArchivo.php?id=".$row['id_Archivo']."'>Eliminar</a> </p>";
										}
									}
									else{
										echo "ERROR: No se que pasó";
									}
    						?>
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
