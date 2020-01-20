<?php
  include "conexion.php";

  session_start();
  $emailUs = $_SESSION["usuario"]["email"];
  $nombre_u = $_SESSION["usuario"]["nombre"];
  $ap_paterno = $_SESSION["usuario"]["a_paterno"];
  $ap_materno = $_SESSION["usuario"]["a_materno"];


  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }

  $nombre = $_FILES['myfilec']['name'];
  $descripcion = $_POST['mensaje'];
  $tipo = $_FILES['myfilec']['type'];
  $dato = addslashes(file_get_contents($_FILES['myfilec']['tmp_name']));

  $query = "INSERT INTO comentario(nombre, mensaje, tipo, dato, carpeta_compartida_id_carpeta, nombre_u,	a_paterno_u,	a_materno_u) VALUES ('$nombre', '$descripcion', '$tipo', '$dato', '$id', '$nombre_u', '$ap_paterno', '$ap_materno')";
  $resultado = $conn->query($query);

  if($resultado){
    $obtNombreCarp = "SELECT * FROM carpeta_compartida WHERE id_carpeta=$id";
    $resul_nc = $conn->query($obtNombreCarp);
    $row_nc = $resul_nc->fetch();

    $nombre_c = $row_nc['nombre'];

    $notificacion = "INSERT INTO Notificaciones(nombre_u, nota, nombre_ca, usuario_email) VALUES ('$nombre_u', 'Ha realizado un comentario en la carpeta ', '$nombre_c', '$emailUs')";
    $resul = $conn->query($notificacion);

    header("Location: ../../compartida/raiz/carpeta.php?id=$id");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
