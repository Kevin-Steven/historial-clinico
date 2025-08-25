<?php
session_start();
require "../config.php";

$error_message = "";

if (isset($_SESSION["error_message"])) {
  $error_message = $_SESSION["error_message"];
  unset($_SESSION["error_message"]); // Elimina el mensaje de error después de mostrarlo
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../images/heart-beats.png" type="image/png">
  </head>
  <body>
      <div class="container d-flex justify-content-center align-items-center" style=" height: 85vh;">
        <div class="row">
          <form action="procesarLogin.php" class="p-5 lo" method="post" style="max-width: 450px; border: 2px solid #ccc; border-radius: 7px;">
          <div class="login">
            <img src="../images/Unidad-de-Salud-logo.png" alt="">

          </div>
          
            <h1 class="text-center mb-3 fw-bold">Iniciar Sesión</h1>
            <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                 <p class="text-center m-0"><strong>Credenciales incorrectas</strong></p>
                 <p class="m-0"><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="correo" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su usuario">
            </div>

            <div class="mb-5">
                <label for="pass" class="form-label">Clave</label>
                <input type="password" id="pass" class="form-control" name="pass" aria-describedby="passwordHelpBlock" placeholder="Ingrese su clave">   
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 ">Iniciar Sesión</button>
            </div>
          </form>

        </div>
    </div>

  </body>
</html>
