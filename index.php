<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
	<meta name="description"
		content="Agenda de Taller Web con loguin y busqueda de registro desarrollada en PHP" />
	<meta name="author" content="Labrador Brazda, Fernando Martin" />
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1245/1245174.png" />
  
  <title>Agenda Taller </title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
 <?php
session_start();
?>
</head>
<body>

<h1><span class="letras-log">Login </span>Agenda Taller</h1>
<?php require_once 'session_mensajes.php' ?>
    <form method="POST" action="log.php" >

    <input type="text" name="usuario" class="  " id="usuario" placeholder=Usuario>

    <input type="password" name="clave" class="  " id="password" placeholder=Contraseña>
 
    <input type="submit" value="Entrar" class="btn btn-success" name="btn1">
    
    <a class="notbutton2" href="registrate.php">REGISTRARSE</a>

    </form>
    <footer>
		<div class="redlinks">
			<a href="https://github.com/FernandoLabrador/" target="_blank" rel="noopener"><img src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/github.svg" alt="Github icon"></a>
			<a href="mailto:flabradormb@gmail.com" target="_blank" rel="noopener"><img src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/gmail.svg" alt="Mail icon"></a>
			<a href="https://www.linkedin.com/in/fernandolabradorb/" target="_blank" rel="noopener">
				<img src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/linkedin.svg" alt="Linkedin icon"></a>

		</div>
		<div class="made"><a class="links" href="https://fernandolabrador.herokuapp.com/" target="_blank" rel="noopener">Fernando M. Labrador B. 🌱</a></div>
	</footer>
  </body>
</html>

<?php
session_destroy();
?>
