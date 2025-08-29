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
    <title>Agregar Historial</title>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0sG1M5b4hcpxyD9F7jL+3lMAgDAw1Eq2OXk8xBz0B5h1a64x" crossorigin="anonymous"></script>

        <!--SECTION FORMULARIO-->
        <section class="dashboard-container" id="form">
            <div class="container-fluid px-4">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="dashboard-header text-center text-md-start">
                            <h1 class="dashboard-title">
                                <i class='bx bx-clipboard me-2'></i>
                                Historia Clínica
                            </h1>
                            <p class="dashboard-subtitle mb-3">Registro completo de información médica del paciente</p>
                            <div class="d-flex justify-content-center justify-content-md-end gap-2 mt-2">
                                <span class="badge bg-primary-subtle text-primary badge-soft">
                                    <i class='bx bx-time-five me-1'></i> 
                                    <?php echo date('d/m/Y'); ?>
                                </span>
                                <a href="tablaPacientes.php" class="btn btn-outline-secondary btn-sm rounded-pill">
                                    <i class='bx bx-arrow-back me-1'></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="../logic/procesarFormulario.php" method="post">
                    <!-- Datos de Afiliación Card -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="dashboard-card border-0 shadow-sm">
                                <div class="card-header bg-transparent border-0 pb-0">
                                    <h5 class="card-title mb-0">
                                        <i class='bx bx-user-detail me-2 text-indigo'></i>
                                        1. Datos de Afiliación
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-user text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="apellidos" name="apellidos" placeholder="Alvarado Villafuerte" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="nombres" class="form-label">Nombres</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-user-circle text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="nombres" name="nombres" placeholder="Carlos Luis" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="cedula" class="form-label">Número de Cédula</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-id-card text-muted'></i>
                                                </span>
                                                <input type="number" class="form-control border-start-0" id="cedula" name="cedula" placeholder="0999999999" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-map text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" name="direccion" id="direccion" placeholder="Av. Alvorada" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="barrio" class="form-label">Barrio</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-buildings text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="barrio" name="barrio" placeholder="Marianita" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="canton" class="form-label">Cantón</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-map-pin text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="canton" name="canton" placeholder="Daule" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="provincia" class="form-label">Provincia</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-world text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="provincia" name="provincia" placeholder="Guayas" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-phone text-muted'></i>
                                                </span>
                                                <input type="number" class="form-control border-start-0" name="telefono" id="telefono" placeholder="0999999999" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-calendar text-muted'></i>
                                                </span>
                                                <input type="date" class="form-control border-start-0" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="ocupacion" class="form-label">Ocupación</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-briefcase text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="ocupacion" name="ocupacion" placeholder="ej. Chef" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">Sexo</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-male-female text-muted'></i>
                                                </span>
                                                <select class="form-select border-start-0" name="sexo" required>
                                                    <option selected value="" disabled>Seleccione el género</option>
                                                    <option value="Hombre">Hombre</option>
                                                    <option value="Mujer">Mujer</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">Estado Civil</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-heart text-muted'></i>
                                                </span>
                                                <select class="form-select border-start-0" name="estado_civil" required>
                                                    <option selected value="" disabled>Estado civil</option>
                                                    <option value="Soltero/a">Soltero/a</option>
                                                    <option value="Casado/a">Casado/a</option>
                                                    <option value="Divorciado/a">Divorciado/a</option>
                                                    <option value="Viudo/a">Viudo/a</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label for="hijos" class="form-label">Hijos</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-child text-muted'></i>
                                                </span>
                                                <input type="number" class="form-control border-start-0" id="hijos" name="hijos" placeholder="ej. 1" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="nombre_contacto" class="form-label">Nombre de Contacto</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-user-voice text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="nombre_contacto" name="nombre_contacto" placeholder="ej. Juan">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="carrera" class="form-label">Carrera a la que pertenece</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-book text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="carrera" name="carrera" placeholder="ej. Medico">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="fecha" class="form-label">Fecha</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-calendar-check text-muted'></i>
                                                </span>
                                                <input type="date" class="form-control border-start-0" id="fecha" name="fecha" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="estudios_realizados" class="form-label">Estudios Realizados</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-graduation text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="estudios_realizados" name="estudios_realizados" placeholder="ej. Universidad de Guayaquil" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">Atención Médica Actual</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-plus-medical text-muted'></i>
                                                </span>
                                                <select class="form-select border-start-0" name="atencion_medica" required>
                                                    <option selected value="" disabled>Seleccione una entidad</option>
                                                    <option value="IESS">IESS</option>
                                                    <option value="MINISTERIO DE SALUD PUBLICA">MSP</option>
                                                    <option value="PARTICULAR">Particular</option>
                                                    <option value="OTRO">Otro</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="profesion" class="form-label">Profesión</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-badge text-muted'></i>
                                                </span>
                                                <input type="text" class="form-control border-start-0" id="profesion" name="profesion" placeholder="ej. Maestro" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Antecedentes Patológicos Card -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="dashboard-card border-0 shadow-sm">
                                <div class="card-header bg-transparent border-0 pb-0">
                                    <h5 class="card-title mb-0">
                                        <i class='bx bx-health me-2 text-emerald'></i>
                                        2. Antecedentes Patológicos Personales
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="alergia">
                                                <span>1. Alérgico</span>
                                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="calergico" id="alergia">
                                            </label>
                                        </div>

                                        <div class="mb-3 col-12 col-md-8 col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0">
                                                    <i class='bx bx-error-circle text-muted'></i>
                                                </span>
                                                <textarea class="form-control border-start-0" name="dalergia" rows="2" placeholder="Descripción de alergias"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="clinica">
                                                <span>2. Clínica</span>
                                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cclinica" id="clinica">
                                            </label>
                                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-plus-medical text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dclinica" rows="2" placeholder="Descripción clínica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="ginecologia">
                                <span>3. Ginecología</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cginecologia" id="ginecologia">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-female text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dginecologia" rows="2" placeholder="Descripción ginecológica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="traumatologia">
                                <span>4. Traumatología</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="ctraumatologia" id="traumatologia">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dtraumatologia" rows="2" placeholder="Descripción traumatológica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="quirurgico">
                                <span>5. Quirúrgico</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cquirurgico" id="quirurgico">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-scalpel text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dquirurgico" rows="2" placeholder="Descripción quirúrgica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="farmacologico">
                                <span>6. Farmacológico</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cfarmacologico" id="farmacologico">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-capsule text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dfarmacologico" rows="2" placeholder="Descripción farmacológica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="psiquiatrico">
                                <span>7. Psiquiátrico</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cpsiquiatrico" id="psiquiatrico">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-brain text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dpsiquiatrico" rows="2" placeholder="Descripción psiquiátrica"></textarea>
                        </div>
                    </div>

                        <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                            <label class="pointer-cursor form-check-label d-flex align-items-center" for="otro">
                                <span>8. Otro</span>
                                <input class="form-check-input ms-2" type="checkbox" value="SI" name="cotro" id="otro">
                            </label>
                        </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-dots-horizontal-rounded text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dotro" rows="2" placeholder="Otra descripción"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-4 pt-2">
                        <label class="form-label"><strong>Antecedentes de Discapacidad</strong></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-accessibility text-muted'></i>
                            </span>
                            <select id="antecedentesDiscapacidad" class="form-select border-start-0" name="antecedentesDiscapacidad" aria-label="Default select example" required>
                                <option selected value="" disabled>Seleccionar estado</option>
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="discapacidadFields" style="display: none;">
                    <h3 class="fw-bold pb-2">Describa El Tipo De Discapacidad:</h3>

                    <div class="form-group row mb-3 ">
                        <label for="dc1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Física:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-accessibility text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="dc1" name="descripcion_discapacidad_fisica" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="di1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Intelectual:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-brain text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="di1" name="descripcion_discapacidad_intelectual" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="dm1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Mental:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-user-voice text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="dm1" name="descripcion_discapacidad_mental" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="dp1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Psicosocial:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-group text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="dp1" name="descripcion_discapacidad_psicosocial" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="ds1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Sensorial:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-body text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="ds1" name="descripcion_discapacidad_sensorial" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="da1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Auditiva:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-volume-mute text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="da1" name="descripcion_discapacidad_auditiva" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3 ">
                        <label for="dv1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Visual:</label>
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-low-vision text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="dv1" name="descripcion_discapacidad_visual" rows="2" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('antecedentesDiscapacidad').addEventListener('change', function() {
                        var displayValue = this.value === 'SI' ? 'block' : 'none';
                        document.getElementById('discapacidadFields').style.display = displayValue;
                    });
                </script>

                <div class="row">
                    <div class="mb-3 col-12 col-md-6 col-lg-4 ">
                        <label class="form-label"><strong>Carnet de conadis</strong></label>
                        <select id="carnetConadis" class="form-select" name="carnetConadis" aria-label="Default select example" required>
                            <option selected value="" disabled>Seleccionar estado</option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>

                    <div id="porcentajeDiscapacidadField" class=" col-12 col-md-6 col-lg-4" style="display: none;">
                        <label class="form-label"><strong>Indique el porcentaje</strong></label>
                        <input type="number" class="form-control" id="porcentaje_discapacidad" name="porcentaje_discapacidad" placeholder="ej. 50" value="0">
                    </div>
                </div>

                <script>
                    document.getElementById('carnetConadis').addEventListener('change', function() {
                        var displayValue = this.value === 'SI' ? 'block' : 'none';
                        document.getElementById('porcentajeDiscapacidadField').style.display = displayValue;
                    });
                </script>

                <!--TABLA 5-->
                <hr>
                <br>
                <h3 class="fw-bold">3. Antecedentes Obstetricos</h3>
                <div class="row">
                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="menarquea">
                            1. Menarquea
                            <input class="form-check-input" type="checkbox" name="cmenarquea" value="SI" id="menarquea">
                        </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="gesta">
                            2. Gesta
                            <input class="form-check-input" type="checkbox" name="cgesta" value="SI" id="gesta">
                        </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="cesarea">
                            3. Cesárea
                            <input class="form-check-input" type="checkbox" name="ccesarea" value="SI" id="cesarea">
                        </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="aborto">
                            4. Aborto
                            <input class="form-check-input" type="checkbox" name="caborto" value="SI" id="aborto">
                        </label>
                    </div>
                </div>

                <div class="col-12 pt-3">
                    <h5>Habitos Personales</h5>
                </div>

                <div class="row">
                    <div class="mb-3 col-12 col-md-6 col-lg-3 pt-2 d-flex gap-3 align-items-end">
                        <label class="form-label">
                            1. Alcohol
                        </label>
                        <select class="form-select" name="gradosAlcohol" aria-label="Default select example" style="width: 150px;">
                            <option selected value="" disabled>Seleccionar</option>
                            <option value="+">+</option>
                            <option value="++">++</option>
                            <option value="+++">+++</option>
                        </select>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="droga">
                            2. Droga
                            <input class="form-check-input" type="checkbox" name="cdroga" value="SI" id="droga">
                        </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="cigarrillo">
                            3. Cigarrillo
                            <input class="form-check-input" type="checkbox" name="ccigarrillo" value="SI" id="cigarrillo">
                        </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                        <label class="pointer-cursor form-check-label" for="Aootro">
                            4. Otro
                            <input class="form-check-input" type="checkbox" name="chabitosOtros" value="SI" id="Aootro">
                        </label>
                    </div>
                </div>

                <!--TABLA 6-->
                <hr>
                <br>
                <h3 class="fw-bold">4. Antecedentes patologicos familiares</h3>
                <div class="mb-3 col-12 pt-2">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-family text-muted'></i>
                        </span>
                        <textarea class="form-control border-start-0" name="antecedentesPatologicosFamiliares" rows="4" placeholder="Descripción"></textarea>
                    </div>
                </div>

                <!--TABLA 7-->
                <hr>
                <br>
                <h3 class="fw-bold">5. Enfermedad Actual</h3>

                <div class="row">
                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="viaLibre">
                            Vía aérea libre
                            <input class="form-check-input" type="checkbox" value="SI" name="cviaLibre" id="viaLibre">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-check-circle text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dviaLibre" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>

                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="viaObstruida">
                            Vía aérea obstruida
                            <input class="form-check-input" type="checkbox" name="cviaObstruida" value="SI" id="viaObstruida">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-x-circle text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dviaObstruida" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>

                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="condicionEstable">
                            Condición estable
                            <input class="form-check-input" type="checkbox" name="ccondicionEstable" value="SI" id="condicionEstable">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-heart text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dcondicionEstable" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>

                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label text-center" for="condicionInestable">
                            Condición inestable
                            <input class="form-check-input" type="checkbox" value="SI" name="ccondicionInestable" id="condicionInestable">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-heart-circle text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dcondicionInestable" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>
                </div>

                <!--TABLA 8-->
                <hr>
                <br>
                <h3 class="fw-bold col-12 pb-2">6. Signos Vitales</h3>

                <div class="row">
                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="presionArterial" class="form-label">Presión arterial: </label>
                        <input type="text" class="form-control" id="presionArterial" name="presionArterial" placeholder="ej. 80" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="frecuenciaCardiaca" class="form-label">Frecuencia Cardiáca</label>
                        <input type="text" class="form-control" id="frecuenciaCardiaca" name="frecuenciaCardiaca" placeholder="ej. 54 - 100 bpm" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="frecuenciaRespiratoria" class="form-label">Frecuencia respiratoria</label>
                        <input type="text" class="form-control" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria" placeholder="ej. 30 - 80" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="temperatura" class="form-label">Temperatura</label>
                        <input type="text" class="form-control" name="temperatura" id="temperatura" placeholder="ej. 35,4 - 40" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="text" class="form-control" name="peso" id="peso" placeholder="ej. 80kg" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="talla" class="form-label">Talla</label>
                        <input type="text" class="form-control" name="talla" id="talla" placeholder="ej. 36" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="observacion" class="form-label">Observación</label>
                        <input type="text" class="form-control" name="observacion" id="observacion" placeholder="ej. N/A" required>
                    </div>
                </div>

                <!--TABLA 9-->
                <hr>
                <br>
                <h3 class="fw-bold col-12 pb-2">7. Examen físico general</h3>

                <div class="mb-3 col-12 pt-2">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-body text-muted'></i>
                        </span>
                        <textarea class="form-control border-start-0" name="examenFisicoGeneral" rows="4" placeholder="Descripción"></textarea>
                    </div>
                </div>

                <!--TABLA 10-->
                <hr>
                <br>
                <h3 class="fw-bold col-12 pb-2">8. Examen físico regional</h3>

                <div class="row">
                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="cabeza">
                            1. Cabeza
                            <input class="form-check-input" type="checkbox" name="ccabeza" value="SI" id="cabeza">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-face text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dcabeza" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="cuello">
                            2. Cuello
                            <input class="form-check-input" type="checkbox" name="ccuello" value="SI" id="cuello">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-user-circle text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dcuello" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="torax">
                            3. Tórax
                            <input class="form-check-input" type="checkbox" name="ctorax" value="SI" id="torax">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dtorax" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="abdomen">
                            4. Abdomen
                            <input class="form-check-input" type="checkbox" name="cabdomen" value="SI" id="abdomen">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dabdomen" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="columna">
                            5. Columna
                            <input class="form-check-input" type="checkbox" name="ccolumna" value="SI" id="columna">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dcolumna" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="pelvis">
                            6. Pelvis
                            <input class="form-check-input" type="checkbox" name="cpelvis" value="SI" id="pelvis">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dpelvis" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>


                    <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                        <label class="pointer-cursor form-check-label" for="extremidades">
                            7. Extremidades
                            <input class="form-check-input" type="checkbox" name="cextremidades" value="SI" id="extremidades">
                        </label>
                    </div>

                    <div class="mb-3 col-12 col-md-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-body text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" name="dextremidades" rows="2" placeholder="Descripción"></textarea>
                        </div>
                    </div>
                </div>

                <!--TABLA 11-->
                <hr>
                <br>
                <h3 class="fw-bold col-12 pb-2">9. Diagnóstico</h3>

                <div class="col-12">
                    <label for="presuntivo" class="pb-2 h5">
                        Presuntivo:
                    </label>
                    <div class="mb-3 col-12">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-search-alt text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" id="presuntivo" name="presuntivo" rows="3" placeholder="Descripción" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="definitivo" class="pb-2 h5">
                        Definitivo:
                    </label>
                    <div class="mb-3 col-12">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-check-double text-muted'></i>
                            </span>
                            <textarea class="form-control border-start-0" id="definitivo" name="definitivo" rows="3" placeholder="Descripción" required></textarea>
                        </div>
                    </div>
                </div>

                <!--TABLA 12-->
                <hr>
                <br>
                <h3 class="fw-bold col-12 pb-2">10. Tratamiento</h3>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="indicaciones" class="pb-2 h5">
                            Indicaciones
                        </label>
                        <div class="mb-3" style="width: 100%;">
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-list-check text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="indicacion_1" name="indicacion_1" rows="5" placeholder="Descripción" required></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-list-check text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="indicacion_2" name="indicacion_2" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-list-check text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="indicacion_3" name="indicacion_3" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-list-check text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="indicacion_4" name="indicacion_4" rows="5" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="medicamentos" class="pb-2 h5">
                            Medicamentos
                        </label>
                        <div class="mb-3" style="width: 100%;">
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-capsule text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="medicamento_1" name="medicamento_1" rows="5" placeholder="Descripción" required></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-capsule text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="medicamento_2" name="medicamento_2" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-capsule text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="medicamento_3" name="medicamento_3" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-capsule text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="medicamento_4" name="medicamento_4" rows="5" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="posologia" class="pb-2 h5">
                            Posología
                        </label>
                        <div class="mb-3" style="width: 100%;">
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-time text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="posologia_1" name="posologia_1" rows="5" placeholder="Descripción" required></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-time text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="posologia_2" name="posologia_2" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-time text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="posologia_3" name="posologia_3" rows="5" placeholder="Descripción"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-time text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" id="posologia_4" name="posologia_4" rows="5" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                            <a href="tablaPacientes.php" class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm" style="min-width: 150px;">
                                <i class='bx bx-arrow-back me-2'></i>
                                <span>Cancelar</span>
                            </a>
                            <button type="submit" class="btn btn-primary-custom rounded-pill px-4 py-2 shadow-sm" style="min-width: 200px;">
                                <i class='bx bx-check-circle me-2'></i>
                                Guardar Historia Clínica
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class='bx bx-info-circle me-1'></i>
                                Asegúrese de completar todos los campos requeridos antes de guardar
                            </small>
                        </div>
                    </div>
                </div>
                </div>

                </form>

            </section>
            <!--SECTION FORMULARIO/-->

        </main>

        <?php include '../components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>