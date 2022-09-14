<?php
session_start();

include "user-reg.php";

$new_username = $_POST['usuario'];
$new_password1 = $_POST['clave'];

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

preg_match('/[0-9]+/', $new_password1, $matches);
if (sizeof($matches ) == 0) {
    echo "The password must have at least one number";
    $_SESSION['mensaje']['mal'] = 'La contraseña debe tener almenos 1 numero';
    header('Location: registrate.php');
    exit;
}

preg_match('/[!@#$%!^&*()-]+/', $new_password1, $matches);
if (sizeof($matches ) == 0) {
    echo "The password must be at least one special character like !@#$%!^&*()";
    $_SESSION['mensaje']['mal'] = 'La contraseña debe tener almenos 1 caracter especial !@#$%!^&*()';
    header('Location: registrate.php');
    exit;
}

if (strlen($new_password1) <= 8) {
    echo "The password must be at least 8 characters long";
    $_SESSION['mensaje']['mal'] = 'La contraseña debe tener almenos 8 caracteres';
    header('Location: registrate.php');
    exit;
}

$sql = "SELECT * FROM userss where usuario = '$new_username'";

$result = $conexion->query($sql) or die (mysqli_error($conexion));

if ($result->num_rows > 0) {
    echo "ya existe ese usuario" . $new_username . " no se pueden registrar dos veces el mismo usuario ";
    $_SESSION['mensaje']['mal'] = 'ya existe ese usuario, no se pueden registrar dos veces el mismo usuario ';
    header('Location: registrate.php');
    exit;
}


$stmt = $conexion->prepare("INSERT INTO userss (id, usuario, clave) VALUES (null, ? , ? )");

$stmt->bind_param("ss", $new_username, $hashed_password);
$result = $stmt->execute();

if ($result){
    $_SESSION['mensaje']['bien'] = 'Fuiste registrado con Exito! ' .$new_username ;
    header('Location: index.php');
}else {
    echo "no no, no se pudo ¡?";
}


include "cerrar_conexion.php";

?>
