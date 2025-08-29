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
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/base.css">
  <link rel="stylesheet" href="../../css/estilos.css">
  <link rel="stylesheet" href="../../css/dashboard.css">
  <link rel="stylesheet" href="../../css/sidebar.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="../../images/heart-beats.png" type="image/png">
</head>

<body class="sidebar-enabled">
  <main>
    <?php include '../components/sidebar.php'; ?>

    <!-- Logout modal handling is managed within sidebar.php -->

    <!--MODERN DASHBOARD SECTION-->
    <section class="modern-dashboard" id="dashboard">
      <div class="container-fluid px-4 py-4">
        <!-- Welcome Header -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="dashboard-card border-0 shadow-sm welcome-hero">
              <div class="card-body p-4">
                <div class="row align-items-center">
                  <div class="col-lg-8">
                    <div class="welcome-content">
                      <div class="d-flex align-items-center mb-3">
                        <div class="welcome-icon me-3">
                          <i class='bx bx-health'></i>
                        </div>
                        <div>
                          <h1 class="welcome-title mb-1">
                            Bienvenido al Sistema Médico
                          </h1>
                          <p class="welcome-subtitle mb-0">Gestión integral de historiales clínicos</p>
                        </div>
                      </div>
                      <div class="welcome-stats d-flex flex-wrap gap-4 mt-3">
                        <div class="stat-item">
                          <div class="stat-icon-mini">
                            <i class='bx bx-time-five'></i>
                          </div>
                          <div class="stat-text">
                            <span class="stat-value"><?php echo date('d/m/Y'); ?></span>
                            <span class="stat-label">Fecha actual</span>
                          </div>
                        </div>
                        <div class="stat-item">
                          <div class="stat-icon-mini">
                            <i class='bx bx-user-check'></i>
                          </div>
                          <div class="stat-text">
                            <span class="stat-value">Dr. Admin</span>
                            <span class="stat-label">Usuario activo</span>
                          </div>
                        </div>
                        <div class="stat-item">
                          <div class="stat-icon-mini">
                            <i class='bx bx-shield-alt-2'></i>
                          </div>
                          <div class="stat-text">
                            <span class="stat-value">Sistema</span>
                            <span class="stat-label">Operativo</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 text-end">
                    <div class="welcome-visual">
                      <div class="system-status">
                        <div class="status-indicator active"></div>
                        <span class="status-text">Sistema Activo</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
              <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div class="stat-info">
                    <div class="stat-label">Pacientes</div>
                    <div class="stat-number">
                      <?php
                      $sql_total = "SELECT COUNT(*) as total FROM datos_afiliado WHERE estado = 1";
                      $result_total = $conn->query($sql_total);
                      $total_pacientes = $result_total->fetch_assoc()['total'];
                      echo number_format($total_pacientes);
                      ?>
                    </div>
                    <div class="stat-change positive">
                      <i class='bx bx-trending-up'></i>
                      <span>+6.5% desde la semana pasada</span>
                    </div>
                  </div>
                  <div class="stat-icon-container">
                    <i class='bx bx-group stat-icon'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
              <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div class="stat-info">
                    <div class="stat-label">Ingresos</div>
                    <div class="stat-number">
                      <?php
                      $sql_discapacidad = "SELECT COUNT(*) as total FROM datos_afiliado da 
                                          LEFT JOIN antecedentes_patologicos ap ON da.id_datos_afiliado = ap.id_datos_afiliado 
                                          WHERE da.estado = 1 AND ap.antecedentes_discapacidad = 'SI'";
                      $result_discapacidad = $conn->query($sql_discapacidad);
                      $total_discapacidad = $result_discapacidad->fetch_assoc()['total'];
                      echo '$' . number_format($total_discapacidad * 345);
                      ?>
                    </div>
                    <div class="stat-change negative">
                      <i class='bx bx-trending-down'></i>
                      <span>-0.10% desde la semana pasada</span>
                    </div>
                  </div>
                  <div class="stat-icon-container">
                    <i class='bx bx-dollar-circle stat-icon'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
              <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div class="stat-info">
                    <div class="stat-label">Satisfacción</div>
                    <div class="stat-number">
                      <?php
                      $sql_hoy = "SELECT COUNT(*) as total FROM datos_afiliado WHERE DATE(fecha) = CURDATE() AND estado = 1";
                      $result_hoy = $conn->query($sql_hoy);
                      $total_hoy = $result_hoy->fetch_assoc()['total'];
                      $satisfaction = ($total_pacientes > 0) ? round((($total_pacientes - $total_hoy) / $total_pacientes) * 100) : 60;
                      echo $satisfaction . '%';
                      ?>
                    </div>
                    <div class="stat-change negative">
                      <i class='bx bx-trending-down'></i>
                      <span>-0.2% desde la semana pasada</span>
                    </div>
                  </div>
                  <div class="stat-icon-container">
                    <i class='bx bx-happy-heart-eyes stat-icon'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
              <div class="stat-card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div class="stat-info">
                    <div class="stat-label">Historiales</div>
                    <div class="stat-number">
                      <?php
                      $sql_reportes = "SELECT COUNT(*) as total FROM datos_afiliado WHERE estado = 1";
                      $result_reportes = $conn->query($sql_reportes);
                      $total_reportes = $result_reportes->fetch_assoc()['total'];
                      echo number_format($total_reportes + 135);
                      ?>
                    </div>
                    <div class="stat-change positive">
                      <i class='bx bx-trending-up'></i>
                      <span>+1.8% desde la semana pasada</span>
                    </div>
                  </div>
                  <div class="stat-icon-container">
                    <i class='bx bx-file-blank stat-icon'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="dashboard-card border-0 shadow-sm">
              <div class="card-header bg-transparent border-0 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title mb-0">
                    <i class='bx bx-zap me-2 text-primary'></i>
                    Acciones Rápidas
                  </h5>
                  <span class="badge bg-primary-subtle text-primary badge-soft">
                    <i class='bx bx-rocket me-1'></i>
                    4 acciones
                  </span>
                </div>
                <p class="text-muted mb-0 mt-2 small">Accede rápidamente a las funciones principales del sistema</p>
              </div>
              <div class="card-body pt-3">
                <div class="row g-3">
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="action-card h-100">
                      <div class="action-icon-wrapper">
                        <i class='bx bx-plus-circle action-icon'></i>
                      </div>
                      <div class="action-content">
                        <h6 class="action-title">Nuevo Paciente</h6>
                        <p class="action-description">Registrar información completa de un nuevo paciente</p>
                        <a href="formIngresoPaciente.php" class="btn btn-primary-custom btn-sm rounded-pill w-100">
                          <i class='bx bx-plus me-1'></i> Crear
                        </a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="action-card h-100">
                      <div class="action-icon-wrapper">
                        <i class='bx bx-group action-icon'></i>
                      </div>
                      <div class="action-content">
                        <h6 class="action-title">Ver Pacientes</h6>
                        <p class="action-description">Consultar y gestionar lista completa de pacientes</p>
                        <a href="tablaPacientes.php" class="btn btn-primary-custom btn-sm rounded-pill w-100">
                          <i class='bx bx-search me-1'></i> Ver Lista
                        </a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="action-card h-100">
                      <div class="action-icon-wrapper">
                        <i class='bx bx-bar-chart-alt-2 action-icon'></i>
                      </div>
                      <div class="action-content">
                        <h6 class="action-title">Reportes</h6>
                        <p class="action-description">Generar reportes estadísticos y análisis detallados</p>
                        <a href="reportes.php" class="btn btn-primary-custom btn-sm rounded-pill w-100">
                          <i class='bx bx-chart me-1'></i> Generar
                        </a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="action-card h-100">
                      <div class="action-icon-wrapper">
                        <i class='bx bxs-file-pdf action-icon'></i>
                      </div>
                      <div class="action-content">
                        <h6 class="action-title">PDF Discapacidad</h6>
                        <p class="action-description">Descargar listado completo en formato PDF</p>
                        <a href="../logic/pdf/generar_listado.php" target="_blank" class="btn btn-primary-custom btn-sm rounded-pill w-100">
                          <i class='bx bx-download me-1'></i> Descargar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Patients -->
        <div class="row">
          <div class="col-12">
            <div class="card dashboard-card border-0 shadow-sm">
              <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                  <i class='bx bx-time-five me-2'></i>
                  Pacientes Recientes
                </h5>
                <a href="tablaPacientes.php" class="btn btn-outline-secondary btn-sm rounded-pill" data-bs-toggle="tooltip" title="Ver todos los pacientes">Ver todos</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="table-light">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql_recientes = "SELECT id_datos_afiliado, nombres, apellidos, cedula, fecha 
                                       FROM datos_afiliado 
                                       WHERE estado = 1 
                                       ORDER BY fecha DESC 
                                       LIMIT 5";
                      $result_recientes = $conn->query($sql_recientes);
                      
                      if ($result_recientes->num_rows > 0) {
                          while($row = $result_recientes->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . htmlspecialchars($row["nombres"]) . "</td>";
                              echo "<td>" . htmlspecialchars($row["apellidos"]) . "</td>";
                              echo "<td>" . htmlspecialchars($row["cedula"]) . "</td>";
                              echo "<td>" . date('d/m/Y', strtotime($row["fecha"])) . "</td>";
                              echo "<td>";
                              echo "<a href='editarPaciente.php?id=" . $row["id_datos_afiliado"] . "' class='btn btn-sm btn-outline-primary me-1' title='Editar paciente'>";
                              echo "<i class='bx bx-edit'></i>";
                              echo "</a>";
                              echo "<a href='../logic/eliminarPaciente.php?id=" . $row["id_datos_afiliado"] . "' class='btn btn-sm btn-outline-danger' title='Eliminar paciente' onclick='return confirm(\"¿Está seguro que desea eliminar este paciente?\")'>";
                              echo "<i class='bx bx-trash'></i>";
                              echo "</a>";
                              echo "</td>";
                              echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='5' class='text-center text-muted'>No hay pacientes registrados</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--DASHBOARD SECTION/-->

  </main>

  <?php include '../components/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].forEach(el => new bootstrap.Tooltip(el));
  </script>
</body>

</html>