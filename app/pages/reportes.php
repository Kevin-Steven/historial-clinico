<?php
require "../config/config.php";
session_start();

if (isset($_SESSION['id_usuario'])) {
  $id_usuario = $_SESSION['id_usuario'];
} else {
  // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reportes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/base.css">
  <link rel="stylesheet" href="../../css/estilos.css">
  <link rel="stylesheet" href="../../css/tables.css">
  <link rel="stylesheet" href="../../css/sidebar.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="../../images/heart-beats.png" type="image/png">
</head>

<body class="sidebar-enabled">
  <main>
    <?php include '../components/sidebar.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0sG1M5b4hcpxyD9F7jL+3lMAgDAw1Eq2OXk8xBz0B5h1a64x" crossorigin="anonymous"></script>

    <!--SECTION REPORTES-->
    <section class="dashboard-container" id="reportes">
      <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="row mb-4 mt-2">
          <div class="col-12">
            <div class="dashboard-header text-start">
              <h1 class="dashboard-title">
                <i class='bx bx-file-blank me-2'></i>
                Reportes y Consultas
              </h1>
              <p class="dashboard-subtitle">Genera reportes personalizados y consulta información específica de pacientes</p>
              <div class="d-flex justify-content-center justify-content-md-end gap-2 mt-2">
                <span class="badge bg-primary-subtle text-primary badge-soft">
                  <i class='bx bx-time-five me-1'></i> 
                  <?php echo date('d/m/Y'); ?>
                </span>
                <a href="tablaPacientes.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                  <i class='bx bx-arrow-back me-1'></i> Volver
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Search and Filter Card -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="dashboard-card border-0 shadow-sm">
              <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="card-title mb-0">
                  <i class='bx bx-search me-2 text-primary'></i>
                  Filtros de Búsqueda
                </h5>
              </div>
              <div class="card-body">
                <form class="row g-3 align-items-end" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#reportes" method="GET">
                  <!-- Campo de número de cédula -->
                  <div class="col-12 col-md-4">
                    <label for="buscar" class="form-label">Número de Cédula</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class='bx bx-id-card text-muted'></i>
                      </span>
                      <input class="form-control border-start-0" name="buscar" type="number" placeholder="Ingrese el número de cédula" aria-label="Search" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                    </div>
                  </div>

                  <!-- Select de discapacidad -->
                  <div class="col-12 col-md-4">
                    <label for="discapacidad" class="form-label">Filtro por Discapacidad</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class='bx bx-filter text-muted'></i>
                      </span>
                      <select class="form-control border-start-0" name="discapacidad" aria-label="Buscar por discapacidad">
                        <option value="" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == '' ? 'selected' : ''; ?>>Todos los pacientes</option>
                        <option value="si" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == 'si' ? 'selected' : ''; ?>>Con discapacidad</option>
                        <option value="no" <?php echo isset($_GET['discapacidad']) && $_GET['discapacidad'] == 'no' ? 'selected' : ''; ?>>Sin discapacidad</option>
                      </select>
                    </div>
                  </div>

                  <!-- Botón de búsqueda -->
                  <div class="col-12 col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-primary-custom w-100 rounded-pill" type="submit">
                      <i class='bx bx-search me-1'></i> Buscar Pacientes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Reports Card -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="dashboard-card border-0 shadow-sm">
              <div class="card-header bg-transparent border-0 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title mb-0">
                    <i class='bx bx-download me-2 text-primary'></i>
                    Reportes Rápidos
                  </h5>
                  <span class="badge bg-primary-subtle text-primary badge-soft">
                    <i class='bx bx-file-blank me-1'></i>
                    2 reportes
                  </span>
                </div>
                <p class="text-muted mb-0 mt-2 small">Genera reportes PDF de forma instantánea</p>
              </div>
              <div class="card-body pt-3">
                <div class="row g-3">
                  <!-- Botón para generar listado de discapacitados -->
                  <div class="col-12 col-lg-6">
                    <div class="report-card h-100">
                      <div class="d-flex align-items-center mb-2">
                        <div class="report-icon me-3">
                          <i class='bx bx-accessibility'></i>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-1 fw-semibold">Personas con Discapacidad</h6>
                          <small class="text-muted">Listado completo de pacientes registrados con algún tipo de discapacidad</small>
                        </div>
                      </div>
                      <a href="../logic/pdf/generar_listado.php" target="_blank" class="btn btn-primary-custom w-100 rounded-pill mt-2">
                        <i class='bx bx-download me-2'></i> Generar Reporte
                      </a>
                    </div>
                  </div>

                  <!-- Botón para generar listado de enfermedades -->
                  <div class="col-12 col-lg-6">
                    <div class="report-card h-100">
                      <div class="d-flex align-items-center mb-2">
                        <div class="report-icon me-3">
                          <i class='bx bx-plus-medical'></i>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-1 fw-semibold">Enfermedades y Diagnósticos</h6>
                          <small class="text-muted">Reporte detallado de todas las enfermedades y diagnósticos registrados</small>
                        </div>
                      </div>
                      <a href="../logic/pdf/generar_Enfermedades.php" target="_blank" class="btn btn-primary-custom w-100 rounded-pill mt-2">
                        <i class='bx bx-download me-2'></i> Generar Reporte
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Results Table Card -->
        <div class="row">
          <div class="col-12">
            <div class="dashboard-card border-0 shadow-sm">
              <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="card-title mb-0">
                  <i class='bx bx-table me-2 text-info'></i>
                  Resultados de Búsqueda
                </h5>
              </div>
              <div class="card-body">
                <div class="table-responsive table-container">
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
              echo "<td class='text-center'><a href='../logic/pdf/generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger fs-5'><i class='bx bxs-file-pdf'></i></a></td>";
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/SECTION REPORTES-->


  </main>

  <?php include '../components/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>