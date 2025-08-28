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
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../images/heart-beats.png" type="image/png">
  </head>
  <body class="sidebar-enabled">
    <main>
      <?php include 'components/sidebar.php'; ?>
      
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
                  <img src="../images/img.jpg" class="inicioimg img-fluid rounded-start" alt="Imagen de medicos">
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

      <!--SECTION FORMULARIO-->
      <section class="formulario" id="form">
        <form action="procesarFormulario.php" method="post" class="formtop">
          <h2 class="display-4 fw-bold pb-2">HISTORIA CLINICA</h2>
          <!-- TABLA 3 -->
          <h3 class="fw-bold">1. Datos Afiliación</h3>

          <div class="row">
            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Alvarado Villafuerte" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="nombres" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Carlos Luis" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="cedula" class="form-label">Número de Cedula</label>
              <input type="number" class="form-control" id="cedula" name="cedula" placeholder="0999999999" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Av. Alvorada" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="barrio" class="form-label">Barrio</label>
              <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Marianita" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="canton" class="form-label">Cantón</label>
              <input type="text" class="form-control" id="canton" name="canton" placeholder="Daule" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="provincia" class="form-label">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Guayas" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="telefono" class="form-label">Telefóno</label>
              <input type="number" class="form-control" name="telefono" id="telefono" placeholder="0999999999" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
              <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="ocupacion" class="form-label">Ocupación</label>
              <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="ej. Chef" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-2">
              <label class="form-label">Sexo</label>
              <select class="form-select" name="sexo" aria-label="Default select example" required>
                <option selected value="" disabled>Seleccione el género</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-2">
              <label class="form-label">Estado Civil</label>
              <select class="form-select" name="estado_civil" aria-label="Default select example" required>
                <option selected value="" disabled>Estado civil</option>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Divorciado/a">Divorciado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-2">
            <label for="hijos" class="form-label">Hijos</label>
              <input type="number" class="form-control" id="hijos" name="hijos" placeholder="ej. 1" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="nombre_contacto" class="form-label">Nombre de Contacto</label>
              <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" placeholder="ej. Juan">
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="carrera" class="form-label">Carrera a la que pertenece</label>
              <input type="text" class="form-control" id="carrera" name="carrera" placeholder="ej. Medico">
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="fecha" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="estudios_realizados" class="form-label">Estudios Realizados</label>
              <input type="text" class="form-control" id="estudios_realizados" name="estudios_realizados" placeholder="ej. Universidad de Gayaquil" required>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3"> 
              <label class="form-label">Actualmente recibe atencion medica en:</label>
              <select class="form-select" name="atencion_medica"  value="Ninguno" aria-label="Default select example" required>
                <option selected value="" disabled>Seleccione una entidad</option>
                <option value="IESS">IESS</option>
                <option value="MINISTERIO DE SALUD PUBLICA">MSP</option>
                <option value="PARTICULAR">Particular</option>
                <option value="OTRO">Otro</option>
              </select>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-3">
            <label for="profesion" class="form-label">Profesión</label>
              <input type="text" class="form-control" id="profesion" name="profesion" placeholder="ej. Maestro" required>
            </div>
          </div>

          <hr>
          <br>

          <!-- TABLA 4-->
          <h3 class="fw-bold pb-2">2. Antecedentes Patologicos Personales</h3>
          <div class="row">
            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label text-center" for="alergia">
                1. Alérgico
                <input class="form-check-input" type="checkbox" value="SI" name="calergico" id="alergia">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dalergia" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="clinica">
                2. Clínica
                <input class="form-check-input" type="checkbox" value="SI" name="cclinica" id="clinica">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dclinica" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="ginecologia">
                3. Ginecología
                <input class="form-check-input" type="checkbox" name="cginecologia" value="SI" id="ginecologia">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dginecologia" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="traumatologia">
                4. Traumatología
                <input class="form-check-input" type="checkbox" name="ctraumatologia" value="SI" id="traumatologia">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dtraumatologia" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="quirurgico">
                5. Quirúrgico
                <input class="form-check-input" name="cquirurgico" type="checkbox" value="SI" id="quirurgico">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dquirurgico" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="farmacologico">
                6. Farmacológico
                <input class="form-check-input" type="checkbox" name="cfarmacologico" value="SI" id="farmacologico">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dfarmacologico" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="psiquiatrico">
                7. Psiquiátrico
                <input class="form-check-input" type="checkbox" name="cpsiquiatrico" value="SI" id="psiquiatrico">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dpsiquiatrico" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="otro">
                8. Otro
                <input class="form-check-input" type="checkbox" name="cotro" value="SI" id="otro">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dotro" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="mb-3 col-12 col-md-6 col-lg-4 pt-2">
              <label class="form-label"><strong>Antencedentes de Discapacidad</strong></label>
              <select id="antecedentesDiscapacidad" class="form-select" name="antecedentesDiscapacidad" aria-label="Default select example" required>
                <option selected value="" disabled>Seleccionar estado</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
              </select>
            </div>
          </div>

          <div id="discapacidadFields" style="display: none;">
            <h3 class="fw-bold pb-2">Describa El Tipo De Discapacidad:</h3>

            <div class="form-group row mb-3 ">
              <label for="dc1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Física:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="dc1" name="descripcion_discapacidad_fisica" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="di1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Intelectual:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="di1" name="descripcion_discapacidad_intelectual" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="dm1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Mental:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="dm1" name="descripcion_discapacidad_mental" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="dp1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Psicosocial:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="dp1" name="descripcion_discapacidad_psicosocial" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="ds1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Sensorial:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="ds1" name="descripcion_discapacidad_sensorial" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="da1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Auditiva:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="da1" name="descripcion_discapacidad_auditiva" rows="2" placeholder="Descripción"></textarea>
              </div>
            </div>

            <div class="form-group row mb-3 ">
              <label for="dv1" class="pointer-cursor col-form-label col-12 col-md-4 col-lg-2">Discapacidad Visual:</label>
              <div class="col-12 col-md-8 col-lg-10">
                <textarea class="form-control" id="dv1" name="descripcion_discapacidad_visual" rows="2" placeholder="Descripción"></textarea>
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
              <input type="number" class="form-control" id="porcentaje_discapacidad" name="porcentaje_discapacidad" placeholder="ej. 50" value="0" >
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
              <textarea class="form-control" name="antecedentesPatologicosFamiliares" rows="4" placeholder="Descripción"></textarea>
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
              <textarea class="form-control" name="dviaLibre" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="viaObstruida">
                Vía aérea obstruida
                <input class="form-check-input" type="checkbox" name="cviaObstruida" value="SI" id="viaObstruida">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dviaObstruida" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="condicionEstable">
                Condición estable
                <input class="form-check-input" type="checkbox" name="ccondicionEstable" value="SI" id="condicionEstable">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dcondicionEstable" rows="2" placeholder="Descripción"></textarea>
            </div>

            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label text-center" for="condicionInestable">
              Condición inestable
                <input class="form-check-input" type="checkbox" value="SI" name="ccondicionInestable" id="condicionInestable">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dcondicionInestable" rows="2" placeholder="Descripción"></textarea>
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
            <textarea class="form-control" name="examenFisicoGeneral" rows="4" placeholder="Descripción"></textarea>
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
              <textarea class="form-control" name="dcabeza" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="cuello">
                2. Cuello
                <input class="form-check-input" type="checkbox" name="ccuello" value="SI" id="cuello">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dcuello" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="torax">
                3. Tórax
                <input class="form-check-input" type="checkbox" name="ctorax" value="SI" id="torax">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dtorax" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="abdomen">
                4. Abdomen
                <input class="form-check-input" type="checkbox" name="cabdomen" value="SI" id="abdomen">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dabdomen" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="columna">
                5. Columna
                <input class="form-check-input" type="checkbox" name="ccolumna" value="SI" id="columna">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dcolumna" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="pelvis">
                6. Pelvis
                <input class="form-check-input" type="checkbox" name="cpelvis" value="SI" id="pelvis">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dpelvis" rows="2" placeholder="Descripción"></textarea>
            </div>


            <div class="form-check col-12 col-md-4 col-lg-2 d-flex align-items-center ">
              <label class="pointer-cursor form-check-label" for="extremidades">
                7. Extremidades
                <input class="form-check-input" type="checkbox" name="cextremidades" value="SI" id="extremidades">
              </label>
            </div>

            <div class="mb-3 col-12 col-md-8 col-lg-10">
              <textarea class="form-control" name="dextremidades" rows="2" placeholder="Descripción"></textarea>
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
              <textarea class="form-control" id="presuntivo" name="presuntivo" rows="3" placeholder="Descripción" required></textarea>
            </div>
          </div>

          <div class="col-12">
            <label for="definitivo" class="pb-2 h5">
              Definitivo:
            </label>
            <div class="mb-3 col-12">
              <textarea class="form-control" id="definitivo" name="definitivo" rows="3" placeholder="Descripción" required></textarea>
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
                  <textarea class="form-control" id="indicacion_1" name="indicacion_1" rows="5" placeholder="Descripción" required></textarea>
                  <textarea class="form-control" id="indicacion_2" name="indicacion_2" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="indicacion_3" name="indicacion_3" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="indicacion_4" name="indicacion_4" rows="5" placeholder="Descripción"></textarea>
                </div>
              </div>
      
              <div class="col-12 col-md-4">
                <label for="medicamentos" class="pb-2 h5">
                  Medicamentos
                </label>
                <div class="mb-3" style="width: 100%;">
                  <textarea class="form-control" id="medicamento_1" name="medicamento_1" rows="5" placeholder="Descripción" required></textarea>
                  <textarea class="form-control" id="medicamento_2" name="medicamento_2" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="medicamento_3" name="medicamento_3" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="medicamento_4" name="medicamento_4" rows="5" placeholder="Descripción"></textarea>
                </div>
              </div>
      
              <div class="col-12 col-md-4">
                <label for="posologia" class="pb-2 h5">
                  Posología
                </label>
                <div class="mb-3" style="width: 100%;">
                  <textarea class="form-control" id="posologia_1" name="posologia_1" rows="5" placeholder="Descripción" required></textarea>
                  <textarea class="form-control" id="posologia_2" name="posologia_2" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="posologia_3" name="posologia_3" rows="5" placeholder="Descripción"></textarea>
                  <textarea class="form-control" id="posologia_4" name="posologia_4" rows="5" placeholder="Descripción"></textarea>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

          <div class="enviar">
            <button class="btn btn-primary">Enviar datos</button>
          </div>
        </form>

      </section>
      <!--SECTION FORMULARIO/-->

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
                            echo "<td class='text-center'><a href='generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger'><i class='bx bxs-file-pdf'></i></a></td>";
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
          eliminarPacienteModal.addEventListener('show.bs.modal', function (event) {
              var button = event.relatedTarget;
              var pacienteId = button.getAttribute('data-id');
              var eliminarPacienteButton = document.getElementById('eliminarPacienteButton');
              eliminarPacienteButton.setAttribute('href', 'eliminarPaciente.php?id=' + pacienteId);
          });
      </script>
      <!--/SECTION PACIENTES-->

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
        <a href="generar_listado.php" target="_blank" class="btn btn-outline-success w-100">Personas Discapacitadas</a>
    </div>

    <!-- Botón para generar listado de enfermedades -->
    <div class="col-5 col-md-2">
        <a href="generar_Enfermedades.php" target="_blank" class="btn btn-outline-success w-100">Enfermedad</a>
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
                    echo "<td class='text-center'><a href='generar_informe.php?id=" . $row["id_datos_afiliado"] . "' target='_blank' class='text-danger'><i class='bx bxs-file-pdf'></i></a></td>";
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
