<!DOCTYPE HTML>

<html>
	<head>
		<title>CodeBox | Repositorio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../../../assets/css/main.css" />
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
					<li><a href="../../../index.php">Home</a></li>
					<li><a href="../../../perfil/perfil.php">Perfil</a></li>
					<li><a href="../../raiz.php">Repositorio</a></li>
					<li><a href="../../../compartida/raiz.php">Documentos Compartidos</a></li>
					<li><a href="../../../perfil/cerrarSesion.php">Cerrrar Sesion</a></li>
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
            include "../../../assets/php/conexion.php";

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = '';
            }

            $query = "SELECT nombre FROM subcarpeta WHERE id_subcarpeta=$id";
            $nombre = $conn->query($query);
            $row = $nombre->fetch();
            $sc = $row['nombre'];

            $query = "SELECT carpeta_id_carpeta FROM subcarpeta WHERE id_subcarpeta=$id";
            $id_a = $conn->query($query);
            $row = $id_a->fetch();
            $id_c = $row['carpeta_id_carpeta'];

            $query = "SELECT nombre FROM carpeta WHERE id_carpeta=$id_c";
            $nombre = $conn->query($query);
            $row = $nombre->fetch();
            $c = $row['nombre'];

            echo "<a href='../../raiz.php'>Raiz</a> / <a href='../carpeta.php?id=$id_c'> $c </a> / <a href='subcarpeta.php?id=$id'> $sc </a>";
            ?>
            <hr />

            <?php
            include "../../../assets/php/conexion.php";

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = '';
            }

            echo "<form action='../../../assets/php/upFileSC.php?id=$id' method='post' enctype='multipart/form-data'>
              <input type='file' name='myfile' required> </br></br>
              <textarea name='comentario' placeholder='Inserta alguna explicacion del archivo (opcional)'></textarea> </br>
              <input type='submit' name='enviar' value='Subir Archivo'></br>
            </form>";
            ?>

							<hr />

    					<ol>

								<?php
                  include "../../../assets/php/conexion.php";

                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                  } else {
                    $id = '';
                  }

									$query = "SELECT * FROM archivo WHERE subcarpeta_id_subcarpeta=$id ORDER BY fecha asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											echo "<li><a href='view.php?id=".$row['id_Archivo']."' target='_blank'>".$row['nombre']."</a> </li>";
											echo "Fecha: ".$row['fecha']." <br/> Descripcion: ".$row['descripcion']."";
											echo "<p><a href='../../../assets/php/delArchivoSC.php?id=".$row['id_Archivo']."'>Eliminar</a> </p>";
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
			<script src="../../../assets/js/jquery.min.js"></script>
			<script src="../../../assets/js/browser.min.js"></script>
			<script src="../../../assets/js/breakpoints.min.js"></script>
			<script src="../../../assets/js/util.js"></script>
			<script src="../../../assets/js/main.js"></script>

	</body>
</html>
