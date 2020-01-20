<!DOCTYPE HTML>

<html>
	<head>
		<title>CodeBox | Repositorio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
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
					<li><a href="../../index.php">Home</a></li>
					<li><a href="../../perfil/perfil.php">Perfil</a></li>
					<li><a href="../raiz.php">Repositorio</a></li>
					<li><a href="../../compartida/raiz.php">Documentos Compartidos</a></li>
					<li><a href="../../perfil/cerrarSesion.php">Cerrrar Sesion</a></li>
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
            <?php
            include "../../assets/php/conexion.php";

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = '';
            }

            echo "<form action='../../assets/php/upFileC.php?id=$id' method='post' enctype='multipart/form-data'>
              <input type='file' name='myfile' required> </br></br>
              <textarea name='comentario' placeholder='Inserta alguna explicacion del archivo (opcional)'></textarea> </br>
              <input type='submit' name='enviar' value='Subir Archivo'></br>
            </form>";
            ?>


							<hr />
              <?php
              include "../../assets/php/conexion.php";

              if(isset($_GET['id'])) {
                $id = $_GET['id'];
              } else {
                $id = '';
              }

              $query = "SELECT nombre FROM carpeta WHERE id_carpeta=$id";
              $nombre = $conn->query($query);
              $row = $nombre->fetch();
              $nc = $row['nombre'];
              echo "<a href='../raiz.php'>Raiz</a> / <a href='carpeta.php?id=$id'> $nc </a>";
              ?>
							<hr />

              <?php
              echo "<form action='../../assets/php/crearCarpetaC.php?id=$id' method='post'>
  							<input type='text' name='nombre_carpeta' placeholder='Nombre de la carpeta' required><br>
  							<input type='submit' name='crear' value='Crear carpeta'><br>
							</form>";
              ?>

							<hr />

    					<ol>
								<?php
									include "../../assets/php/conexion.php";

                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                  } else {
                    $id = '';
                  }

									$query = "SELECT * FROM subcarpeta WHERE carpeta_id_carpeta=$id ORDER BY nombre asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											echo "<a href='carpeta/subcarpeta.php?id=".$row['id_subcarpeta']."'>".$row['nombre']." </a>";
											echo "Fecha: ".$row['fecha']."";
											echo "<p><a href='../../assets/php/delSubCarp.php?id=".$row['id_subcarpeta']."'>Eliminar</a> </p>";
											}
									}
									else{
										echo "ERROR: No se que pasó";
									}
								?>

									<br>
									<br>

								<?php
                  include "../../assets/php/conexion.php";

                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                  } else {
                    $id = '';
                  }

									$query = "SELECT * FROM archivo WHERE carpeta_id_carpeta=$id AND subcarpeta_id_subcarpeta IS NULL ORDER BY fecha asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											echo "<li><a href='view.php?id=".$row['id_Archivo']."' target='_blank'>".$row['nombre']."</a> </li>";
											echo "Fecha: ".$row['fecha']." <br/> Descripcion: ".$row['descripcion']."";
											echo "<p><a href='../../assets/php/delArchivoC.php?id=".$row['id_Archivo']."'>Eliminar</a> </p>";
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
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/browser.min.js"></script>
			<script src="../../assets/js/breakpoints.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>

	</body>
</html>
