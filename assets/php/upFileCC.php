<?php
  include "conexion.php";

  session_start();
  $emailUs = $_SESSION["usuario"]["email"];
  $nombre_u = $_SESSION["usuario"]["nombre"];


  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }

  $nombre = $_FILES['myfile']['name'];
  $descripcion = $_POST['comentario'];
  $tipo = $_FILES['myfile']['type'];
  $dato = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));

  $query = "INSERT INTO archivo_compartido(nombre, descripcion, tipo, dato, carpeta_compartida_id_carpeta) VALUES ('$nombre', '$descripcion', '$tipo', '$dato', '$id')";
  $resultado = $conn->query($query);

  if($resultado){
    $obtNombreCarp = "SELECT * FROM carpeta_compartida WHERE id_carpeta=$id";
    $resul_nc = $conn->query($obtNombreCarp);
    $row_nc = $resul_nc->fetch();

    $nombre_c = $row_nc['nombre'];

    $notificacion = "INSERT INTO Notificaciones(nombre_u, nota, nombre_ca, usuario_email) VALUES ('$nombre_u', 'Ha subido el archivo ".$nombre." en la carpeta ', '$nombre_c', '$emailUs')";
    $resul = $conn->query($notificacion);

    header("Location: ../../compartida/raiz/carpeta.php?id=$id");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
