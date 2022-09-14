<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
	<meta name="description"
		content="Agenda de Taller Web con loguin y busqueda de registro desarrollada en PHP" />
	<meta name="author" content="Labrador Brazda, Fernando Martin" />
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1245/1245174.png" />

  <title>Agenda Taller</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="https://kit.fontawesome.com/50ce7fdaf4.js" crossorigin="anonymous"></script>
 <?php
session_start();
  if($_SESSION["esta_logueado"]){
?>
</head>
<body>

    <h1>Agenda Taller</h1>
    <a class="notbutton" href="index.php">Cerrar Sesion</a>
    <?php require_once 'session_mensajes.php' ?>

    <!-- LISTO- AQUI ES! -->
    <form method="POST" action="registro.php" >

      <input type="text" name="dominio" id="dominio" placeholder=Dominio>

      <input type="text" name="vehiculo" id="vehiculo" placeholder=vehiculo >

      <input type="text" name="nombre" id="nombre" placeholder=Nombre >

      <input type="number" name="tel" id="tel" placeholder=N°Contacto >

      <textarea name="detalle" id="detalle" placeholder="Detalles"></textarea>
  
      <input type="submit" value="Guardar" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
    
    </form>
  
  
  <?php
    
    if(isset($_POST['btn1']))
    {
      include("abrir_conexion.php");

      $dominio = $_POST['dominio'];
      $vehiculo = $_POST['vehiculo'];
      $nombre= $_POST['nombre'];
      $tel = $_POST['tel'];
      $detalle = $_POST['detalle'];

      
      if($dominio=="") {
        // echo "<h3>Digita un Dominio por favor</h3>";
        $_SESSION['mensaje']['mal'] = 'Digita un Dominio por favor';
        header('Location: registro.php');
      } else
      { 
      
        $sqlr = "SELECT * FROM propietario where dominio = '$dominio'";

        $moon = $conexion->query($sqlr) or die (mysqli_error($conexion));

        if ($moon->num_rows > 0) {        
          // echo "ya existe el dominio no se pueden registrar dos veces el mismo dominio ";
          $_SESSION['mensaje']['mal'] = 'ya existe ese dominio, no se pueden registrar dos veces el mismo dominio';
          header('Location: registro.php');
          exit;
        } else {

          if (mysqli_query($conexion, "INSERT INTO propietario (dominio,vehiculo,nombre,tel,detalle) values ('$dominio','$vehiculo','$nombre','$tel','$detalle')")){
            // echo "Se insertaron Correctamente";
            $_SESSION['mensaje']['bien'] = 'Se insertaron Correctamente';
            header('Location: registro.php');
            } else {
            echo "Hubo un error.";
            }
          include("cerrar_conexion.php");
        }
    
    
      } 
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $dominio = $_POST['dominio'];
        if($dominio=="") {
          // echo "<h3>Digita un Dominio por favor</h3>";
          $_SESSION['mensaje']['mal'] = 'Digita un Dominio por favor';
          header('Location: registro.php');
        } else { 
          $consulta = "SELECT * FROM propietario WHERE dominio = '$dominio'"; 
          //echo $consulta;

          $resultados = mysqli_query($conexion,$consulta);
          
       
          if (mysqli_num_rows($resultados) == "0") {
            $_SESSION['mensaje']['mal'] = 'No hay registro';
            header('Location: registro.php');
            mysqli_free_result($resultado);
          } else {


          

            while($consulta = mysqli_fetch_array($resultados))
            {
              $_SESSION['tabla']['datos'] =
              "
                <table border=\"1\">
                  <tr>
                    <td><b>Dominio</b></td>
                    <td><b>Vehiculo</b></td>
                    <td><b>Nombre</b></td>
                    <td><b>Telefono</b></td>
                    <td><b>Detalle</b></td>
                    <td><b>Editar</b></td>
                    <td><b>Borrar</b></td>
                    
                    
                  </tr>
                  <tr>
                    <td>".$consulta['dominio']."</td>
                    <td>".$consulta['vehiculo']."</td>
                    <td>".$consulta['nombre']."</td>
                    <td>".$consulta['tel']."</td>
                    <td>".$consulta['detalle']."</td>
                    <td><a href=\"editar.php?dominio=".$consulta['dominio']."\"> <button type=button id=btx2 >Editar</button> </a></td>
                    <td><a href=\"borrar.php?dominio=".$consulta['dominio']."\"> <button type=button id=btx2 >Borrar</button> </a></td>
                                
                    
                    
                </table>
              ";
              header('Location: registro.php');
            }}
        }
  
      include("cerrar_conexion.php");
    }
  ?>


  
  
</body>
</html>

<?php
  }else{
      header('Location: index.php');
      exit;
  }
?>
 
