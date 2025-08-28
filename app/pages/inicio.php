<?php
require "../config/config.php";
session_start();

if (isset($_SESSION['id_usuario'])) {
  $id_usuario = $_SESSION['id_usuario'];
} else {
  // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
  header("Location: ../login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/estilos.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="../../images/heart-beats.png" type="image/png">
</head>

<body class="sidebar-enabled">
  <main>
    <?php include '../components/sidebar.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0sG1M5b4hcpxyD9F7jL+3lMAgDAw1Eq2OXk8xBz0B5h1a64x" crossorigin="anonymous"></script>
    <script>
      document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
        logoutModal.show();
      });
    </script>

    <!--SECTION INICIO-->
    <section class="inicio" id="inicio">
      <div class="newcolor card mb-3 border-0">
        <div class="text row g-0 align-items-center">
          <div class="col-md-5 order-md-2">
            <img src="../../images/img.jpg" class="inicioimg img-fluid rounded-start" alt="Imagen de medicos">
          </div>
          <div class="col-md-7 order-md-1">
            <div class="card-body p-0">
              <h1 class="titulo-inicio fw-bold">Historiales clínicos</h1>
              <h3 class="subtitulo-inicio fw-bold">Simplifica el registro y administración de la información médica.</h3>
              <p class="parrafo-inicio ">¡Bienvenido a tu plataforma de historiales clínicos! Este espacio está diseñado para que puedas acceder y gestionar los historiales clínicos de tus pacientes de manera eficiente y segura. Aquí encontrarás toda la información necesaria para proporcionar la mejor atención médica posible.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--SECTION INICIO/-->

  </main>

  <?php include '../components/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>