<?php 
	
	$host = $_ENV['DATABASE_HOST'];
	$basededatos = $_ENV['DATABASE'];
	$usuariodb = $_ENV['DATABASE_USER'];    
	$clavedb = $_ENV['DATABASE_PASSWORD'];


	$tabla_db1 = "propietario"; 	   
	

	
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "No es posible la conexion con la Base de Datos....";
	    exit();
	}

?>
