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

    <!--SECTION REPORTES-->
    <section class="reportes" id="reportes">
      <h2 class="display-4 fw-bold text-center">REPORTES</h2>

      <!-- Formulario de búsqueda -->
      <form class="row g-3 align-items-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#reportes" method="GET">
        <!-- Campo de número de cédula -->
        <div class="col-12 col-md-3">
          <input class="form-control" name="buscar" type="number" placeholder="Ingrese el número de cédula" aria-label="Search" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
        </div>

        <!-- Select de discapacidad -->
        <div class="col-8 col-md-3">
          <select class="form-control" name="discapacidad" aria-label="Buscar por discapacidad">
            <option value="" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == '' ? 'selected' : ''; ?>>Todos</option>
            <option value="si" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == 'si' ? 'selected' : ''; ?>>Pacientes Con discapacidad</option>
            <option value="no" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == 'no' ? 'selected' : ''; ?>>Pacientes Sin discapacidad</option>
          </select>
        </div>

        <!-- Botón de búsqueda -->
        <div class="col-4 col-md-1">
          <button class="btn btn-outline-success w-100" type="submit">Buscar</button>
        </div>

        <!-- Botón para generar listado de discapacitados -->
        <div class="col-7 col-md-2">
          <a href="../logic/generar_listado.php" target="_blank" class="btn btn-outline-success w-100">Personas Discapacitadas</a>
        </div>

        <!-- Botón para generar listado de enfermedades -->
        <div class="col-5 col-md-2">
          <a href="../logic/generar_Enfermedades.php" target="_blank" class="btn btn-outline-success w-100">Enfermedad</a>
        </div>
      </form>


      <!-- Tabla de resultados -->
      <div class="table-responsive table-container mt-2">
        <?php
        // Verifica si se ha enviado una búsqueda por cédula o discapacidad
        if ((isset($_GET['buscar']) && !empty($_GET['buscar'])) || isset($_GET['discapacidad'])) {
          $numero_cedula = isset($_GET['buscar']) ? $_GET['buscar'] : null;
          $filtro_discapacidad = isset($_GET['discapacidad']) ? $_GET['discapacidad'] : '';

          // Construir consulta SQL
          $sql = "SELECT da.id_datos_afiliado, da.nombres, da.apellidos, da.cedula, ap.antecedentes_discapacidad 
                    FROM datos_afiliado da 
                    LEFT JOIN antecedentes_patologicos ap ON da.id_datos_afiliado = ap.id_datos_afiliado 
                    WHERE da.estado = 1";

          // Filtro por cédula
          if (!empty($numero_cedula)) {
            $sql .= " AND da.cedula = '$numero_cedula'";
          }

          // Filtro por discapacidad
          if ($filtro_discapacidad == 'si') {
            $sql .= " AND ap.antecedentes_discapacidad = 'sí'";
          } elseif ($filtro_discapacidad == 'no') {
            $sql .= " AND ap.antecedentes_discapacidad = 'no'";
          }

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Si se encontraron resultados, muestra la tabla
            echo "<table class='table table-striped'>
                        <thead class='table'>
                            <tr>
                                <th scope='col'>Nombres</th>
                                <th scope='col'>Apellidos</th>
                                <th scope='col'>Cédula</th>
                                <th scope='col' class='text-center'>Generar PDF</th>
                            </tr>
                        </thead>
                        <tbody>";

            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["nombres"] . "</td>";
              echo "<td>" . $row["apellidos"] . "</td>";
              echo "<td>" . $row["cedula"] . "</td>";
              // enlace para generar PDF
              echo "<td class='text-center'><a href='../logic/generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger'><i class='bx bxs-file-pdf'></i></a></td>";
              echo "</tr>";
            }

            echo "</tbody></table>";
          } else {
            // No se encontraron resultados
            echo "<p class='text-center mt-3'>No se encontraron resultados</p>";
          }
        } else {
          // Mensaje por defecto cuando no se ha realizado una búsqueda
          echo "<p class='text-center mt-3'>Ingrese un número de cédula o seleccione un filtro para buscar pacientes</p>";
        }
        ?>
      </div>
    </section>
    <!--/SECTION REPORTES-->


  </main>

  <?php include '../components/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>