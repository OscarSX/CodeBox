<?php
include "conexion.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = '';
}

$query = "DELETE FROM archivo WHERE carpeta_id_carpeta='$id'";
$resultado = $conn->query($query);

$query = "SELECT * FROM carpeta WHERE id_carpeta='$id'";
$res = $conn->query($query);
$row = $res->fetch();
$id_r = $row['principal_id_principal'];

$query = "DELETE FROM subcarpeta WHERE carpeta_id_carpeta='$id'";
$resultado2 = $conn->query($query);

$query = "DELETE FROM carpeta WHERE id_carpeta='$id'";
$resultado3 = $conn->query($query);

if($resultado && $resultado2 && $resultado3){
  header("Location: ../../repositorio/raiz.php?id=$id_r");
}
else{
  echo "ERROR: No se que pasó";
}
 ?>
