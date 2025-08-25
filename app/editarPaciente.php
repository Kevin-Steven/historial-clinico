<?php
require "../config.php";
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
      <link rel="stylesheet" href="../css/estilos.css">
      <link rel="icon" href="../images/heart-beats.png" type="image/png">

    </head>
    <body>
      <main>
        <!--NAVBAR (BARRA DE NAVEGACION)-->
        <div class="navnew">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="../images/heart.png" alt="Bootstrap" width="30" height="24" class="me-2">
                        <span class="fs-3 fw-bold d-none d-md-inline">Unidad de Salud</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav gap-3">
                            <li class="nav-item">
                                <a class="nav-link fw-medium" aria-current="page" href="inicio.php#pacientes">Regresar al inicio</a>
                            </li>
                            <li class="nav-item">
                                <a id="logout-link" class="nav-link fw-medium" href="#">Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <script>
        // Selecciona todos los enlaces dentro del navbar
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        navLinks.forEach(link => {
          link.addEventListener('click', () => {
            // Cierra el menú al hacer clic en un enlace
            const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
              toggle: false
            });
            bsCollapse.hide();
          });
        });
      </script>

        <!-- Modal de Confirmación -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Unidad de Salud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro que desea salir?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="logout.php" class="btn btn-primary">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cargar Bootstrap y Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script>
            document.getElementById('logout-link').addEventListener('click', function(event) {
                event.preventDefault();
                console.log('Logout link clicked');
                var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                console.log('Modal instance created');
                logoutModal.show();
            });
        </script>



        <section class="formulario" id="form">
        <form action="actualizarDatos.php" method="post" class="formtop">
          <h2 class="display-4 fw-bold pb-2">Editar Formulario</h2>
          <!-- TABLA 3 -->
          <h3 class="fw-bold">1. Datos Afiliación</h3>

            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Gabriel Jazmin" value="<?php echo $row['apellidos']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Alvarado Fajardo" value="<?php echo $row['nombres']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="cedula" class="form-label">N de Cedula</label>
                <input type="number" class="form-control" id="cedula" name="cedula" placeholder="0999999999" value="<?php echo $row['cedula']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Av. Alvorada" value="<?php echo $row['direccion']; ?>" required>
                </div>
                
                <!-- SEGUNDA COLUMNA -->
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="barrio" class="form-label">Barrio</label>
                <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Marianita" value="<?php echo $row['barrio']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="canton" class="form-label">Cantón</label>
                <input type="text" class="form-control" id="canton" name="canton" placeholder="Daule" value="<?php echo $row['canton']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Guayas" value="<?php echo $row['provincia']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="telefono" class="form-label">Telefóno</label>
                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="0999999999" value="<?php echo $row['telefono']; ?>" required>
                </div>

                <!-- TERCERA COLUMNA -->
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="ej. Chef" value="<?php echo $row['ocupacion']; ?>" required>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-2">
                <label class="form-label">Sexo</label>
                <select class="form-select" name="sexo" aria-label="Default select example" required>
                    <option selected><?php echo $row['sexo']; ?></option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
                </select>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-2">
                <label class="form-label">Estado Civil</label>
                <select class="form-select" name="estado_civil" aria-label="Default select example" required>
                    <option selected><?php echo $row['estado_civil']; ?></option>
                    <option value="Soltero/a">Soltero/a</option>
                    <option value="Casado/a">Casado/a</option>
                    <option value="Divorciado/a">Divorciado/a</option>
                    <option value="Viudo/a">Viudo/a</option>
                    <option value="Otro">Otro</option>
                </select>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-2">
                <label for="hijos" class="form-label">Hijos</label>
                <input type="number" class="form-control" id="hijos" name="hijos" value="<?php echo $row['hijos']; ?>" placeholder="ej. 1">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="nombre_contacto" class="form-label">Nombre de Contacto</label>
                <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="<?php echo $row['nombre_contacto']; ?>" placeholder="ej. Juan">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="carrera" class="form-label">Carrera a la que pertenece</label>
                <input type="text" class="form-control" id="carrera" name="carrera" value="<?php echo $row['carrera']; ?>" placeholder="ej. Medico">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" value="<?php echo $row['fecha']; ?>" name="fecha">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="estudios_realizados" class="form-label">Estudios Realizados</label>
                <input type="text" class="form-control" id="estudios_realizados" name="estudios_realizados" value="<?php echo $row['estudios_realizados']; ?>" placeholder="ej. Universidad de Gayaquil">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3"> 
                <label class="form-label">Actualmente recibe atencion medica en:</label>
                <select class="form-select" name="atencion_medica" aria-label="Default select example">
                    <option selected><?php echo $row['atencion_medica']; ?></option>
                    <option value="IESS">IESS</option>
                    <option value="MINISTERIO DE SALUD PUBLICA">MSP</option>
                    <option value="PARTICULAR">Particular</option>
                    <option value="OTRO">Otro</option>
                </select>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="profesion" class="form-label">Profesion</label>
                <input type="text" class="form-control" value="<?php echo $row['profesion']; ?>" id="profesion" name="profesion" placeholder="ej. Maestro">
                </div>

            <hr>
            <br>
            <!-- TABLA 4-->
            <h3 class="fw-bold pb-2">2. Antecedentes Patologicos Personales</h3>
            <div class="row">
                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label text-center" for="alergia">
                    1. Alérgico
                    <input class="form-check-input" <?php if ($row['alergico'] == 'SI') echo 'checked'; ?> type="checkbox" value="SI" name="calergico" id="alergia">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dalergia" rows="2" placeholder="Descripción"><?php echo $row['descripcion_alergia']; ?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center  ">
                    <label class="pointer-cursor form-check-label" for="clinica">
                    2. Clínica
                    <input class="form-check-input" <?php if ($row['clinica'] == 'SI') echo 'checked'; ?> type="checkbox" value="SI" name="cclinica" id="clinica">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dclinica" rows="2" placeholder="Descripción"><?php echo $row['descripcion_clinica']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="ginecologia">
                    3. Ginecología
                    <input class="form-check-input" <?php if ($row['ginecologia'] == 'SI') echo 'checked'; ?> type="checkbox" name="cginecologia" value="SI" id="ginecologia">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dginecologia" rows="2" placeholder="Descripción"><?php echo $row['descripcion_ginecologia']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center  ">
                    <label class="pointer-cursor form-check-label" for="traumatologia">
                    4. Traumatología
                    <input class="form-check-input" <?php if ($row['traumatologia'] == 'SI') echo 'checked'; ?> type="checkbox" name="ctraumatologia" value="SI" id="traumatologia">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dtraumatologia" rows="2" placeholder="Descripción"><?php echo $row['descripcion_traumatologia']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="quirurgico">
                    5. Quirúrgico
                    <input class="form-check-input" <?php if ($row['quirurgico'] == 'SI') echo 'checked'; ?> name="cquirurgico" type="checkbox" value="SI" id="quirurgico">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dquirurgico" rows="2" placeholder="Descripción"><?php echo $row['descripcion_quirurgico']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center">
                    <label class="pointer-cursor form-check-label" for="farmacologico">
                    6. Farmacológico
                    <input class="form-check-input" <?php if ($row['farmacologico'] == 'SI') echo 'checked'; ?> type="checkbox" name="cfarmacologico" value="SI" id="farmacologico">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dfarmacologico" rows="2" placeholder="Descripción"><?php echo $row['descripcion_farmacologico']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="psiquiatrico">
                    7. Psiquiátrico
                    <input class="form-check-input" <?php if ($row['psiquiatrico'] == 'SI') echo 'checked'; ?> type="checkbox" name="cpsiquiatrico" value="SI" id="psiquiatrico">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dpsiquiatrico" rows="2" placeholder="Descripción"><?php echo $row['descripcion_psiquiatrico']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="otro">
                    8. Otro
                    <input class="form-check-input" <?php if ($row['otro'] == 'SI') echo 'checked'; ?> type="checkbox" name="cotro" value="SI" id="otro">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dotro" rows="2" placeholder="Descripción"><?php echo $row['descripcion_otro']; ?></textarea>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-4 pt-2">
                    <label class="form-label"><strong>Antencedentes de Discapacidad</strong></label>
                    <select id="antecedentesDiscapacidad" class="form-select" name="antecedentesDiscapacidad" aria-label="Default select example">
                        <option selected><?php echo $row['antecedentes_discapacidad']; ?></option>
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
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

                <!--TABLA 5-->
                <hr>
                <br>
                <h3 class="fw-bold">3. Antecedentes Obstetricos</h3>
                <div class="row">
                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="menarquea">
                        1. Menarquea
                        <input class="form-check-input" <?php if ($row['menarquea'] == 'SI') echo 'checked'; ?> type="checkbox" name="cmenarquea" value="SI" id="menarquea">
                    </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="gesta">
                        2. Gesta
                        <input class="form-check-input" <?php if ($row['gesta'] == 'SI') echo 'checked'; ?> type="checkbox" name="cgesta" value="SI" id="gesta">
                    </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="cesarea">
                        3. Cesárea
                        <input class="form-check-input" <?php if ($row['cesarea'] == 'SI') echo 'checked'; ?> type="checkbox" name="ccesarea" value="SI" id="cesarea">
                    </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="aborto">
                        4. Aborto
                        <input class="form-check-input" <?php if ($row['aborto'] == 'SI') echo 'checked'; ?> type="checkbox" name="caborto" value="SI" id="aborto">
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
                        <option selected><?php echo $row['alcohol']?></option>
                        <option value="+">+</option>
                        <option value="++">++</option>
                        <option value="+++">+++</option>
                        <option value="No">No</option>
                    </select>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="droga">
                        2. Droga
                        <input class="form-check-input" <?php if ($row['droga'] == 'SI') echo 'checked'; ?> type="checkbox" name="cdroga" value="SI" id="droga">
                    </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="cigarrillo">
                        3. Cigarrillo
                        <input class="form-check-input" <?php if ($row['cigarrillo'] == 'SI') echo 'checked'; ?> type="checkbox" name="ccigarrillo" value="SI" id="cigarrillo">
                    </label>
                    </div>

                    <div class="form-check col-12 col-md-6 col-lg-3 d-flex align-items-center pt-2">
                    <label class="pointer-cursor form-check-label" for="Aootro">
                        4. Otro
                        <input class="form-check-input" <?php if ($row['otro_obstetricos'] == 'SI') echo 'checked'; ?> type="checkbox" name="chabitosOtros" value="SI" id="Aootro">
                    </label>
                    </div>
                </div>


                <!--TABLA 6-->
                <hr>
                <br>
                <h3 class="fw-bold">4. Antecedentes patologicos familiares</h3>

                <div class="mb-3 col-12 pt-2">
                <textarea class="form-control" name="antecedentesPatologicosFamiliares" rows="4" placeholder="Descripción"><?php echo $row['descripcion_antecedentes_patologicos_familiares']; ?></textarea>
                </div>

                <!--TABLA 7-->
                <hr>
                <br>
                <h3 class="fw-bold">5. Enfermedad Actual</h3>

            <div class="row">
                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="viaLibre">
                    Vía aérea libre
                    <input class="form-check-input" <?php if($row['via_aerea_libre'] == 'SI') echo 'checked';?> type="checkbox" value="SI" name="cviaLibre" id="viaLibre">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dviaLibre" rows="2" placeholder="Descripción"><?php echo $row['descripcion_via_aerea_libre']; ?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="viaObstruida">
                    Vía aérea obstruida
                    <input class="form-check-input" <?php if($row['via_aerea_obstruida'] == 'SI') echo 'checked';?> type="checkbox" name="cviaObstruida" value="SI" id="viaObstruida">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dviaObstruida" rows="2" placeholder="Descripción"><?php echo $row['descripcion_via_aerea_obstruida'];?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="condicionEstable">
                    Condición estable
                    <input class="form-check-input" <?php if($row['condicion_estable'] == 'SI' ) echo 'checked';?> type="checkbox" name="ccondicionEstable" value="SI" id="condicionEstable">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dcondicionEstable" rows="2" placeholder="Descripción"><?php echo $row['descripcion_condicion_estable'];?></textarea>
                </div>

                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center  ">
                    <label class="pointer-cursor form-check-label text-center" for="condicionInestable">
                    Condición inestable
                        <input class="form-check-input" <?php if($row['condicion_inestable'] == 'SI') echo 'checked';?> type="checkbox" value="SI" name="ccondicionInestable" id="condicionInestable">
                    </label>
                    </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dcondicionInestable" rows="2" placeholder="Descripción"><?php echo $row['descripcion_condicion_inestable'];?></textarea>
                </div>
            </div>


            <!--TABLA 8-->
            <hr>
            <br>
            <h3 class="fw-bold col-12 pb-2">6. Signos Vitales</h3>

            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="presionArterial" class="form-label">Presión arterial: </label>
                    <input type="text" class="form-control" value="<?php echo $row['presion_arterial'];?>" id="presionArterial" name="presionArterial" placeholder="ej. 80">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="frecuenciaCardiaca" class="form-label">Frecuencia Cardiáca</label>
                    <input type="text" class="form-control" value="<?php echo $row['frecuencia_cardiaca'];?>" id="frecuenciaCardiaca" name="frecuenciaCardiaca" placeholder="ej. 54 - 100 bpm">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="frecuenciaRespiratoria" class="form-label">Frecuencia respiratoria</label>
                    <input type="text" class="form-control" value="<?php echo $row['frecuencia_respiratoria'];?>" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria" placeholder="ej. 30 - 80">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="temperatura" class="form-label">Temperatura</label>
                    <input type="text" class="form-control" value="<?php echo $row['temperatura'];?>" name="temperatura" id="temperatura" placeholder="ej. 35,4 - 40">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="peso" class="form-label">Peso</label>
                    <input type="text" class="form-control" value="<?php echo $row['peso']?>" name="peso" id="peso" placeholder="ej. 80kg">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="talla" class="form-label">Talla</label>
                    <input type="text" class="form-control" name="talla" value="<?php echo $row['talla'];?>" id="talla" placeholder="ej. 36">
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="observacion" class="form-label">Observación</label>
                    <input type="text" class="form-control" value="<?php echo $row['observacion'];?>" name="observacion" id="observacion" placeholder="ej. N/A">
                </div>
            </div>

            <!--TABLA 9-->
            <hr>
            <br>
            <h3 class="fw-bold col-12 pb-2">7. Examen físico general</h3>

                <div class="mb-3 col-12 pt-2">
                     <textarea class="form-control" name="examenFisicoGeneral" rows="4" placeholder="Descripción"><?php echo $row['descripcion_examen_fisico_general'];?></textarea>
                </div>

            <!--TABLA 10-->
            <hr>
            <br>
            <h3 class="fw-bold col-12 pb-2">8. Examen físico regional</h3>

            <div class="row">
                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="cabeza">
                    1. Cabeza
                    <input class="form-check-input" <?php if($row['cabeza'] == 'SI') echo 'checked';?> type="checkbox" name="ccabeza" value="SI" id="cabeza">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dcabeza" rows="2" placeholder="Descripción"><?php echo $row['descripcion_cabeza'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="cuello">
                    2. Cuello
                    <input class="form-check-input" <?php if($row['cuello'] == 'SI') echo 'checked';?> type="checkbox" name="ccuello" value="SI" id="cuello">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dcuello" rows="2" placeholder="Descripción"><?php echo $row['descripcion_cuello'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="torax">
                    3. Tórax
                    <input class="form-check-input" <?php if($row['torax'] == 'SI') echo 'checked';?> type="checkbox" name="ctorax" value="SI" id="torax">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dtorax" rows="2" placeholder="Descripción"><?php echo $row['descripcion_torax'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="abdomen">
                    4. Abdomen
                    <input class="form-check-input" <?php if($row['abdomen'] == 'SI') echo 'checked';?> type="checkbox" name="cabdomen" value="SI" id="abdomen">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dabdomen" rows="2" placeholder="Descripción"><?php echo $row['descripcion_abdomen'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="columna">
                    5. Columna
                    <input class="form-check-input" <?php if($row['columna'] == 'SI') echo 'checked';?> type="checkbox" name="ccolumna" value="SI" id="columna">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dcolumna" rows="2" placeholder="Descripción"><?php echo $row['descripcion_columna'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="pelvis">
                    6. Pelvis
                    <input class="form-check-input" <?php if($row['pelvis'] == 'SI') echo 'checked';?> type="checkbox" name="cpelvis" value="SI" id="pelvis">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dpelvis" rows="2" placeholder="Descripción"><?php echo $row['descripcion_pelvis'];?></textarea>
                </div>


                <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
                    <label class="pointer-cursor form-check-label" for="extremidades">
                    7. Extremidades
                    <input class="form-check-input" <?php if($row['extremidades'] == 'SI') echo 'checked';?> type="checkbox" name="cextremidades" value="SI" id="extremidades">
                    </label>
                </div>

                <div class="mb-3 col-12 col-md-8 col-lg-10">
                    <textarea class="form-control" name="dextremidades" rows="2" placeholder="Descripción"><?php echo $row['descripcion_extremidades'];?></textarea>
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
                    <textarea class="form-control" id="presuntivo" name="presuntivo" rows="3" placeholder="Descripción"><?php echo $row['presuntivo'];?></textarea>
                </div>
            </div>

            <div class="col-12">
                <label for="definitivo" class="pb-2 h5">
                Definitivo:
                </label>
                <div class="mb-3 col-12">
                    <textarea class="form-control" id="definitivo" name="definitivo" rows="3" placeholder="Descripción"><?php echo $row['definitivo'];?></textarea>
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
                            <textarea class="form-control" id="indicacion_1" name="indicacion_1" rows="5" placeholder="Descripción"><?php echo $row['indicacion_1'];?></textarea>
                            <textarea class="form-control" id="indicacion_2" name="indicacion_2" rows="5" placeholder="Descripción"><?php echo $row['indicacion_2'];?></textarea>
                            <textarea class="form-control" id="indicacion_3" name="indicacion_3" rows="5" placeholder="Descripción"><?php echo $row['indicacion_3'];?></textarea>
                            <textarea class="form-control" id="indicacion_4" name="indicacion_4" rows="5" placeholder="Descripción"><?php echo $row['indicacion_4'];?></textarea>
                        </div>
                    </div>
            
                    <div class="col-12 col-md-4">
                        <label for="medicamentos" class="pb-2 h5">
                            Medicamentos
                        </label>
                        <div class="mb-3" style="width: 100%;">
                            <textarea class="form-control" id="medicamento_1" name="medicamento_1" rows="5" placeholder="Descripción"><?php echo $row['medicamento_1'];?></textarea>
                            <textarea class="form-control" id="medicamento_2" name="medicamento_2" rows="5" placeholder="Descripción"><?php echo $row['medicamento_2'];?></textarea>
                            <textarea class="form-control" id="medicamento_3" name="medicamento_3" rows="5" placeholder="Descripción"><?php echo $row['medicamento_3'];?></textarea>
                            <textarea class="form-control" id="medicamento_4" name="medicamento_4" rows="5" placeholder="Descripción"><?php echo $row['medicamento_4'];?></textarea>
                        </div>
                    </div>
            
                    <div class="col-12 col-md-4">
                        <label for="posologia" class="pb-2 h5">
                            Posología
                        </label>
                        <div class="mb-3" style="width: 100%;">
                            <textarea class="form-control" id="posologia_1" name="posologia_1" rows="5" placeholder="Descripción"><?php echo $row['posologia_1'];?></textarea>
                            <textarea class="form-control" id="posologia_2" name="posologia_2" rows="5" placeholder="Descripción"><?php echo $row['posologia_2'];?></textarea>
                            <textarea class="form-control" id="posologia_3" name="posologia_3" rows="5" placeholder="Descripción"><?php echo $row['posologia_3'];?></textarea>
                            <textarea class="form-control" id="posologia_4" name="posologia_4" rows="5" placeholder="Descripción"><?php echo $row['posologia_4'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <input type="hidden" name="id_datos_afiliado" value="<?php echo $id_datos_afiliado; ?>">


            <div class="enviar">
                <button class="btn btn-primary">Actualizar datos</button>
            </div>
            </form>

        </section>
        <!--SECTION FORMULARIO/-->
    </main>

    <!--FOOTER-->
    <footer class="text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; 2024 INSTITUTO SUPERIOR TECNOLÓGICO JUAN BAUTISTA AGUIRRE.
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    Soporte: <a href="mailto:kbarzolav.istjba@gmail.com" class="text-white text-decoration-none">kbarzolav.istjba@gmail.com</a>
                </div>
            </div>
        </div>
        </footer>
    <!--FOOTER/-->
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
