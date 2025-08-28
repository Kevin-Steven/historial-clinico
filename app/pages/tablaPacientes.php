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
    <title>Pacientes</title>
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

        <!--SECTION PACIENTES-->
        <section class="pacientes" id="pacientes">
            <h2 class="display-4 fw-bold text-center">PACIENTES</h2>
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
        </section>



        <!-- Modal -->
        <div class="modal fade" id="eliminarPacienteModal" tabindex="-1" aria-labelledby="eliminarPacienteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarPacienteModalLabel">Eliminar Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de querer eliminar este paciente?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a id="eliminarPacienteButton" href="#" class="btn btn-danger">Eliminar</a>
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