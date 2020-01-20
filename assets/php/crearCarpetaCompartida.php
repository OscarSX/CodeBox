<?php
  include "conexion.php";
  session_start();

  $nombre = $_POST['nombre_carpeta'];
  $emailUs = $_SESSION["usuario"]["email"];
  $nombre_u = $_SESSION["usuario"]["nombre"];

  $notificacion = "INSERT INTO Notificaciones(nombre_u, nota, nombre_ca, usuario_email) VALUES ('$nombre_u', 'Ha creado la carpeta compartida ', '$nombre', '$emailUs')";
  $resul = $conn->query($notificacion);

  $query = "INSERT INTO carpeta_compartida(nombre) VALUES ('$nombre')";
  $resultado = $conn->query($query);
  //$last_id = $resultado->lastInsertId();
  //echo $last_id;
  if($resultado && $resul){
     $query = "SELECT * FROM carpeta_compartida WHERE nombre='$nombre'";
                  $res_idR = $conn->query($query);
                  $row = $res_idR->fetch();
                  $id = $row['id_carpeta'];
    //$_GET['idCC'] = $id;
    $query1 = "INSERT INTO carpeta_compartida_has_usuario(usuario_email, carpeta_compartida_id_carpeta, permiso) VALUES ('$emailUs', '$id', 1)";
    $resultado1 = $conn->query($query1);
    if ($resultado1) {
      header('Location: ../../compartida/raiz.php');
    }
    else{
      echo "ERROR: No se que pasó";
    }
  }
  else{
    echo "ERROR: No se que pasó";
  }
?>
