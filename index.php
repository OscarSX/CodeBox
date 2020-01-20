<?php
session_start();
if(!isset($_SESSION["usuario"]))
  {

  }
  else
  {

  }

 ?>


<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>CodeBox | Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
					<li><a href="index.php">Home</a></li>
					<!--<li><a href="repositorio/raiz.php">Repositorio</a></li>-->

						<?php  if( !isset($_SESSION["usuario"]) )
  						{ ?>
							<li><a href="login/login.html" >Login</a></li>
					        <li><a href="registro/registro.php" >Registro</a></li>
			        	<?php } else  { ?>
			        		<li><a href="perfil/perfil.php">Perfil</a></li>
					        <li><a href="repositorio/raiz.php">Repositorio</a></li>
                  <li><a href="compartida/raiz.php">Documentos Compartidos</a></li>
					        <li><a href="login/cerrarSesion.php">Cerrar Sesion</a></li>
					     <?php } ?>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>CodeBox</h1>
					<p>Gestor de archivos<br />
					<?php  if( isset($_SESSION["usuario"]) )
  						{
              echo "<h2> Bienvenido </h2>";
							echo $_SESSION["usuario"]["nombre"] ;

						} ?>
						</p>
				</div>
				<video autoplay loop muted playsinline src="images/banner.mp4"></video>
			</section>


      <hr />

      <?php
      include "assets/php/conexion.php";

      if(!isset($_SESSION["usuario"]))
      {

      }
      else
      {
        $emailUs = $_SESSION["usuario"]["email"];

        $query = "SELECT * FROM notificaciones ORDER BY fecha desc";
        $resultado = $conn->query($query);
        $row = $resultado->fetch();

        echo "<h3 align='center'>Notificaciones</h3>";

        if($resultado){
          while($row = $resultado->fetch()){
            echo "<p align='center'>".$row['nombre_u']." ".$row['nota']." ".$row['nombre_ca']." <br>".$row['fecha']."</p>";
            }
          echo "<hr />";
        }
        else{
          echo "ERROR: No se que pasó";
        }
      }
       ?>



		<!-- Highlights -->
    <section class="wrapper">
      <div class="inner">
        <header class="special">
          <h2>Herramientas de control</h2>
          <p>Nosotros te ofrecermos herramientas para aumentar tu productividad</p>
        </header>
        <div class="highlights">
          <section>
            <div class="content">
              <header>
                <a href="#" class="icon fa-vcard-o"><span class="label">Icon</span></a>
                <h3>Cuenta de usuario</h3>
              </header>
              <p>Registra tus datos para tener una cuenta personal.</p>
            </div>
          </section>
          <section>
            <div class="content">
              <header>
                <a href="#" class="icon fa-files-o"><span class="label">Icon</span></a>
                <h3>Control de archivos</h3>
              </header>
              <p>Administra tus archivos personales.</p>
            </div>
          </section>
          <section>
            <div class="content">
              <header>
                <a href="#" class="icon fa-qrcode"><span class="label">Icon</span></a>
                <h3>Integridad y colaboración</h3>
              </header>
              <p>Solo tú gestionas tu respositorio y decides con que usuarios deseas compartir tus archivos.</p>
            </div>
          </section>
        </div>
      </div>
    </section>

		<!-- CTA -->
    <section id="cta" class="wrapper">
      <div class="inner">
        <h2>CODEBOX</h2>
        <p>Un servicio de alojamiento de archivos, servicio de almacenamiento de archivos online, o centro de medios online es un servicio de alojamiento de Internet diseñado específicamente para alojar contenido estático, mayormente archivos que no son páginas web.</p>
        <p>CodeBox esta optimizado para servir a muchos usuarios y tambien para ser utilizado como el almacenamiento de un único usuario.</p>
      </div>
    </section>


		<!-- Footer -->
    <footer id="footer">
      <div class="inner">
        <div class="content">
          <section>
            <h3>NOTA DEL EQUIPO DE DESARROLLADORES</h3>
            <p></p>
            <p><i>"Este sitio web esta sujeto a cambios debido a que aun no es una version final. Seguimos trabajando para darle una mejor experiencia a nuestros usuarios."</i></p>
          </section>
          <section>
            <h4>Equipo de trabajo</h4>
            <ul class="alt">
              <li><a href="#">Jose A. Ayala Aldana</a></li>
              <li><a href="#">Mireya Luna Jimenez</a></li>
              <li><a href="#">Oscar Sanchez Xochitemo</a></li>
              <li><a href="#">Miguel A. Sayago Arcos</a></li>
            </ul>
          </section>
          <section>
            <h4>Siguenos en:</h4>
            <ul class="plain">
              <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
              <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
              <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
              <li><a href="https://github.com/OscarSX/CodeBox" target="_blank"><i class="icon fa-github">&nbsp;</i>Github</a></li>
            </ul>
          </section>
        </div>
        <div class="copyright">
          &copy; CodeBox
        </div>
      </div>
    </footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
