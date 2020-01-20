<?php
  include "conexion.php";
  session_start();

  $nombre = $_POST['nombre_carpeta'];
  $emailUs = $_SESSION["usuario"]["email"];

  $query = "SELECT * FROM principal WHERE usuario_email='$emailUs'";
  $res_idR = $conn->query($query);
  $row = $res_idR->fetch();
  $id = $row['id_principal'];


  $query = "INSERT INTO carpeta(nombre, principal_id_principal) VALUES ('$nombre', '$id')";
  $resultado = $conn->query($query);

  if($resultado){
      header('Location: ../../repositorio/raiz.php');
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
