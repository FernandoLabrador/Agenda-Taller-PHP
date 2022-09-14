<?php
session_start();



error_reporting(E_ALL);
ini_set('display_errors', 1);

include "user-reg.php";

$username = addslashes($_POST['usuario']);
$password = $_POST['clave'];

echo "You attempted to login whith " . $username . " ";

$stmt = $conexion->prepare("SELECT id, usuario, clave FROM userss where usuario = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

if ($stmt->num_rows == 1) {
    echo " i found one ";
    $stmt->fetch();
    if (password_verify($password, $pw)) {
        echo "the password maches";
        echo "login success";
        $_SESSION["esta_logueado"] = true;
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        $_SESSION['mensaje']['bien'] = 'Bienvenido! ' .$uname ;
        header('Location: registro.php');
        exit;
    
    } else {
        $_SESSION['mensaje']['mal'] = 'Error de usuario y/o contraseña';

    }
    
} else {
    $_SESSION['mensaje']['mal'] = 'Error de usuario y/o contraseña';


}

echo "login faild";
header('Location: index.php');

?>
