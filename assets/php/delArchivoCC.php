<?php
include "conexion.php";
session_start();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = '';
}

$nombre_u = $_SESSION["usuario"]["nombre"];
$emailUs = $_SESSION["usuario"]["email"];

$query1 = "SELECT * FROM archivo_compartido WHERE id_Archivo=$id";
              $nombre = $conn->query($query1);
              $row = $nombre->fetch();
              $idc = $row['carpeta_compartida_id_carpeta'];
              $nombre_a = $row['nombre'];

$notificacion = "INSERT INTO Notificaciones(nombre_u, nota, nombre_ca, usuario_email) VALUES ('$nombre_u', 'Ha eliminado el archivo ', '$nombre_a', '$emailUs')";
$resul = $conn->query($notificacion);

$query = "DELETE FROM archivo_compartido WHERE id_Archivo='$id'";
$resultado = $conn->query($query);

if($resultado && $resul){
  header("Location: ../../compartida/raiz/carpeta.php?id=$idc");
}
else{
  echo "ERROR: No se que pasó";
}
 ?>
