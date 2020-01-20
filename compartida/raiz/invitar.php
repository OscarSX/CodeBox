<?php
  include "../../assets/php/conexion.php";

  session_start();
  $emailUs = $_SESSION["usuario"]["email"];
  $carpeta = $_SESSION["carpeta_id"];
  if(isset($_GET['id_email'])) {
    $id = $_GET['id_email'];
  } else {
    $id = '';
  }

  $query = "INSERT INTO carpeta_compartida_has_usuario(carpeta_compartida_id_carpeta, usuario_email,permiso) VALUES ('$carpeta', '$id',0)";
  $resultado = $conn->query($query);

  if($resultado){
    header("Location: carpeta.php?id=$carpeta");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
