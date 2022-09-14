<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
	<meta name="description"
		content="Agenda de Taller Web con loguin y busqueda de registro desarrollada en PHP" />
	<meta name="author" content="Labrador Brazda, Fernando Martin" />
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1245/1245174.png" />
  
  <title>Edicion</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  

<h1>Edicion: Agenda Taller </h1>


<?php
session_start();
include("abrir_conexion.php");

if(isset($_GET['dominio'])) {
  $dominio = $_GET['dominio'];

  $consulta = "SELECT dominio, vehiculo, nombre, tel, detalle FROM propietario WHERE dominio = '$dominio'"; 
  $resultados = mysqli_query($conexion,$consulta);

  while($datos = mysqli_fetch_array($resultados)){

    ?>

      <form method="POST" action="editar.php" >
    
      
           
      <input type="text"  value="<?php echo $datos["dominio"];?>" name="dominio" id="dominio" placeholder=Dominio>
    
      <input type="text"  value="<?php echo $datos["vehiculo"];?>" name="vehiculo" id="vehiculo" placeholder=vehiculo >
          
      <input type="text" value="<?php echo $datos["nombre"];?>"name="nombre" id="nombre" placeholder=Nombre >
      </div><br>
    
      <input type="number" value="<?php echo $datos["tel"];?>"name="tel" id="tel" placeholder=N°Contacto >
      
      <textarea name="detalle" class="detalle-edit" id="detalle" placeholder="Detalles" ><?php echo $datos["detalle"];?></textarea>

      <input type="submit" value="Guardar" class="btn btn-success" name="btn3">
          
      </form>
      </body>
</html>
      <?php 
      break;
  }
}
  
  if(isset($_POST['dominio'])) {

   mysqli_query($conexion,  "UPDATE propietario SET
  dominio ='".$_POST["dominio"]."',
  vehiculo ='".$_POST['vehiculo']."',
  nombre ='".$_POST['nombre']."',
  tel ='".$_POST['tel']."',
  detalle ='".$_POST['detalle']."'

  WHERE dominio ='".$_POST['dominio']."'");

  $_SESSION['mensaje']['bien'] = 'Tarea editada';
  header('Location: registro.php');
  exit;

 }
 ?>

 
