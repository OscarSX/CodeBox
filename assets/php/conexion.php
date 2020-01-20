<?php
  try {
	    $conn = new PDO("mysql:host=localhost; dbname=codebox","root","");
    }
    catch (PDOException $ex) {
		    die($ex->getMessage());
      }
?>
