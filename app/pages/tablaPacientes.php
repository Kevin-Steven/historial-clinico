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
                                echo "<td class='text-center'><a href='../logic/generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger'><i class='bx bxs-file-pdf'></i></a></td>";
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



        <!-- Modern Delete Modal -->
        <div class="modal fade" id="eliminarPacienteModal" tabindex="-1" aria-labelledby="eliminarPacienteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header border-0 pb-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                                    <i class='bx bx-trash text-danger' style="font-size: 1.5rem;"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="modal-title mb-1" id="eliminarPacienteModalLabel">Eliminar Paciente</h5>
                                <p class="text-muted small mb-0">Esta acción no se puede deshacer</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-2">
                        <div class="alert alert-warning border-0 bg-warning bg-opacity-10">
                            <div class="d-flex align-items-center">
                                <i class='bx bx-error-circle text-warning me-2'></i>
                                <div>
                                    <strong>¿Estás seguro?</strong>
                                    <p class="mb-0 small">Se eliminará permanentemente toda la información del paciente del sistema.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                            <i class='bx bx-x me-1'></i> Cancelar
                        </button>
                        <a id="eliminarPacienteButton" href="#" class="btn btn-danger rounded-pill px-4">
                            <i class='bx bx-trash me-1'></i> Eliminar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var eliminarPacienteModal = document.getElementById('eliminarPacienteModal');
            eliminarPacienteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var pacienteId = button.getAttribute('data-id');
                var eliminarPacienteButton = document.getElementById('eliminarPacienteButton');
                eliminarPacienteButton.setAttribute('href', '../logic/eliminarPaciente.php?id=' + pacienteId);
            });
        </script>
        <!--/SECTION PACIENTES-->


    </main>

    <?php include '../components/footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>