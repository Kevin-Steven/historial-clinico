<?php
require "../config/config.php";
session_start();

if(isset($_SESSION['id_usuario'])) {
  $id_usuario = $_SESSION['id_usuario'];
} else {
  // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
  header("Location: login.php");
  exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_datos_afiliado = $_GET['id'];

    $sql = "SELECT 
            da.*, 
            
            ap.*, 
            ao.*, 
            apf.*, 
            ea.*, 
            sv.*, 
            efg.*, 
            efr.*, 
            d.*, 
            t.*
        FROM datos_afiliado da
        LEFT JOIN antecedentes_patologicos ap ON da.id_datos_afiliado = ap.id_datos_afiliado
        LEFT JOIN antecedentes_obstetricos ao ON da.id_datos_afiliado = ao.id_datos_afiliado
        LEFT JOIN antecedentes_patologicos_familiares apf ON da.id_datos_afiliado = apf.id_datos_afiliado
        LEFT JOIN enfermedad_actual ea ON da.id_datos_afiliado = ea.id_datos_afiliado
        LEFT JOIN signos_vitales sv ON da.id_datos_afiliado = sv.id_datos_afiliado
        LEFT JOIN examen_fisico_general efg ON da.id_datos_afiliado = efg.id_datos_afiliado
        LEFT JOIN examen_fisico_regional efr ON da.id_datos_afiliado = efr.id_datos_afiliado
        LEFT JOIN diagnostico d ON da.id_datos_afiliado = d.id_datos_afiliado
        LEFT JOIN tratamiento t ON da.id_datos_afiliado = t.id_datos_afiliado
        WHERE da.id_datos_afiliado = $id_datos_afiliado";

        $result = $conn->query($sql);

    if ($result->num_rows > 0 ) {
        $row = $result->fetch_assoc();
        ?>
<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Editar Paciente</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        <!-- Cargar Bootstrap y Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>



        <section class="dashboard-container" id="form">
          <div class="container-fluid px-4">
            <!-- Page Header -->
            <div class="row mb-4 mt-2">
              <div class="col-12">
                <div class="dashboard-header text-start">
                  <h1 class="dashboard-title">
                    <i class='bx bx-edit me-2'></i>
                    Editar Paciente
                  </h1>
                  <p class="dashboard-subtitle">Modifica la información médica y personal del paciente</p>
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

            <form action="../logic/actualizarDatos.php" method="post">
              <!-- Datos de Afiliación Card -->
              <div class="row mb-4">
                <div class="col-12">
                  <div class="dashboard-card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pb-0">
                      <h5 class="card-title mb-0">
                        <i class='bx bx-user-detail me-2 text-primary'></i>
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
                            <input type="text" class="form-control border-start-0" id="apellidos" name="apellidos" placeholder="Gabriel Jazmin" value="<?php echo $row['apellidos']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="nombres" class="form-label">Nombres</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-user text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="nombres" name="nombres" placeholder="Alvarado Fajardo" value="<?php echo $row['nombres']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="cedula" class="form-label">N° de Cédula</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-id-card text-muted'></i>
                            </span>
                            <input type="number" class="form-control border-start-0" id="cedula" name="cedula" placeholder="0999999999" value="<?php echo $row['cedula']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="direccion" class="form-label">Dirección</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-home text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" name="direccion" id="direccion" placeholder="Av. Alvorada" value="<?php echo $row['direccion']; ?>" required>
                          </div>
                        </div>
                        
                        <!-- SEGUNDA COLUMNA -->
                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="barrio" class="form-label">Barrio</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-map text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="barrio" name="barrio" placeholder="Marianita" value="<?php echo $row['barrio']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="canton" class="form-label">Cantón</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-map-pin text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="canton" name="canton" placeholder="Daule" value="<?php echo $row['canton']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="provincia" class="form-label">Provincia</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-world text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="provincia" name="provincia" placeholder="Guayas" value="<?php echo $row['provincia']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="telefono" class="form-label">Teléfono</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-phone text-muted'></i>
                            </span>
                            <input type="number" class="form-control border-start-0" name="telefono" id="telefono" placeholder="0999999999" value="<?php echo $row['telefono']; ?>" required>
                          </div>
                        </div>

                        <!-- TERCERA COLUMNA -->
                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-calendar text-muted'></i>
                            </span>
                            <input type="date" class="form-control border-start-0" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="ocupacion" class="form-label">Ocupación</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-briefcase text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="ocupacion" name="ocupacion" placeholder="ej. Chef" value="<?php echo $row['ocupacion']; ?>" required>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                          <label class="form-label">Sexo</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-male-female text-muted'></i>
                            </span>
                            <select class="form-select border-start-0" name="sexo" aria-label="Default select example" required>
                                <option selected><?php echo $row['sexo']; ?></option>
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
                            <select class="form-select border-start-0" name="estado_civil" aria-label="Default select example" required>
                                <option selected><?php echo $row['estado_civil']; ?></option>
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
                            <input type="number" class="form-control border-start-0" id="hijos" name="hijos" value="<?php echo $row['hijos']; ?>" placeholder="ej. 1">
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="nombre_contacto" class="form-label">Nombre de Contacto</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-user-circle text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="nombre_contacto" name="nombre_contacto" value="<?php echo $row['nombre_contacto']; ?>" placeholder="ej. Juan">
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="carrera" class="form-label">Carrera a la que pertenece</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-book text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="carrera" name="carrera" value="<?php echo $row['carrera']; ?>" placeholder="ej. Medico">
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="fecha" class="form-label">Fecha</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-calendar-check text-muted'></i>
                            </span>
                            <input type="date" class="form-control border-start-0" id="fecha" value="<?php echo $row['fecha']; ?>" name="fecha">
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                          <label for="estudios_realizados" class="form-label">Estudios Realizados</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-graduation text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="estudios_realizados" name="estudios_realizados" value="<?php echo $row['estudios_realizados']; ?>" placeholder="ej. Universidad de Gayaquil">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Atención Médica Card -->
              <div class="row mb-4">
                <div class="col-12">
                  <div class="dashboard-card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pb-0">
                      <h5 class="card-title mb-0">
                        <i class='bx bx-plus-medical me-2 text-success'></i>
                        Información Médica Adicional
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                          <label class="form-label">Actualmente recibe atención médica en:</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-hospital text-muted'></i>
                            </span>
                            <select class="form-select border-start-0" name="atencion_medica" aria-label="Default select example">
                                <option selected><?php echo $row['atencion_medica']; ?></option>
                                <option value="IESS">IESS</option>
                                <option value="MINISTERIO DE SALUD PUBLICA">MSP</option>
                                <option value="PARTICULAR">Particular</option>
                                <option value="OTRO">Otro</option>
                            </select>
                          </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                          <label for="profesion" class="form-label">Profesión</label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-briefcase-alt text-muted'></i>
                            </span>
                            <input type="text" class="form-control border-start-0" value="<?php echo $row['profesion']; ?>" id="profesion" name="profesion" placeholder="ej. Maestro">
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
                        <i class='bx bx-health me-2 text-warning'></i>
                        2. Antecedentes Patológicos Personales
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <!-- Alérgico -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['alergico'] == 'SI') echo 'checked'; ?> type="checkbox" value="SI" name="calergico" id="alergia">
                                <label class="form-check-label fw-semibold" for="alergia">
                                  <i class='bx bx-error-circle me-2 text-danger'></i>1. Alérgico
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dalergia" rows="2" placeholder="Descripción de alergias"><?php echo $row['descripcion_alergia']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Clínica -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['clinica'] == 'SI') echo 'checked'; ?> type="checkbox" value="SI" name="cclinica" id="clinica">
                                <label class="form-check-label fw-semibold" for="clinica">
                                  <i class='bx bx-clinic me-2 text-primary'></i>2. Clínica
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dclinica" rows="2" placeholder="Descripción clínica"><?php echo $row['descripcion_clinica']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Ginecología -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['ginecologia'] == 'SI') echo 'checked'; ?> type="checkbox" name="cginecologia" value="SI" id="ginecologia">
                                <label class="form-check-label fw-semibold" for="ginecologia">
                                  <i class='bx bx-female me-2 text-pink'></i>3. Ginecología
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dginecologia" rows="2" placeholder="Descripción ginecológica"><?php echo $row['descripcion_ginecologia']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Traumatología -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['traumatologia'] == 'SI') echo 'checked'; ?> type="checkbox" name="ctraumatologia" value="SI" id="traumatologia">
                                <label class="form-check-label fw-semibold" for="traumatologia">
                                  <i class='bx bx-band-aid me-2 text-warning'></i>4. Traumatología
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dtraumatologia" rows="2" placeholder="Descripción traumatológica"><?php echo $row['descripcion_traumatologia']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Quirúrgico -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['quirurgico'] == 'SI') echo 'checked'; ?> name="cquirurgico" type="checkbox" value="SI" id="quirurgico">
                                <label class="form-check-label fw-semibold" for="quirurgico">
                                  <i class='bx bx-scalpel me-2 text-info'></i>5. Quirúrgico
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dquirurgico" rows="2" placeholder="Descripción quirúrgica"><?php echo $row['descripcion_quirurgico']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Farmacológico -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['farmacologico'] == 'SI') echo 'checked'; ?> type="checkbox" name="cfarmacologico" value="SI" id="farmacologico">
                                <label class="form-check-label fw-semibold" for="farmacologico">
                                  <i class='bx bx-capsule me-2 text-success'></i>6. Farmacológico
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dfarmacologico" rows="2" placeholder="Descripción farmacológica"><?php echo $row['descripcion_farmacologico']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Psiquiátrico -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['psiquiatrico'] == 'SI') echo 'checked'; ?> type="checkbox" name="cpsiquiatrico" value="SI" id="psiquiatrico">
                                <label class="form-check-label fw-semibold" for="psiquiatrico">
                                  <i class='bx bx-brain me-2 text-secondary'></i>7. Psiquiátrico
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dpsiquiatrico" rows="2" placeholder="Descripción psiquiátrica"><?php echo $row['descripcion_psiquiatrico']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Otro -->
                        <div class="col-12 mb-4">
                          <div class="row align-items-center">
                            <div class="col-12 col-md-3 mb-2">
                              <div class="form-check">
                                <input class="form-check-input" <?php if ($row['otro'] == 'SI') echo 'checked'; ?> type="checkbox" name="cotro" value="SI" id="otro">
                                <label class="form-check-label fw-semibold" for="otro">
                                  <i class='bx bx-dots-horizontal-rounded me-2 text-muted'></i>8. Otro
                                </label>
                              </div>
                            </div>
                            <div class="col-12 col-md-9">
                              <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                  <i class='bx bx-note text-muted'></i>
                                </span>
                                <textarea class="form-control border-start-0" name="dotro" rows="2" placeholder="Descripción de otros antecedentes"><?php echo $row['descripcion_otro']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Antecedentes de Discapacidad -->
                        <div class="col-12 mb-4">
                          <label class="form-label fw-semibold mb-3">
                            <i class='bx bx-accessibility me-2 text-info'></i>Antecedentes de Discapacidad
                          </label>
                          <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                              <i class='bx bx-check-square text-muted'></i>
                            </span>
                            <select id="antecedentesDiscapacidad" class="form-select border-start-0" name="antecedentesDiscapacidad" aria-label="Antecedentes de discapacidad">
                              <option selected><?php echo $row['antecedentes_discapacidad']; ?></option>
                              <option value="SI">Si</option>
                              <option value="NO">No</option>
                            </select>
                          </div>
                        </div>
                      </div>

            <div id="discapacidadFields" style="display: none;">
                <h3 class="fw-bold pb-2">Describa El Tipo De Discapacidad:</h3>

                <div class="form-group row mb-3">
                    <label for="dc1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Física:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                        <textarea class="form-control" id="dc1" name="descripcion_discapacidad_fisica" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_fisica']; ?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="di1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Intelectual:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="di1" name="descripcion_discapacidad_intelectual" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_intelectual'];?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="dm1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Mental:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="dm1" name="descripcion_discapacidad_mental" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_mental'];?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="dp1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Psicosocial:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="dp1" name="descripcion_discapacidad_psicosocial" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_psicosocial'];?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="ds1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Sensorial:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="ds1" name="descripcion_discapacidad_sensorial" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_sensorial'];?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="da1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Auditiva:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="da1" name="descripcion_discapacidad_auditiva" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_auditiva'];?></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="dv1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Visual:</label>
                    <div class="col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" id="dv1" name="descripcion_discapacidad_visual" rows="2" placeholder="Descripción"><?php echo $row['descripcion_discapacidad_visual'];?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-4 ">
                    <label class="form-label"><strong>Carnet de conadis</strong></label>
                    <select id="carnetConadis" class="form-select" name="carnetConadis" aria-label="Default select example" required>
                        <option selected><?php echo $row['carnet_conadis']; ?></option>
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div id="porcentajeDiscapacidadField" class="mb-3 col-12 col-md-6 col-lg-4" style="display: none;">
                    <label class="form-label"><strong>Indique el porcentaje</strong></label>
                    <input type="number" class="form-control" value="<?php echo $row['porcentaje_discapacidad']; ?>" id="porcentaje_discapacidad" name="porcentaje_discapacidad" placeholder="ej. 50">
                </div>
            </div>

                <script>
                    document.getElementById('antecedentesDiscapacidad').addEventListener('change', function() {
                        var displayValue = this.value === 'SI' ? 'block' : 'none';
                        document.getElementById('discapacidadFields').style.display = displayValue;
                    });

                    document.getElementById('carnetConadis').addEventListener('change', function() {
                        var displayValue = this.value === 'SI' ? 'block' : 'none';
                        document.getElementById('porcentajeDiscapacidadField').style.display = displayValue;
                    });

                    // Mostrar los campos correctos al cargar la página según los valores actuales
                    window.onload = function() {
                        var antecedentesValue = document.getElementById('antecedentesDiscapacidad').value;
                        document.getElementById('discapacidadFields').style.display = antecedentesValue === 'SI' ? 'block' : 'none';

                        var carnetValue = document.getElementById('carnetConadis').value;
                        document.getElementById('porcentajeDiscapacidadField').style.display = carnetValue === 'SI' ? 'block' : 'none';
                    };
                </script>

                <!-- Antecedentes Obstétricos Card -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="dashboard-card border-0 shadow-sm">
                      <div class="card-header bg-transparent border-0 pb-0">
                        <h5 class="card-title mb-0">
                          <i class='bx bx-female me-2 text-pink'></i>
                          3. Antecedentes Obstétricos
                        </h5>
                      </div>
                      <div class="card-body">
                        <!-- Antecedentes Obstétricos -->
                        <div class="row mb-4">
                          <div class="col-12 mb-3">
                            <h6 class="fw-semibold mb-3">
                              <i class='bx bx-history me-2 text-info'></i>
                              Historial Obstétrico
                            </h6>
                          </div>
                          <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['menarquea'] == 'SI') echo 'checked'; ?> type="checkbox" name="cmenarquea" value="SI" id="menarquea">
                              <label class="form-check-label fw-semibold" for="menarquea">
                                <i class='bx bx-calendar me-2 text-primary'></i>1. Menarquea
                              </label>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['gesta'] == 'SI') echo 'checked'; ?> type="checkbox" name="cgesta" value="SI" id="gesta">
                              <label class="form-check-label fw-semibold" for="gesta">
                                <i class='bx bx-baby-carriage me-2 text-success'></i>2. Gesta
                              </label>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['cesarea'] == 'SI') echo 'checked'; ?> type="checkbox" name="ccesarea" value="SI" id="cesarea">
                              <label class="form-check-label fw-semibold" for="cesarea">
                                <i class='bx bx-plus-medical me-2 text-warning'></i>3. Cesárea
                              </label>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['aborto'] == 'SI') echo 'checked'; ?> type="checkbox" name="caborto" value="SI" id="aborto">
                              <label class="form-check-label fw-semibold" for="aborto">
                                <i class='bx bx-x-circle me-2 text-danger'></i>4. Aborto
                              </label>
                            </div>
                          </div>
                        </div>

                        <!-- Hábitos Personales -->
                        <div class="row">
                          <div class="col-12 mb-3">
                            <h6 class="fw-semibold mb-3">
                              <i class='bx bx-user me-2 text-secondary'></i>
                              Hábitos Personales
                            </h6>
                          </div>
                          
                          <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <label class="form-label fw-semibold mb-2">
                              <i class='bx bx-drink me-2 text-warning'></i>1. Alcohol
                            </label>
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-drink text-muted'></i>
                              </span>
                              <select class="form-select border-start-0" name="gradosAlcohol" aria-label="Grado de alcohol">
                                <option selected><?php echo $row['alcohol']?></option>
                                <option value="+">+</option>
                                <option value="++">++</option>
                                <option value="+++">+++</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-end">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['droga'] == 'SI') echo 'checked'; ?> type="checkbox" name="cdroga" value="SI" id="droga">
                              <label class="form-check-label fw-semibold" for="droga">
                                <i class='bx bx-capsule me-2 text-danger'></i>2. Droga
                              </label>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-end">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['cigarrillo'] == 'SI') echo 'checked'; ?> type="checkbox" name="ccigarrillo" value="SI" id="cigarrillo">
                              <label class="form-check-label fw-semibold" for="cigarrillo">
                                <i class='bx bx-no-smoking me-2 text-secondary'></i>3. Cigarrillo
                              </label>
                            </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-end">
                            <div class="form-check">
                              <input class="form-check-input" <?php if ($row['otro_obstetricos'] == 'SI') echo 'checked'; ?> type="checkbox" name="chabitosOtros" value="SI" id="Aootro">
                              <label class="form-check-label fw-semibold" for="Aootro">
                                <i class='bx bx-dots-horizontal-rounded me-2 text-info'></i>4. Otro
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Antecedentes Patológicos Familiares Card -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="dashboard-card border-0 shadow-sm">
                      <div class="card-header bg-transparent border-0 pb-0">
                        <h5 class="card-title mb-0">
                          <i class='bx bx-group me-2 text-warning'></i>
                          4. Antecedentes patológicos familiares
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-clipboard text-muted'></i>
                          </span>
                          <textarea class="form-control border-start-0" name="antecedentesPatologicosFamiliares" rows="4" placeholder="Descripción de antecedentes patológicos familiares"><?php echo $row['descripcion_antecedentes_patologicos_familiares']; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Enfermedad Actual Card -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="dashboard-card border-0 shadow-sm">
                      <div class="card-header bg-transparent border-0 pb-0">
                        <h5 class="card-title mb-0">
                          <i class='bx bx-plus-medical me-2 text-danger'></i>
                          5. Enfermedad Actual
                        </h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <!-- Vía aérea libre -->
                          <div class="col-12 mb-4">
                            <div class="row align-items-center">
                              <div class="col-12 col-md-3 mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" <?php if($row['via_aerea_libre'] == 'SI') echo 'checked';?> type="checkbox" value="SI" name="cviaLibre" id="viaLibre">
                                  <label class="form-check-label fw-semibold" for="viaLibre">
                                    <i class='bx bx-wind me-2 text-success'></i>Vía aérea libre
                                  </label>
                                </div>
                              </div>
                              <div class="col-12 col-md-9">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" name="dviaLibre" rows="2" placeholder="Descripción de vía aérea libre"><?php echo $row['descripcion_via_aerea_libre']; ?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Vía aérea obstruida -->
                          <div class="col-12 mb-4">
                            <div class="row align-items-center">
                              <div class="col-12 col-md-3 mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" <?php if($row['via_aerea_obstruida'] == 'SI') echo 'checked';?> type="checkbox" name="cviaObstruida" value="SI" id="viaObstruida">
                                  <label class="form-check-label fw-semibold" for="viaObstruida">
                                    <i class='bx bx-block me-2 text-danger'></i>Vía aérea obstruida
                                  </label>
                                </div>
                              </div>
                              <div class="col-12 col-md-9">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" name="dviaObstruida" rows="2" placeholder="Descripción de vía aérea obstruida"><?php echo $row['descripcion_via_aerea_obstruida'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Condición estable -->
                          <div class="col-12 mb-4">
                            <div class="row align-items-center">
                              <div class="col-12 col-md-3 mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" <?php if($row['condicion_estable'] == 'SI' ) echo 'checked';?> type="checkbox" name="ccondicionEstable" value="SI" id="condicionEstable">
                                  <label class="form-check-label fw-semibold" for="condicionEstable">
                                    <i class='bx bx-check-circle me-2 text-success'></i>Condición estable
                                  </label>
                                </div>
                              </div>
                              <div class="col-12 col-md-9">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" name="dcondicionEstable" rows="2" placeholder="Descripción de condición estable"><?php echo $row['descripcion_condicion_estable'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Condición inestable -->
                          <div class="col-12 mb-4">
                            <div class="row align-items-center">
                              <div class="col-12 col-md-3 mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" <?php if($row['condicion_inestable'] == 'SI') echo 'checked';?> type="checkbox" value="SI" name="ccondicionInestable" id="condicionInestable">
                                  <label class="form-check-label fw-semibold" for="condicionInestable">
                                    <i class='bx bx-error-circle me-2 text-warning'></i>Condición inestable
                                  </label>
                                </div>
                              </div>
                              <div class="col-12 col-md-9">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" name="dcondicionInestable" rows="2" placeholder="Descripción de condición inestable"><?php echo $row['descripcion_condicion_inestable'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


            <!-- Signos Vitales Card -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="dashboard-card border-0 shadow-sm">
                  <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                      <i class='bx bx-heart me-2 text-danger'></i>
                      6. Signos Vitales
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="presionArterial" class="form-label fw-semibold">Presión arterial:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-pulse text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['presion_arterial'];?>" id="presionArterial" name="presionArterial" placeholder="ej. 120/80">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="frecuenciaCardiaca" class="form-label fw-semibold">Frecuencia Cardiáca:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-heart text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['frecuencia_cardiaca'];?>" id="frecuenciaCardiaca" name="frecuenciaCardiaca" placeholder="ej. 54 - 100 bpm">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="frecuenciaRespiratoria" class="form-label fw-semibold">Frecuencia respiratoria:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-wind text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['frecuencia_respiratoria'];?>" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria" placeholder="ej. 30 - 80">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="temperatura" class="form-label fw-semibold">Temperatura:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-thermometer text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['temperatura'];?>" name="temperatura" id="temperatura" placeholder="ej. 35,4 - 40°C">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="peso" class="form-label fw-semibold">Peso:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-dumbbell text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['peso']?>" name="peso" id="peso" placeholder="ej. 80kg">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-3">
                        <label for="talla" class="form-label fw-semibold">Talla:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-ruler text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" name="talla" value="<?php echo $row['talla'];?>" id="talla" placeholder="ej. 1.70m">
                        </div>
                      </div>

                      <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <label for="observacion" class="form-label fw-semibold">Observación:</label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-note text-muted'></i>
                          </span>
                          <input type="text" class="form-control border-start-0" value="<?php echo $row['observacion'];?>" name="observacion" id="observacion" placeholder="Observaciones adicionales">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Examen Físico General Card -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="dashboard-card border-0 shadow-sm">
                  <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                      <i class='bx bx-body me-2 text-primary'></i>
                      7. Examen físico general
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class='bx bx-clipboard text-muted'></i>
                      </span>
                      <textarea class="form-control border-start-0" name="examenFisicoGeneral" rows="4" placeholder="Descripción del examen físico general"><?php echo $row['descripcion_examen_fisico_general'];?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Examen Físico Regional Card -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="dashboard-card border-0 shadow-sm">
                  <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                      <i class='bx bx-scan me-2 text-info'></i>
                      8. Examen físico regional
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <!-- Cabeza -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['cabeza'] == 'SI') echo 'checked';?> type="checkbox" name="ccabeza" value="SI" id="cabeza">
                              <label class="form-check-label fw-semibold" for="cabeza">
                                <i class='bx bx-face me-2 text-primary'></i>1. Cabeza
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dcabeza" rows="2" placeholder="Descripción del examen de cabeza"><?php echo $row['descripcion_cabeza'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Cuello -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['cuello'] == 'SI') echo 'checked';?> type="checkbox" name="ccuello" value="SI" id="cuello">
                              <label class="form-check-label fw-semibold" for="cuello">
                                <i class='bx bx-body me-2 text-success'></i>2. Cuello
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dcuello" rows="2" placeholder="Descripción del examen de cuello"><?php echo $row['descripcion_cuello'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Tórax -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['torax'] == 'SI') echo 'checked';?> type="checkbox" name="ctorax" value="SI" id="torax">
                              <label class="form-check-label fw-semibold" for="torax">
                                <i class='bx bx-heart me-2 text-danger'></i>3. Tórax
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dtorax" rows="2" placeholder="Descripción del examen de tórax"><?php echo $row['descripcion_torax'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Abdomen -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['abdomen'] == 'SI') echo 'checked';?> type="checkbox" name="cabdomen" value="SI" id="abdomen">
                              <label class="form-check-label fw-semibold" for="abdomen">
                                <i class='bx bx-body me-2 text-warning'></i>4. Abdomen
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dabdomen" rows="2" placeholder="Descripción del examen de abdomen"><?php echo $row['descripcion_abdomen'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Columna -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['columna'] == 'SI') echo 'checked';?> type="checkbox" name="ccolumna" value="SI" id="columna">
                              <label class="form-check-label fw-semibold" for="columna">
                                <i class='bx bx-body me-2 text-info'></i>5. Columna
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dcolumna" rows="2" placeholder="Descripción del examen de columna"><?php echo $row['descripcion_columna'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Pelvis -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['pelvis'] == 'SI') echo 'checked';?> type="checkbox" name="cpelvis" value="SI" id="pelvis">
                              <label class="form-check-label fw-semibold" for="pelvis">
                                <i class='bx bx-body me-2 text-secondary'></i>6. Pelvis
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dpelvis" rows="2" placeholder="Descripción del examen de pelvis"><?php echo $row['descripcion_pelvis'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Extremidades -->
                      <div class="col-12 mb-4">
                        <div class="row align-items-center">
                          <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" <?php if($row['extremidades'] == 'SI') echo 'checked';?> type="checkbox" name="cextremidades" value="SI" id="extremidades">
                              <label class="form-check-label fw-semibold" for="extremidades">
                                <i class='bx bx-body me-2 text-primary'></i>7. Extremidades
                              </label>
                            </div>
                          </div>
                          <div class="col-12 col-md-9">
                            <div class="input-group">
                              <span class="input-group-text bg-light border-end-0">
                                <i class='bx bx-note text-muted'></i>
                              </span>
                              <textarea class="form-control border-start-0" name="dextremidades" rows="2" placeholder="Descripción del examen de extremidades"><?php echo $row['descripcion_extremidades'];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Diagnóstico Card -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="dashboard-card border-0 shadow-sm">
                  <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                      <i class='bx bx-health me-2 text-success'></i>
                      9. Diagnóstico
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <!-- Presuntivo -->
                      <div class="col-12 col-md-6 mb-4">
                        <label for="presuntivo" class="form-label fw-semibold mb-3">
                          <i class='bx bx-search-alt me-2 text-warning'></i>
                          Presuntivo:
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-clipboard text-muted'></i>
                          </span>
                          <textarea class="form-control border-start-0" id="presuntivo" name="presuntivo" rows="4" placeholder="Descripción del diagnóstico presuntivo"><?php echo $row['presuntivo'];?></textarea>
                        </div>
                      </div>

                      <!-- Definitivo -->
                      <div class="col-12 col-md-6 mb-4">
                        <label for="definitivo" class="form-label fw-semibold mb-3">
                          <i class='bx bx-check-circle me-2 text-success'></i>
                          Definitivo:
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light border-end-0">
                            <i class='bx bx-clipboard-check text-muted'></i>
                          </span>
                          <textarea class="form-control border-start-0" id="definitivo" name="definitivo" rows="4" placeholder="Descripción del diagnóstico definitivo"><?php echo $row['definitivo'];?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Tratamiento Card -->
              <div class="row mb-4">
                <div class="col-12">
                  <div class="dashboard-card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pb-0">
                      <h5 class="card-title mb-0">
                        <i class='bx bx-capsule me-2 text-info'></i>
                        10. Tratamiento
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <!-- Indicaciones -->
                        <div class="col-12 col-md-4 mb-4">
                          <div class="treatment-section">
                            <h6 class="treatment-title mb-3">
                              <i class='bx bx-list-check me-2 text-primary'></i>
                              Indicaciones
                            </h6>
                            <div class="treatment-items">
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="indicacion_1" name="indicacion_1" rows="3" placeholder="Indicación 1"><?php echo $row['indicacion_1'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="indicacion_2" name="indicacion_2" rows="3" placeholder="Indicación 2"><?php echo $row['indicacion_2'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="indicacion_3" name="indicacion_3" rows="3" placeholder="Indicación 3"><?php echo $row['indicacion_3'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-note text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="indicacion_4" name="indicacion_4" rows="3" placeholder="Indicación 4"><?php echo $row['indicacion_4'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                
                        <!-- Medicamentos -->
                        <div class="col-12 col-md-4 mb-4">
                          <div class="treatment-section">
                            <h6 class="treatment-title mb-3">
                              <i class='bx bx-capsule me-2 text-success'></i>
                              Medicamentos
                            </h6>
                            <div class="treatment-items">
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-plus-medical text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="medicamento_1" name="medicamento_1" rows="3" placeholder="Medicamento 1"><?php echo $row['medicamento_1'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-plus-medical text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="medicamento_2" name="medicamento_2" rows="3" placeholder="Medicamento 2"><?php echo $row['medicamento_2'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-plus-medical text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="medicamento_3" name="medicamento_3" rows="3" placeholder="Medicamento 3"><?php echo $row['medicamento_3'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-plus-medical text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="medicamento_4" name="medicamento_4" rows="3" placeholder="Medicamento 4"><?php echo $row['medicamento_4'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                
                        <!-- Posología -->
                        <div class="col-12 col-md-4 mb-4">
                          <div class="treatment-section">
                            <h6 class="treatment-title mb-3">
                              <i class='bx bx-time-five me-2 text-warning'></i>
                              Posología
                            </h6>
                            <div class="treatment-items">
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-alarm text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="posologia_1" name="posologia_1" rows="3" placeholder="Posología 1"><?php echo $row['posologia_1'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-alarm text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="posologia_2" name="posologia_2" rows="3" placeholder="Posología 2"><?php echo $row['posologia_2'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-alarm text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="posologia_3" name="posologia_3" rows="3" placeholder="Posología 3"><?php echo $row['posologia_3'];?></textarea>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="input-group">
                                  <span class="input-group-text bg-light border-end-0">
                                    <i class='bx bx-alarm text-muted'></i>
                                  </span>
                                  <textarea class="form-control border-start-0" id="posologia_4" name="posologia_4" rows="3" placeholder="Posología 4"><?php echo $row['posologia_4'];?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="row mb-5">
                <div class="col-12">
                  <div class="dashboard-card border-0 shadow-sm bg-gradient">
                    <div class="card-body text-center py-4">
                      <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                        <input type="hidden" name="id_datos_afiliado" value="<?php echo $id_datos_afiliado; ?>">
                        
                        <!-- Botón principal de actualizar -->
                        <button type="submit" class="btn btn-primary-custom rounded-pill px-4 py-2 shadow-sm">
                          <i class='bx bx-save me-2'></i>
                          <span class="fw-semibold">Actualizar Datos</span>
                        </button>
                        
                        <!-- Botón secundario de cancelar -->
                        <a href="tablaPacientes.php" class="btn btn-outline-secondary rounded-pill px-3 py-2">
                          <i class='bx bx-x me-2'></i>
                          <span>Cancelar</span>
                        </a>
                      </div>
                      
                      <!-- Texto informativo -->
                      <div class="mt-3">
                        <small class="text-muted">
                          <i class='bx bx-info-circle me-1'></i>
                          Asegúrese de revisar todos los campos antes de actualizar
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
        <!--/SECTION FORMULARIO-->
    </main>

    <?php include '../components/footer.php'; ?>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el paciente.";
    }
} else {
    echo "No se proporcionó un ID de paciente válido.";
}
?>
