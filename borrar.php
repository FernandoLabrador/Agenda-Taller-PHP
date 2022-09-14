<?php
session_start();

include("abrir_conexion.php");

if(isset($_GET['dominio'])) {

  $dominio = $_GET['dominio'];
  $query = "DELETE FROM propietario WHERE dominio= '$dominio'";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }


  $_SESSION['mensaje']['borrada'] = 'Tarea Borrada';
  header('Location: registro.php');
  
}

?>


