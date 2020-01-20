<?php
include "conexion.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = '';
}

$query = "SELECT * FROM archivo WHERE id_Archivo='$id'";
$res = $conn->query($query);
$row = $res->fetch();
$id_c = $row['subcarpeta_id_subcarpeta'];

$query = "DELETE FROM archivo WHERE id_Archivo='$id'";
$resultado = $conn->query($query);

if($resultado){
  header("Location: ../../../repositorio/raiz/carpeta/subcarpeta.php?id=$id_c");
}
else{
  echo "ERROR: No se que pasó";
}
 ?>
