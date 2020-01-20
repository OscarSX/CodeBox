<!DOCTYPE HTML>

<html>
	<head>
		<title>CodeBox | Carpeta Compartida</title>
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
					<li><a href="../raiz.php">Documentos Compartidos</a></li>
					<li><a href="../../perfil/cerrarSesion.php">Cerrrar Sesion</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<?php
				session_start();
              include "../../assets/php/conexion.php";

              if(isset($_GET['id'])) {
                $id = $_GET['id'];
              } else {
              	if (isset($_GET['idc'])) {
              		$id = $_GET['idc'];
              	}
                else{
                	if (isset( $_SESSION["carpeta_id"])) {
	              		$id =  $_SESSION["carpeta_id"];
	              	}
	                else
	                	$id = '';
                }
              }
              $query = "SELECT nombre FROM carpeta_compartida WHERE id_carpeta=$id";
              $nombre = $conn->query($query);
              $row = $nombre->fetch();
              $nc = $row['nombre'];
              $_SESSION["carpeta_id"] = $id;
              echo "<h1>$nc</h1>";
              ?>
				<!--<h1>Documentos Compartidos</h1>-->
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<hr />
						<?php
$email_alt=$_SESSION["usuario"]["email"];
						$permiso = "SELECT * FROM carpeta_compartida_has_usuario WHERE carpeta_compartida_id_carpeta=$id HAVING usuario_email='$email_alt'";
						$resul_per = $conn->query($permiso);
						$row_per = $resul_per->fetch();
						$perm = $row_per['permiso'];

	  						$emailUs = $_SESSION["usuario"]["email"];
	                  		include "../../assets/php/conexion.php";
                			$query = "SELECT * FROM usuario where email != '$emailUs' ORDER BY nickname asc";
							$resultado = $conn->query($query);

							if($resultado && $perm==1){
								echo "<p>Para compartir, solo debe seleccionar el usuario al que desea compartir la carpeta</p>";
								while($row = $resultado->fetch()){
									echo "<li><a href='invitar.php?id_email=".$row['email']."' target='_blank'>".$row['nickname']."</a> </li>";
								}
							}
    					?>
    					<hr />
    					<?php
							//session_start();

							if(isset($_GET['id'])) {
				                $id = $_GET['id'];
				              } else {
				               if (isset($_GET['idc'])) {
				              		$id = $_GET['idc'];
				              	}
				                else
				                	$id = '';
				              }
	  						$emailUs = $_SESSION["usuario"]["email"];
	                  		include "../../assets/php/conexion.php";
                			$query = "SELECT * FROM usuario as us inner join carpeta_compartida_has_usuario as ccu on
                			ccu.usuario_email = us.email inner join carpeta_compartida as cc on cc.id_carpeta = ccu.carpeta_compartida_id_carpeta where
                			cc.id_carpeta = $id and us.nickname != '$emailUs' ORDER BY nickname asc";
							$resultado = $conn->query($query);
							echo "<p>Usuarios a quien se les ha compartido</p>";
							if($resultado){
								while($row = $resultado->fetch()){
									if($row['permiso'] == 1){
										echo $row['nickname']. " (Administrador) <br>";
									}
									else{
										echo $row['nickname']."<br>";
									}
								}
							}
							else{
								echo "ERROR: No se que pasó";
							}
    					?>
    					<hr />
    					<br>
            <?php
            include "../../assets/php/conexion.php";

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = '';
            }

						$email_alt=$_SESSION["usuario"]["email"];
												$permiso = "SELECT * FROM carpeta_compartida_has_usuario WHERE carpeta_compartida_id_carpeta=$id HAVING usuario_email='$email_alt'";
												$resul_per = $conn->query($permiso);
												$row_per = $resul_per->fetch();
												$perm = $row_per['permiso'];

						if($perm == 1){
							echo "<form action='../../assets/php/upFileCC.php?id=$id' method='post' enctype='multipart/form-data'>
	              <input type='file' name='myfile' required> </br></br>
	              <textarea name='comentario' placeholder='Inserta alguna explicacion del archivo (opcional)'></textarea> </br>
	              <input type='submit' name='enviar' value='Subir Archivo'></br>
	            </form>";
						}


            ?>


							<hr />
									<br>
									<br>

								<?php
				                  	include "../../assets/php/conexion.php";

				                  	if(isset($_GET['id'])) {
				                  	  	$id = $_GET['id'];
				                  	} else {
										                   	 	if (isset($_GET['idc'])) {
						              		$id = $_GET['idc'];
						              	}
						                else{
						                	if (isset( $_SESSION["carpeta_id"])) {
							              		$id =  $_SESSION["carpeta_id"];
							              	}
							                else
							                	$id = '';
							            }
				                 	}
									$email_alt=$_SESSION["usuario"]["email"];

									$permiso = "SELECT * FROM carpeta_compartida_has_usuario WHERE carpeta_compartida_id_carpeta=$id HAVING usuario_email='$email_alt'";
									$resul_per = $conn->query($permiso);
									$row_per = $resul_per->fetch();
									$perm = $row_per['permiso'];

									$query = "SELECT * FROM archivo_compartido WHERE carpeta_compartida_id_carpeta=$id ORDER BY fecha asc";
									$resultado = $conn->query($query);

									if($resultado){
										while($row = $resultado->fetch()){
											if($perm == 1){
												echo "<li><a href='view.php?id=".$row['id_Archivo']."'>".$row['nombre']."</a> </li>";
												echo "Fecha: ".$row['fecha']." <br/> Descripcion: ".$row['descripcion']."";
												echo "<p><a href='../../assets/php/delArchivoCC.php?id=".$row['id_Archivo']."'>Eliminar</a> </p>";
											}
											else{
												echo "<li><a href='view.php?id=".$row['id_Archivo']."'>".$row['nombre']."</a> </li>";
												echo "Fecha: ".$row['fecha']." <br/> Descripcion: ".$row['descripcion']."";
											}
										}
									}
									else{
										echo "ERROR: No se que pasó";
									}
    							?>
    					</ol>
							<br><br><br>
						<hr />
						<h4 align='center'>Comentarios</h4>
						<?php
            include "../../assets/php/conexion.php";

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = '';
            }

							echo "<form action='../../assets/php/insertComentario.php?id=$id' method='post' enctype='multipart/form-data'>
	              <input type='file' name='myfilec' required> </br></br>
	              <textarea name='mensaje' placeholder='Inserta tu comentario' required></textarea> </br>
	              <input type='submit' name='enviar2' value='Comentar'></br>
	            </form>";
            ?>

						<br><br>

						<?php
												include "../../assets/php/conexion.php";

												if(isset($_GET['id'])) {
														$id = $_GET['id'];
												} else {
																			if (isset($_GET['idc'])) {
													$id = $_GET['idc'];
												}
												else{
													if (isset( $_SESSION["carpeta_id"])) {
														$id =  $_SESSION["carpeta_id"];
													}
													else
														$id = '';
											}
											}

							$query = "SELECT * FROM comentario WHERE carpeta_compartida_id_carpeta=$id ORDER BY fecha desc";
							$resultado = $conn->query($query);

							if($resultado){
								while($row = $resultado->fetch()){
										echo "<li><a href='view.php?id=".$row['id_Comentario']."'>".$row['nombre']."</a> </li>";
										echo " ".$row['nombre_u']." ".$row['a_paterno_u']." ".$row['a_materno_u']." <br>Comentario: ".$row['mensaje']." <br> Fecha: ".$row['fecha']."";
										echo "<br> <br>";
								}
							}
							else{
								echo "ERROR: No se que pasó";
							}
							?>
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
