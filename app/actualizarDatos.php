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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // id del usuario que realizo el ingreso de datos
        $id_usuario = mysqli_real_escape_string($conn, $_POST['id_usuario']);
        $id_datos_afiliacion = mysqli_real_escape_string($conn, $_POST['id_datos_afiliado']);

        // Sanitizar las entradas del formulario
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : '';
        $nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($conn, $_POST['nombres']) : '';
        $cedula = isset($_POST['cedula']) ? mysqli_real_escape_string($conn, $_POST['cedula']) : '';
        $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, $_POST['direccion']) : '';
        $barrio = isset($_POST['barrio']) ? mysqli_real_escape_string($conn, $_POST['barrio']) : '';
        $canton = isset($_POST['canton']) ? mysqli_real_escape_string($conn, $_POST['canton']) : '';
        $provincia = isset($_POST['provincia']) ? mysqli_real_escape_string($conn, $_POST['provincia']) : '';
        $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : '';
        $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']) : '';
        $ocupacion = isset($_POST['ocupacion']) ? mysqli_real_escape_string($conn, $_POST['ocupacion']) : '';
        $sexo = isset($_POST['sexo']) ? mysqli_real_escape_string($conn, $_POST['sexo']) : '';
        $estado_civil = isset($_POST['estado_civil']) ? mysqli_real_escape_string($conn, $_POST['estado_civil']) : '';
        $hijos = isset($_POST['hijos']) ? mysqli_real_escape_string($conn, $_POST['hijos']) : '';
        $nombre_contacto = isset($_POST['nombre_contacto']) ? mysqli_real_escape_string($conn, $_POST['nombre_contacto']) : '';
        $carrera = isset($_POST['carrera']) ? mysqli_real_escape_string($conn, $_POST['carrera']) : '';
        $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($conn, $_POST['fecha']) : '';
        $estudios_realizados = isset($_POST['estudios_realizados']) ? mysqli_real_escape_string($conn, $_POST['estudios_realizados']) : '';
        $atencion_medica = isset($_POST['atencion_medica']) ? mysqli_real_escape_string($conn, $_POST['atencion_medica']) : '';
        $profesion = isset($_POST['profesion']) ? mysqli_real_escape_string($conn, $_POST['profesion']) : '';

        // Antecedentes Patologicos Personales
        $checkAlergico = isset($_POST['calergico']) ? mysqli_real_escape_string($conn, $_POST['calergico']) : '';
        $descripcionAlergia = isset($_POST['dalergia']) ? mysqli_real_escape_string($conn, $_POST['dalergia']) : '';
        $checkClinica = isset($_POST['cclinica']) ? mysqli_real_escape_string($conn, $_POST['cclinica']) : '';
        $descripcionClinica = isset($_POST['dclinica']) ? mysqli_real_escape_string($conn, $_POST['dclinica']) : '';
        $checkGinecologia = isset($_POST['cginecologia']) ? mysqli_real_escape_string($conn, $_POST['cginecologia']) : '';
        $descripcionGinecologia = isset($_POST['dginecologia']) ? mysqli_real_escape_string($conn, $_POST['dginecologia']) : '';
        $checkTraumatologia = isset($_POST['ctraumatologia']) ? mysqli_real_escape_string($conn, $_POST['ctraumatologia']) : '';
        $descripcionTraumatologia = isset($_POST['dtraumatologia']) ? mysqli_real_escape_string($conn, $_POST['dtraumatologia']) : '';
        $checkQuirurgico = isset($_POST['cquirurgico']) ? mysqli_real_escape_string($conn, $_POST['cquirurgico']) : '';
        $descripcionQuirurgico = isset($_POST['dquirurgico']) ? mysqli_real_escape_string($conn, $_POST['dquirurgico']) : '';
        $checkFarmacologico = isset($_POST['cfarmacologico']) ? mysqli_real_escape_string($conn, $_POST['cfarmacologico']) : '';
        $descripcionFarmacologico = isset($_POST['dfarmacologico']) ? mysqli_real_escape_string($conn, $_POST['dfarmacologico']) : '';
        $checkPsiquiatrico = isset($_POST['cpsiquiatrico']) ? mysqli_real_escape_string($conn, $_POST['cpsiquiatrico']) : '';
        $descripcionPsiquiatrico = isset($_POST['dpsiquiatrico']) ? mysqli_real_escape_string($conn, $_POST['dpsiquiatrico']) : '';
        $checkOtro = isset($_POST['cotro']) ? mysqli_real_escape_string($conn, $_POST['cotro']) : '';
        $descripcionOtro = isset($_POST['dotro']) ? mysqli_real_escape_string($conn, $_POST['dotro']) : '';
        $antecedentesDiscapacidad = isset($_POST['antecedentesDiscapacidad']) ? mysqli_real_escape_string($conn, $_POST['antecedentesDiscapacidad']) : '';

        $descripcion_discapacidad_fisica = isset($_POST['descripcion_discapacidad_fisica']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_fisica']) : '';
        $descripcion_discapacidad_intelectual = isset($_POST['descripcion_discapacidad_intelectual']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_intelectual']) : '';
        $descripcion_discapacidad_mental = isset($_POST['descripcion_discapacidad_mental']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_mental']) : '';
        $descripcion_discapacidad_psicosocial = isset($_POST['descripcion_discapacidad_psicosocial']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_psicosocial']) : '';
        $descripcion_discapacidad_sensorial = isset($_POST['descripcion_discapacidad_sensorial']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_sensorial']) : '';
        $descripcion_discapacidad_auditiva = isset($_POST['descripcion_discapacidad_auditiva']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_auditiva']) : '';
        $descripcion_discapacidad_visual = isset($_POST['descripcion_discapacidad_visual']) ? mysqli_real_escape_string($conn, $_POST['descripcion_discapacidad_visual']) : '';
        $carnetConadis = isset($_POST['carnetConadis']) ? mysqli_real_escape_string($conn, $_POST['carnetConadis']) : '';
        $porcentaje_discapacidad = isset($_POST['porcentaje_discapacidad']) ? mysqli_real_escape_string($conn, $_POST['porcentaje_discapacidad']) : '';

        // Antecedentes Obstetricos
        $checkMenarquea = isset($_POST['cmenarquea']) ? mysqli_real_escape_string($conn, $_POST['cmenarquea']) : '';
        $checkGesta = isset($_POST['cgesta']) ? mysqli_real_escape_string($conn, $_POST['cgesta']) : '';
        $checkCesarea = isset($_POST['ccesarea']) ? mysqli_real_escape_string($conn, $_POST['ccesarea']) : '';
        $checkAborto = isset($_POST['caborto']) ? mysqli_real_escape_string($conn, $_POST['caborto']) : '';
        $selectAlcohol = isset($_POST['gradosAlcohol']) ? mysqli_real_escape_string($conn, $_POST['gradosAlcohol']) : '';
        $checkDroga = isset($_POST['cdroga']) ? mysqli_real_escape_string($conn, $_POST['cdroga']) : '';
        $checkCigarrillo = isset($_POST['ccigarrillo']) ? mysqli_real_escape_string($conn, $_POST['ccigarrillo']) : '';
        $checkHabitosOtro = isset($_POST['chabitosOtros']) ? mysqli_real_escape_string($conn, $_POST['chabitosOtros']) : '';

        // Antecedentes Patologicos Familiares
        $antecedentesPatologicosFamiliares = isset($_POST['antecedentesPatologicosFamiliares']) ? mysqli_real_escape_string($conn, $_POST['antecedentesPatologicosFamiliares']) : '';

        // Enfermedad Actual
        $checkViaLibre = isset($_POST['cviaLibre']) ? mysqli_real_escape_string($conn, $_POST['cviaLibre']) : '';
        $descripcionViaLibre = isset($_POST['dviaLibre']) ? mysqli_real_escape_string($conn, $_POST['dviaLibre']) : '';
        $checkViaObstruida = isset($_POST['cviaObstruida']) ? mysqli_real_escape_string($conn, $_POST['cviaObstruida']) : '';
        $descripcionViaObstruida = isset($_POST['dviaObstruida']) ? mysqli_real_escape_string($conn, $_POST['dviaObstruida']) : '';
        $checkCondicionEstable = isset($_POST['ccondicionEstable']) ? mysqli_real_escape_string($conn, $_POST['ccondicionEstable']) : '';
        $descripcionCondicionEstable = isset($_POST['dcondicionEstable']) ? mysqli_real_escape_string($conn, $_POST['dcondicionEstable']) : '';
        $checkCondicionInestable = isset($_POST['ccondicionInestable']) ? mysqli_real_escape_string($conn, $_POST['ccondicionInestable']) : '';
        $descripcionCondicionInestable = isset($_POST['dcondicionInestable']) ? mysqli_real_escape_string($conn, $_POST['dcondicionInestable']) : '';

        // Signos Vitales
        $presionArterial = isset($_POST['presionArterial']) ? mysqli_real_escape_string($conn, $_POST['presionArterial']) : '';
        $frecuenciaCardiaca = isset($_POST['frecuenciaCardiaca']) ? mysqli_real_escape_string($conn, $_POST['frecuenciaCardiaca']) : '';
        $frecuenciaRespiratoria = isset($_POST['frecuenciaRespiratoria']) ? mysqli_real_escape_string($conn, $_POST['frecuenciaRespiratoria']) : '';
        $temperatura = isset($_POST['temperatura']) ? mysqli_real_escape_string($conn, $_POST['temperatura']) : '';
        $peso = isset($_POST['peso']) ? mysqli_real_escape_string($conn, $_POST['peso']) : '';
        $talla = isset($_POST['talla']) ? mysqli_real_escape_string($conn, $_POST['talla']) : '';
        $observacion = isset($_POST['observacion']) ? mysqli_real_escape_string($conn, $_POST['observacion']) : '';

        // Examen Físico General
        $examenFisicoGeneral = isset($_POST['examenFisicoGeneral']) ? mysqli_real_escape_string($conn, $_POST['examenFisicoGeneral']) : '';

        // Examen Físico Regional
        $checkCabeza = isset($_POST['ccabeza']) ? mysqli_real_escape_string($conn, $_POST['ccabeza']) : '';
        $descripcionCabeza = isset($_POST['dcabeza']) ? mysqli_real_escape_string($conn, $_POST['dcabeza']) : '';
        $checkCuello = isset($_POST['ccuello']) ? mysqli_real_escape_string($conn, $_POST['ccuello']) : '';
        $descripcionCuello = isset($_POST['dcuello']) ? mysqli_real_escape_string($conn, $_POST['dcuello']) : '';
        $checkTorax = isset($_POST['ctorax']) ? mysqli_real_escape_string($conn, $_POST['ctorax']) : '';
        $descripcionTorax = isset($_POST['dtorax']) ? mysqli_real_escape_string($conn, $_POST['dtorax']) : '';
        $checkAbdomen = isset($_POST['cabdomen']) ? mysqli_real_escape_string($conn, $_POST['cabdomen']) : '';
        $descripcionAbdomen = isset($_POST['dabdomen']) ? mysqli_real_escape_string($conn, $_POST['dabdomen']) : '';
        $checkColumna = isset($_POST['ccolumna']) ? mysqli_real_escape_string($conn, $_POST['ccolumna']) : '';
        $descripcionColumna = isset($_POST['dcolumna']) ? mysqli_real_escape_string($conn, $_POST['dcolumna']) : '';
        $checkPelvis = isset($_POST['cpelvis']) ? mysqli_real_escape_string($conn, $_POST['cpelvis']) : '';
        $descripcionPelvis = isset($_POST['dpelvis']) ? mysqli_real_escape_string($conn, $_POST['dpelvis']) : '';
        $checkExtremidades = isset($_POST['cextremidades']) ? mysqli_real_escape_string($conn, $_POST['cextremidades']) : '';
        $descripcionExtremidades = isset($_POST['dextremidades']) ? mysqli_real_escape_string($conn, $_POST['dextremidades']) : '';

        // Diagnóstico
        $presuntivo = isset($_POST['presuntivo']) ? mysqli_real_escape_string($conn, $_POST['presuntivo']) : '';
        $definitivo = isset($_POST['definitivo']) ? mysqli_real_escape_string($conn, $_POST['definitivo']) : '';

        // Tratamiento
        $indicacion_1 = isset($_POST['indicacion_1']) ? mysqli_real_escape_string($conn, $_POST['indicacion_1']) : '';
        $medicamento_1 = isset($_POST['medicamento_1']) ? mysqli_real_escape_string($conn, $_POST['medicamento_1']) : '';
        $posologia_1 = isset($_POST['posologia_1']) ? mysqli_real_escape_string($conn, $_POST['posologia_1']) : '';
        $indicacion_2 = isset($_POST['indicacion_2']) ? mysqli_real_escape_string($conn, $_POST['indicacion_2']) : '';
        $medicamento_2 = isset($_POST['medicamento_2']) ? mysqli_real_escape_string($conn, $_POST['medicamento_2']) : '';
        $posologia_2 = isset($_POST['posologia_2']) ? mysqli_real_escape_string($conn, $_POST['posologia_2']) : '';
        $indicacion_3 = isset($_POST['indicacion_3']) ? mysqli_real_escape_string($conn, $_POST['indicacion_3']) : '';
        $medicamento_3 = isset($_POST['medicamento_3']) ? mysqli_real_escape_string($conn, $_POST['medicamento_3']) : '';
        $posologia_3 = isset($_POST['posologia_3']) ? mysqli_real_escape_string($conn, $_POST['posologia_3']) : '';
        $indicacion_4 = isset($_POST['indicacion_4']) ? mysqli_real_escape_string($conn, $_POST['indicacion_4']) : '';
        $medicamento_4 = isset($_POST['medicamento_4']) ? mysqli_real_escape_string($conn, $_POST['medicamento_4']) : '';
        $posologia_4 = isset($_POST['posologia_4']) ? mysqli_real_escape_string($conn, $_POST['posologia_4']) : '';


        $sql_datos_afiliado = "UPDATE datos_afiliado 
        SET apellidos = '$apellidos', 
            nombres = '$nombres', 
            cedula = '$cedula', 
            direccion = '$direccion', 
            barrio = '$barrio', 
            canton = '$canton', 
            provincia = '$provincia', 
            telefono = '$telefono', 
            fecha_nacimiento = '$fecha_nacimiento', 
            ocupacion = '$ocupacion', 
            sexo = '$sexo', 
            estado_civil = '$estado_civil', 
            hijos = '$hijos', 
            nombre_contacto = '$nombre_contacto', 
            carrera = '$carrera', 
            fecha = '$fecha', 
            estudios_realizados = '$estudios_realizados', 
            atencion_medica = '$atencion_medica', 
            profesion = '$profesion'
        WHERE id_datos_afiliado = $id_datos_afiliacion";
        $conn->query($sql_datos_afiliado);

        $antecedentes_patologicos = "UPDATE antecedentes_patologicos 
                    SET alergico = '$checkAlergico', 
                        descripcion_alergia = '$descripcionAlergia', 
                        clinica = '$checkClinica', 
                        descripcion_clinica = '$descripcionClinica', 
                        ginecologia = '$checkGinecologia', 
                        descripcion_ginecologia = '$descripcionGinecologia', 
                        traumatologia = '$checkTraumatologia', 
                        descripcion_traumatologia = '$descripcionTraumatologia', 
                        quirurgico = '$checkQuirurgico', 
                        descripcion_quirurgico = '$descripcionQuirurgico', 
                        farmacologico = '$checkFarmacologico', 
                        descripcion_farmacologico = '$descripcionFarmacologico', 
                        psiquiatrico = '$checkPsiquiatrico', 
                        descripcion_psiquiatrico = '$descripcionPsiquiatrico', 
                        otro = '$checkOtro', 
                        descripcion_otro = '$descripcionOtro', 
                        antecedentes_discapacidad = '$antecedentesDiscapacidad', 
                        descripcion_discapacidad_fisica = '$descripcion_discapacidad_fisica', 
                        descripcion_discapacidad_intelectual = '$descripcion_discapacidad_intelectual', 
                        descripcion_discapacidad_mental = '$descripcion_discapacidad_mental', 
                        descripcion_discapacidad_psicosocial = '$descripcion_discapacidad_psicosocial', 
                        descripcion_discapacidad_sensorial = '$descripcion_discapacidad_sensorial', 
                        descripcion_discapacidad_auditiva = '$descripcion_discapacidad_auditiva', 
                        descripcion_discapacidad_visual = '$descripcion_discapacidad_visual', 
                        carnet_conadis = '$carnetConadis', 
                        porcentaje_discapacidad = '$porcentaje_discapacidad'
                    WHERE id_datos_afiliado = $id_datos_afiliacion";    
        $conn->query($antecedentes_patologicos);

        $antecedentes_obstetricos = "UPDATE antecedentes_obstetricos 
                    SET menarquea = '$checkMenarquea', 
                        gesta = '$checkGesta', 
                        cesarea = '$checkCesarea', 
                        aborto = '$checkAborto', 
                        alcohol = '$selectAlcohol', 
                        droga = '$checkDroga', 
                        cigarrillo = '$checkCigarrillo', 
                        otro_obstetricos = '$checkHabitosOtro'
                    WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($antecedentes_obstetricos);

        $antecedentes_patologicos_familiares = "UPDATE antecedentes_patologicos_familiares 
                                SET descripcion_antecedentes_patologicos_familiares = '$antecedentesPatologicosFamiliares'
                                WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($antecedentes_patologicos_familiares);

        $enfermedad_actual = "UPDATE enfermedad_actual 
            SET via_aerea_libre = '$checkViaLibre', 
                descripcion_via_aerea_libre = '$descripcionViaLibre', 
                via_aerea_obstruida = '$checkViaObstruida', 
                descripcion_via_aerea_obstruida = '$descripcionViaObstruida', 
                condicion_estable = '$checkCondicionEstable', 
                descripcion_condicion_estable = '$descripcionCondicionEstable', 
                condicion_inestable = '$checkCondicionInestable', 
                descripcion_condicion_inestable = '$descripcionCondicionInestable'
            WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($enfermedad_actual);

        $signos_vitales = "UPDATE signos_vitales 
            SET presion_arterial = '$presionArterial', 
                frecuencia_cardiaca = '$frecuenciaCardiaca', 
                frecuencia_respiratoria = '$frecuenciaRespiratoria', 
                temperatura = '$temperatura', 
                peso = '$peso', 
                talla = '$talla', 
                observacion = '$observacion'
            WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($signos_vitales);

        $examen_fisico_general = "UPDATE examen_fisico_general 
                    SET descripcion_examen_fisico_general = '$examenFisicoGeneral'
                    WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($examen_fisico_general);

        $examen_fisico_regional = "UPDATE examen_fisico_regional 
                    SET cabeza = '$checkCabeza', 
                        descripcion_cabeza = '$descripcionCabeza', 
                        cuello = '$checkCuello', 
                        descripcion_cuello = '$descripcionCuello', 
                        torax = '$checkTorax', 
                        descripcion_torax = '$descripcionTorax', 
                        abdomen = '$checkAbdomen', 
                        descripcion_abdomen = '$descripcionAbdomen', 
                        columna = '$checkColumna', 
                        descripcion_columna = '$descripcionColumna', 
                        pelvis = '$checkPelvis', 
                        descripcion_pelvis = '$descripcionPelvis', 
                        extremidades = '$checkExtremidades', 
                        descripcion_extremidades = '$descripcionExtremidades'
                    WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($examen_fisico_regional);

        $diagnostico = "UPDATE diagnostico 
        SET presuntivo = '$presuntivo', 
            definitivo = '$definitivo'
        WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($diagnostico);

        $tratamiento = "UPDATE tratamiento 
        SET indicacion_1 = '$indicacion_1', 
            medicamento_1 = '$medicamento_1', 
            posologia_1 = '$posologia_1',
            indicacion_2 = '$indicacion_2', 
            medicamento_2 = '$medicamento_2', 
            posologia_2 = '$posologia_2',
            indicacion_3 = '$indicacion_3', 
            medicamento_3 = '$medicamento_3', 
            posologia_3 = '$posologia_3',
            indicacion_4 = '$indicacion_4', 
            medicamento_4 = '$medicamento_4', 
            posologia_4 = '$posologia_4'
        WHERE id_datos_afiliado = '$id_datos_afiliacion'";
        $conn->query($tratamiento);


       if ($conn->query($sql_datos_afiliado) === TRUE &&
            $conn->query($antecedentes_patologicos) === TRUE &&
            $conn->query($antecedentes_obstetricos) === TRUE &&
            $conn->query($antecedentes_patologicos_familiares) === TRUE &&
            $conn->query($enfermedad_actual) === TRUE &&
            $conn->query($signos_vitales) === TRUE &&
            $conn->query($examen_fisico_general) === TRUE &&
            $conn->query($examen_fisico_regional) === TRUE &&
            $conn->query($diagnostico) === TRUE &&
            $conn->query($tratamiento) === TRUE) {

            header("Location: inicio.php#pacientes");
         } else {
            // Al menos una consulta falló
            echo "Error al actualizar los datos: " . $conn->error;
         }

}
?>