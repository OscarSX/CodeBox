<!DOCTYPE HTML>

<html>
	<head>
		<title>CodeBox | Invitar Amigos</title>
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
				<h1>Invitar Amigos</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<hr />
						<?php
							session_start();
	  						$emailUs = $_SESSION["usuario"]["email"];
	                  		include "../../assets/php/conexion.php";
                			$sql= "SELECT * FROM usuario";
			                $stmt = $conn->prepare($sql);
			                try{
			                   $stmt->execute();
			                }
			                catch (PDOException $e) {
			                    print "¡Error!: " . $e->getMessage() . "<br/>";
			                    die();
			                }
			                $total= $stmt->rowCount();
			                echo "<form action='invAmigos.php' method='post'>";
			                while ($row = $stmt->fetchObject()) {
			                    //if ($row->estatus == 1) {
			                        echo "<br><br><br>
			                        <center>
			                                <label>
			                                    <input type='checkbox' value='$row->email' name='chk[]'>
			                                    {$row->nickname}
			                                </label>
			                        </center>";
			                        //echo "<p>{$row->contenido}</p>";
			                        //echo '<img src="../img/'.$row->imagen.'">';
			                    //}
			                }
			                echo "<br><div class='col-sm-offset-5 col-sm-7'>
			                <input type='submit' class='btn btn-primary btn-lg' value='Enviar' name='Enviar'>
			                </form>
			                </div>";
    					?>
    					<hr />
						<br>
						<br>
    					</ol>
						<!--<hr />-->
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
