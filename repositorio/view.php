<?php

  include "../assets/php/conexion.php";

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = '';
  }
  $query = "SELECT * FROM archivo WHERE id_Archivo=$id";
  $resultado = $conn->query($query);

  $row = $resultado->fetch();

  header("Content-Type:".$row['tipo']);
  echo $row['dato'];
  //echo '<img src="data:image/jpeg;base64,'.base64_encode($row['data']).'"/>';
?>
