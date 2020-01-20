<?php
include "conexion.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = '';
}

$query = "DELETE FROM archivo WHERE subcarpeta_id_subcarpeta='$id'";
$resultado = $conn->query($query);

$query = "SELECT * FROM subcarpeta WHERE id_subcarpeta='$id'";
$res = $conn->query($query);
$row = $res->fetch();
$id_c = $row['carpeta_id_carpeta'];

$query = "DELETE FROM subcarpeta WHERE id_subcarpeta='$id'";
$resultado2 = $conn->query($query);

if($resultado && $resultado2){
  header("Location: ../../repositorio/raiz/carpeta.php?id=$id_c");
}
else{
  echo "ERROR: No se que pasó";
}
 ?>
