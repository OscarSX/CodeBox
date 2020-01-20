<!DOCTYPE HTML>

<html>
	<head>
		<title>CodeBox | Registro</title>
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
					<li><a href="../login/login.html">Login</a></li>
					<li><a href="registro.php">Registro</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Registro</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<form action="registroCode.php" method="post">
					<table>
						<tr>
							<td>Nombre:</td>
							<td><input type="text" name="txtNombre" class="textbox" required></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>
							<td><input type="text" name="txtPaterno" class="textbox" required></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>
							<td><input type="text" name="txtMaterno" class="textbox" required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="txtEmail" class="textbox" required></td>
						</tr>

						<tr>
							<td>Nickname</td>
							<td><input type="text" name="txtNickname" class="textbox" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="Password" name="txtPassword" class="textbox" minlength="8" required></td>
						</tr>

						<tr>
							<td>&nbsp</td>
							<td><input type="submit" value="Registrar" class="boton" required></td>
						</tr>
				</table>
				</form>
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

			<script  src="app.js"></script>
			<script  src="overhang.min.js"></script>

	</body>
</html>
