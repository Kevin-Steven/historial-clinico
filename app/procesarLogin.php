<?php
require "../config.php";
session_start();

$email = mysqli_real_escape_string($conn, $_POST["correo"]);
$password = mysqli_real_escape_string($conn, $_POST["pass"]);

$query = "SELECT * FROM usuario WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
  echo "Error al ejecutar la consulta: " . mysqli_error($conn);
  exit;
}

$user = mysqli_fetch_assoc($result);

if (!$user || $password !== $user["contraseña"]) {
  // Si el usuario o la contraseña son incorrectos, guarda el mensaje de error en la sesión
  $_SESSION["error_message"] = "Nombre de usuario o contraseña no válidos.";
  header("Location: login.php");
  exit;
}

$_SESSION["id_usuario"] = $user["id_usuario"];
$_SESSION["email"] = $user["email"];
$_SESSION["rol"] = $user["rol"];

header("Location: inicio.php");
exit;
?>
