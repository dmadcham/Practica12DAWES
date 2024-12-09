<?php
// Credenciales Base de Datos
$dbserver = "localhost";
// Usuario con los permisos limitados
$dbuser = "admin12";
$dbpass = "admin";
$dbname = "u569805685_fm";

// Datos obtenidos del formulario
$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['pass']);

// Conexion
$conexion = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
// Sentencia SQL
$query = "SELECT user, pass FROM Usuario WHERE user = ? AND pass = ?";
// Preparamos la sentencia
$resultset = $conexion->prepare($query);
$resultset->bind_param("ss", $user, $pass);
// Ejecutamos la sentencia
$resultset->execute();
$resultset->store_result();
// Preparamos los resultados
$resultset->bind_result($usuario, $contrasena);

// Comprobamos que el usuario exista
if ($resultset->num_rows > 0) {
    // Recuperamos el resultado
    $resultset->fetch();


    // Comprobamos que la contraseña sea correcta
    if ($pass === $contrasena) {
        session_start();
        $_SESSION["user"] = $usuario;
        header("Location: user_page.php");
        $resultset->close();
        $conexion->close();
        exit();
    } else {
        header("Location: login.php?error=wrong-password");
        $resultset->close();
        $conexion->close();
        exit();
    }
} else {
    header("Location: login.php?error=user-not-found");
    $resultset->close();
    $conexion->close();
    exit();
}
$resultset->close();
$conexion->close();
