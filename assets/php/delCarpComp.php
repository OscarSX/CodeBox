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

$query = "SELECT * FROM carpeta_compartida WHERE id_carpeta=$id";
$res = $conn->query($query);
$row = $res->fetch();
$nombre_c = $row['nombre'];

$notificacion = "INSERT INTO Notificaciones(nombre_u, nota, nombre_ca, usuario_email) VALUES ('$nombre_u', 'Ha eliminado la carpeta ', '$nombre_c', '$emailUs')";
$resul = $conn->query($notificacion);

$query = "DELETE FROM archivo_compartido WHERE carpeta_compartida_id_carpeta='$id'";
$resultado = $conn->query($query);

$query = "DELETE FROM carpeta_compartida_has_usuario WHERE carpeta_compartida_id_carpeta='$id'";
$resultado2 = $conn->query($query);


$query = "DELETE FROM carpeta_compartida WHERE id_carpeta='$id'";
$resultado3 = $conn->query($query);

if($resultado && $resultado2 && $resultado3 && $resul){
  header("Location: ../../compartida/raiz.php");
}
else{
  echo "ERROR: No se que pasó";
}
 ?>
