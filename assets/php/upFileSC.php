<?php
  include "conexion.php";

  session_start();
  $emailUs = $_SESSION["usuario"]["email"];

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }

  $query = "SELECT carpeta_id_carpeta FROM subcarpeta WHERE id_subcarpeta=$id";
  $id_a = $conn->query($query);
  $row = $id_a->fetch();
  $id_c = $row['carpeta_id_carpeta'];

  $nombre = $_FILES['myfile']['name'];
  $descripcion = $_POST['comentario'];
  $tipo = $_FILES['myfile']['type'];
  $dato = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));

  $query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
  $res_idR = $conn->query($query);
  $row = $res_idR->fetch();
  $principal_id_principal = $row['id_principal'];

  $query = "INSERT INTO archivo(nombre, descripcion, tipo, dato, principal_id_principal, carpeta_id_carpeta, subcarpeta_id_subcarpeta) VALUES ('$nombre', '$descripcion', '$tipo', '$dato', '$principal_id_principal', '$id_c', '$id')";
  $resultado = $conn->query($query);

  if($resultado){
    header("Location: ../../repositorio/raiz/carpeta/subcarpeta.php?id=$id");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
