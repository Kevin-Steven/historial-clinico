<?php
require "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // id del usuario que realizo el ingreso de datos
    $id_usuario = mysqli_real_escape_string($conn, $_POST['id_usuario']);

    // Verificar si el arreglo $_POST está definido y no está vacío
    if (isset($_POST) && !empty($_POST)) {
        // Recuperar los datos del formulario
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

    
    // Iniciar una transacción  
    $conn->begin_transaction();
    
    try {        
        // Insertar datos en la tabla "datos_afiliacion"
        $sql_datos_afiliado = "INSERT INTO datos_afiliado (id_usuario, apellidos, nombres, cedula, direccion, barrio, canton, provincia, telefono, fecha_nacimiento, ocupacion, sexo, estado_civil, hijos, nombre_contacto, carrera, fecha, estudios_realizados, atencion_medica, profesion)
                                VALUES ('$id_usuario', '$apellidos', '$nombres', '$cedula', '$direccion', '$barrio', '$canton', '$provincia', '$telefono', '$fecha_nacimiento', '$ocupacion', '$sexo', '$estado_civil', '$hijos', '$nombre_contacto', '$carrera', '$fecha', '$estudios_realizados', '$atencion_medica', '$profesion')";
        $conn->query($sql_datos_afiliado);

        $id_datos_afiliacion = $conn->insert_id;

        $antecedentes_patologicos = "INSERT INTO antecedentes_patologicos (id_datos_afiliado, alergico, descripcion_alergia, clinica, descripcion_clinica, ginecologia, descripcion_ginecologia, traumatologia, descripcion_traumatologia, quirurgico, descripcion_quirurgico, farmacologico, descripcion_farmacologico, psiquiatrico, descripcion_psiquiatrico, otro, descripcion_otro, antecedentes_discapacidad, descripcion_discapacidad_fisica, descripcion_discapacidad_intelectual, descripcion_discapacidad_mental, descripcion_discapacidad_psicosocial, descripcion_discapacidad_sensorial, descripcion_discapacidad_auditiva, descripcion_discapacidad_visual, carnet_conadis, porcentaje_discapacidad)
                                    VALUES ('$id_datos_afiliacion', '$checkAlergico', '$descripcionAlergia', '$checkClinica', '$descripcionClinica', '$checkGinecologia', '$descripcionGinecologia', '$checkTraumatologia', '$descripcionTraumatologia', '$checkQuirurgico', '$descripcionQuirurgico', '$checkFarmacologico', '$descripcionFarmacologico', '$checkPsiquiatrico', '$descripcionPsiquiatrico', '$checkOtro', '$descripcionOtro', '$antecedentesDiscapacidad', '$descripcion_discapacidad_fisica', '$descripcion_discapacidad_intelectual', '$descripcion_discapacidad_mental', '$descripcion_discapacidad_psicosocial', '$descripcion_discapacidad_sensorial', '$descripcion_discapacidad_auditiva', '$descripcion_discapacidad_visual', '$carnetConadis', '$porcentaje_discapacidad')";    
        $conn->query($antecedentes_patologicos);
        
        $antecedentes_obstetricos = "INSERT INTO antecedentes_obstetricos (id_datos_afiliado, menarquea, gesta, cesarea, aborto, alcohol, droga, cigarrillo, otro_obstetricos)
        VALUES ('$id_datos_afiliacion', '$checkMenarquea', '$checkGesta', '$checkCesarea', '$checkAborto', '$selectAlcohol', '$checkDroga', '$checkCigarrillo', '$checkHabitosOtro')";
        $conn->query($antecedentes_obstetricos);

        $antecedentes_patologicos_familiares = "INSERT INTO antecedentes_patologicos_familiares (id_datos_afiliado, descripcion_antecedentes_patologicos_familiares)
                                                VALUES ('$id_datos_afiliacion', '$antecedentesPatologicosFamiliares')";
        $conn->query($antecedentes_patologicos_familiares);

        $enfermedad_actual = "INSERT INTO enfermedad_actual (id_datos_afiliado, via_aerea_libre, descripcion_via_aerea_libre, via_aerea_obstruida, descripcion_via_aerea_obstruida, condicion_estable, descripcion_condicion_estable, condicion_inestable, descripcion_condicion_inestable)
                            VALUES ('$id_datos_afiliacion', '$checkViaLibre', '$descripcionViaLibre', '$checkViaObstruida', '$descripcionViaObstruida', '$checkCondicionEstable', '$descripcionCondicionEstable', '$checkCondicionInestable', '$descripcionCondicionInestable')";
        $conn->query($enfermedad_actual);

        $signos_vitales = "INSERT INTO signos_vitales (id_datos_afiliado, presion_arterial, frecuencia_cardiaca, frecuencia_respiratoria, temperatura, peso, talla, observacion)
                            VALUES ('$id_datos_afiliacion', '$presionArterial', '$frecuenciaCardiaca', '$frecuenciaRespiratoria', '$temperatura', '$peso', '$talla', '$observacion')";
        $conn->query($signos_vitales);

        $examen_fisico_general = "INSERT INTO examen_fisico_general (id_datos_afiliado, descripcion_examen_fisico_general)
                                    VALUES ('$id_datos_afiliacion', '$examenFisicoGeneral')";
        $conn->query($examen_fisico_general);

        $examen_fisico_regional = "INSERT INTO examen_fisico_regional (id_datos_afiliado, cabeza, descripcion_cabeza, cuello, descripcion_cuello, torax, descripcion_torax, abdomen, descripcion_abdomen, columna, descripcion_columna, pelvis, descripcion_pelvis, extremidades, descripcion_extremidades)
                                    VALUES ('$id_datos_afiliacion', '$checkCabeza', '$descripcionCabeza', '$checkCuello', '$descripcionCuello', '$checkTorax', '$descripcionTorax', '$checkAbdomen', '$descripcionAbdomen', '$checkColumna', '$descripcionColumna', '$checkPelvis', '$descripcionPelvis', '$checkExtremidades', '$descripcionExtremidades')";
        $conn->query($examen_fisico_regional);

        $diagnostico = "INSERT INTO diagnostico (id_datos_afiliado, presuntivo, definitivo)
                        VALUES ('$id_datos_afiliacion', '$presuntivo', '$definitivo')";
        $conn->query($diagnostico);

        $tratamiento = "INSERT INTO tratamiento (id_datos_afiliado, indicacion_1, medicamento_1, posologia_1, indicacion_2, medicamento_2, posologia_2, indicacion_3, medicamento_3, posologia_3, indicacion_4, medicamento_4, posologia_4)
                        VALUES ('$id_datos_afiliacion', '$indicacion_1', '$medicamento_1', '$posologia_1', '$indicacion_2', '$medicamento_2', '$posologia_2', '$indicacion_3', '$medicamento_3', '$posologia_3', '$indicacion_4', '$medicamento_4', '$posologia_4')";
        $conn->query($tratamiento);

        $conn->commit();
        
        header("Location: inicio.php#form");

    } catch (Exception $e) {
            $conn->rollback(); //Si existe algun error reversa o deshace todos los cambios 
            echo "Error al almacenar los datos: " . $e->getMessage();
        } 
    } else {
        echo "No se han enviado datos";
    }
} else {
    echo "No se han enviado datos";
}
?>