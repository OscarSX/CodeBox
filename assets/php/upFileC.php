<?php
  include "conexion.php";

  session_start();
  $emailUs = $_SESSION["usuario"]["email"];

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }

  $nombre = $_FILES['myfile']['name'];
  $descripcion = $_POST['comentario'];
  $tipo = $_FILES['myfile']['type'];
  $dato = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));

  $query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
  $res_idR = $conn->query($query);
  $row = $res_idR->fetch();
  $principal_id_principal = $row['id_principal'];

  $query = "INSERT INTO archivo(nombre, descripcion, tipo, dato, principal_id_principal, carpeta_id_carpeta) VALUES ('$nombre', '$descripcion', '$tipo', '$dato', '$principal_id_principal', '$id')";
  $resultado = $conn->query($query);

  if($resultado){
    header("Location: ../../repositorio/raiz/carpeta.php?id=$id");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
