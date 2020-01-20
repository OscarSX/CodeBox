<?php
  include "conexion.php";

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }

  $nombre = $_POST['nombre_carpeta'];

  $query = "INSERT INTO subcarpeta(nombre, carpeta_id_carpeta) VALUES ('$nombre', '$id')";
  $resultado = $conn->query($query);

  if($resultado){
      header("Location: ../../repositorio/raiz/carpeta.php?id=$id");
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
