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
		<title>CodeBox | Perfil</title>
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
				<a class="logo">CodeBox</a>
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
        <div class="content">
                <header>
                  <p align="right"><a href="#" class="icon fa-vcard-o" ><span class="label">Icon</span></a></p>
                  <h3>Información</h3>
                </header>
                  <p>Nombre: <?php  echo $_SESSION["usuario"]["nombre"] ?></p>
                   <p>Apellidos: <?php  echo $_SESSION["usuario"]["a_paterno"]?>

                  <?php   echo $_SESSION["usuario"]["a_materno"] ?>  </p>
                  <p>Email: <?php  echo $_SESSION["usuario"]["email"] ?></p>
                  <p>Nickname: <?php  echo $_SESSION["usuario"]["nickname"] ?></p>
                  <p align="right"> <a href="modificar.php" >Editar información</a></p>
              </div>
            <div class="content" style="text-align: center;">    
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
