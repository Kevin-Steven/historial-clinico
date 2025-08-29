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
    <title>Pacientes</title>
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

        <!--SECTION PACIENTES-->
        <section class="dashboard-container" id="pacientes">
            <div class="container-fluid px-4">
                <!-- Page Header -->
                <div class="row mb-1 mt-2">
                    <div class="col-12">
                        <div class="dashboard-header text-start">
                            <h1 class="dashboard-title">
                                <i class='bx bx-group me-2'></i>
                                Gestión de Pacientes
                            </h1>
                            <p class="dashboard-subtitle">Administra y consulta la información de todos los pacientes registrados</p>
                            <div class="d-flex justify-content-center justify-content-md-end gap-2 mt-2">
                                <span class="badge bg-primary-subtle text-primary badge-soft">
                                    <i class='bx bx-time-five me-1'></i> 
                                    <?php echo date('d/m/Y'); ?>
                                </span>
                                <a href="formIngresoPaciente.php" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class='bx bx-plus me-1'></i> Nuevo Paciente
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patients Table Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card border-0 shadow-sm">
                            <div class="card-header bg-transparent border-0 pb-0">
                                <h5 class="card-title mb-0">
                                    <i class='bx bx-list-ul me-2'></i>
                                    Lista de Pacientes
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-container">
                                    <table class="table table-striped">
                    <thead class="table">
                        <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col" class="text-center">Editar</th>
                            <th scope="col" class="text-center">Eliminar</th>
                            <th scope="col" class="text-center">Generar PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id_datos_afiliado, nombres, apellidos FROM datos_afiliado WHERE estado = 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["nombres"] . "</td>";
                                echo "<td>" . $row["apellidos"] . "</td>";
                                // enlace para editar
                                echo "<td class='text-center'><a href='editarPaciente.php?id=" . $row["id_datos_afiliado"] . "' class='text-primary'><i class='bx bx-edit'></i></a></td>";
                                // enlace para eliminar
                                echo "<td class='text-center'>
                            <a href='#' class='text-danger' data-bs-toggle='modal' data-bs-target='#eliminarPacienteModal' data-id='" . $row["id_datos_afiliado"] . "'>
                                <i class='bx bx-trash'></i>
                            </a>
                          </td>";
                                // enlace para generar PDF
                                echo "<td class='text-center'><a href='../logic/pdf/generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger'><i class='bx bxs-file-pdf'></i></a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No hay pacientes registrados</td></tr>";
                        }
                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Ultra Modern Delete Modal -->
        <div class="modal fade" id="eliminarPacienteModal" tabindex="-1" aria-labelledby="eliminarPacienteModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content modern-delete-modal border-0 shadow-lg">
                    <!-- Animated Header with Gradient -->
                    <div class="modal-header border-0 pb-3 position-relative overflow-hidden">
                        <div class="modal-bg-pattern"></div>
                        <div class="w-100 text-center position-relative">
                            <div class="delete-icon-container mx-auto mb-3">
                                <div class="delete-icon-wrapper">
                                    <i class='bx bx-trash delete-icon'></i>
                                </div>
                                <div class="icon-pulse-ring"></div>
                                <div class="icon-pulse-ring-2"></div>
                            </div>
                            <h4 class="modal-title fw-bold text-dark mb-1" id="eliminarPacienteModalLabel">
                                ¿Eliminar Paciente?
                            </h4>
                            <p class="text-muted small mb-0 opacity-75">Esta acción es permanente e irreversible</p>
                        </div>
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-3 opacity-50" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <!-- Modern Footer -->
                    <div class="modal-footer border-0 pt-4 px-4 pb-4">
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill" data-bs-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="button" id="eliminarPacienteButton" class="btn btn-danger btn-sm rounded-pill">
                                <span class="btn-text">
                                    Eliminar
                                </span>
                                <span class="btn-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                    Eliminando...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var eliminarPacienteModal = document.getElementById('eliminarPacienteModal');
            var eliminarPacienteButton = document.getElementById('eliminarPacienteButton');
            var currentPatientId = null;

            // Handle modal show event
            eliminarPacienteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                currentPatientId = button.getAttribute('data-id');
                
                // Reset button state
                var btnText = eliminarPacienteButton.querySelector('.btn-text');
                var btnLoading = eliminarPacienteButton.querySelector('.btn-loading');
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                eliminarPacienteButton.disabled = false;
            });

            // Handle delete button click
            eliminarPacienteButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (currentPatientId) {
                    // Show loading state
                    var btnText = this.querySelector('.btn-text');
                    var btnLoading = this.querySelector('.btn-loading');
                    
                    btnText.classList.add('d-none');
                    btnLoading.classList.remove('d-none');
                    this.disabled = true;
                    
                    // Add slight delay for better UX
                    setTimeout(function() {
                        window.location.href = '../logic/eliminarPaciente.php?id=' + currentPatientId;
                    }, 800);
                }
            });

            // Add modal animation enhancement
            eliminarPacienteModal.addEventListener('shown.bs.modal', function() {
                this.querySelector('.delete-icon-container').classList.add('animate-in');
            });

            eliminarPacienteModal.addEventListener('hidden.bs.modal', function() {
                this.querySelector('.delete-icon-container').classList.remove('animate-in');
            });
        </script>
        <!--/SECTION PACIENTES-->


    </main>

    <?php include '../components/footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>