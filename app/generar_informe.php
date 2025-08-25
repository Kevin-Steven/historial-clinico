<?php
include("../fpdf/fpdf.php");
require "../config.php";
ini_set('memory_limit', '512M'); 
set_time_limit(500);

class PDF extends FPDF {
    private $alturaMaxima = 280;
    private $numPaginasDeseadas = 2;
    private $numPaginasAgregadas = 0;
    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }
    function Header() {
        
        $this->Image('../images/LogoISTJBA.png', 15, 3, 45);
        $this->Image('../images/Unidad-de-Salud-logo.png', 148, 7, 50);
    }

    function generarPrimeraPagina() {
        // Encabezado del PDF
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 45, 'HISTORIA CLINICA', 0, 1, 'C');

        $this->SetFillColor(155, 194, 230);
        $this->SetFont('Arial', 'B', 6);

        $this->SetX(60);
        $this->SetY($this->GetY() - 20); 
        
        $this->Cell(0, 8, '1. DATOS AFILIACIÓN', 1, 1, 'L', true);
        
        $this->SetFillColor(221, 235, 247);
        $this->Cell(65, 8, 'APELLIDOS', 1, 0, 'C', true);
        $this->Cell(65, 8, 'NOMBRES', 1, 0, 'C', true);
        $this->Cell(60, 8, 'N° DE CEDULA', 1, 1, 'C', true);

        $apellidos = obtenerDatoDesdeBD('apellidos');
        $nombres = obtenerDatoDesdeBD('nombres');
        $cedula = obtenerDatoDesdeBD('cedula');

        $this->SetFont('Arial', '', 6);

        $this->Cell(65, 8, $apellidos, 1, 0, 'C');
        $this->Cell(65, 8, $nombres, 1, 0, 'C');
        $this->Cell(60, 8, $cedula, 1, 1, 'C');

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(221, 235, 247);
                
        $this->Cell(45, 8, 'DIRECCION', 1, 0, 'C', true);
        $this->Cell(40, 8, 'BARRIO', 1, 0, 'C', true);
        $this->Cell(30, 8, 'CANTON', 1, 0, 'C', true);
        $this->Cell(37, 8, 'PROVINCIA', 1, 0, 'C', true);
        $this->Cell(38, 8, 'TELEFONO', 1, 1, 'C', true);

        $direccion = obtenerDatoDesdeBD('direccion');
        $barrio = obtenerDatoDesdeBD('barrio');
        $canton = obtenerDatoDesdeBD('canton');
        $provincia = obtenerDatoDesdeBD('provincia');
        $telefono = obtenerDatoDesdeBD('telefono');

        $this->SetFont('Arial', '', 6);

        $this->Cell(45, 8, $direccion, 1, 0, 'C');
        $this->Cell(40, 8, $barrio, 1, 0, 'C');
        $this->Cell(30, 8, $canton, 1, 0, 'C');
        $this->Cell(37, 8, $provincia, 1, 0, 'C');
        $this->Cell(38, 8, $telefono, 1, 1, 'C');

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(221, 235, 247);

        $this->Cell(40, 8, 'FECHA DE NACIMIENTO', 1, 0, 'C', true);
        $this->Cell(25, 8, 'OCUPACION', 1, 0, 'C', true);
        $this->Cell(25, 8, 'SEXO', 1, 0, 'C', true);
        $this->Cell(25, 8, 'ESTADO CIVIL', 1, 0, 'C', true);
        $this->Cell(23, 8, 'HIJOS', 1, 0, 'C', true);
        $this->Cell(30, 8, 'HORA', 1, 0, 'C', true);
        $this->Cell(22, 8, 'N.H.C', 1, 1, 'C', true);

        $fecha_nacimiento = obtenerDatoDesdeBD('fecha_nacimiento');
        $ocupacion = obtenerDatoDesdeBD('ocupacion');
        $sexo = obtenerDatoDesdeBD('sexo');
        $estado_civil = obtenerDatoDesdeBD('estado_civil');
        $hijos = obtenerDatoDesdeBD('hijos');
        $fecha_registro = obtenerDatoDesdeBD('fecha_registro');
        $id_datos_afiliado = obtenerDatoDesdeBD('id_datos_afiliado');

        $this->SetFont('Arial', '', 6);

        $this->Cell(40, 8, $fecha_nacimiento, 1, 0, 'C');
        $this->Cell(25, 8, $ocupacion, 1, 0, 'C');
        $this->Cell(25, 8, $sexo, 1, 0, 'C');
        $this->Cell(25, 8, $estado_civil, 1, 0, 'C');
        $this->Cell(23, 8, $hijos, 1, 0, 'C');
        $this->Cell(30, 8, $fecha_registro, 1, 0, 'C');
        $this->Cell(22, 8, $id_datos_afiliado, 1, 1, 'C');

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(221, 235, 247);

        $this->Cell(40, 8, 'NOMBRE DE CONTACTO', 1, 0, 'C', true);
        $this->Cell(50, 8, 'CARRERA A LA QUE PERTENECE', 1, 0, 'C', true);
        $this->Cell(43, 8, 'FECHA', 1, 0, 'C', true);
        $this->Cell(57, 8, 'ESTUDIOS REALIZADOS', 1, 1, 'C', true);

        $nombre_contacto = obtenerDatoDesdeBD('nombre_contacto');
        $carrera = obtenerDatoDesdeBD('carrera');
        $fecha = obtenerDatoDesdeBD('fecha');
        $estudios_realizados = obtenerDatoDesdeBD('estudios_realizados');

        $this->SetFont('Arial', '', 6);

        $this->Cell(40, 8, $nombre_contacto, 1, 0, 'C');
        $this->Cell(50, 8, $carrera, 1, 0, 'C');
        $this->Cell(43, 8, $fecha, 1, 0, 'C');
        $this->Cell(57, 8, $estudios_realizados, 1, 1, 'C');


        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(221, 235, 247);

        $this->Cell(52, 8, 'ACTUALMENTE RECIBE ATENCION MÉDICA DE:', 1, 0, 'C', true);

        $atencion_medica = obtenerDatoDesdeBD('atencion_medica');
        $profesion = obtenerDatoDesdeBD('profesion');

        $this->Cell(10, 8, 'IESS', 1, 0, 'C');
        $this->Cell(6, 8, ($atencion_medica == 'IESS') ? 'X' : '', 1, 0, 'C');
        $this->Cell(36, 8, 'MINISTERIO DE SALUD PUBLICA', 1, 0, 'C');
        $this->Cell(6, 8, ($atencion_medica == 'MINISTERIO DE SALUD PUBLICA') ? 'X' : '', 1, 0, 'C');
        $this->Cell(18, 8, 'PARTICULAR', 1, 0, 'C');
        $this->Cell(6, 8, ($atencion_medica == 'PARTICULAR') ? 'X' : '', 1, 0, 'C');
        $this->Cell(10, 8, 'OTRO', 1, 0, 'C');
        $this->Cell(6, 8, ($atencion_medica == 'OTRO') ? 'X' : '', 1, 0, 'C');

        $this->Cell(16, 8, 'PROFESIÓN:', 1, 0, 'L');
        $this->SetFont('Arial', '', 6);
        $this->Cell(24, 8, $profesion, 1, 1, 'C');

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(0, 8, '2. ANTECENDENTES PATOLÓGICOS PERSONALES', 1, 1, 'L', true);

        $antecedentes = obtenerAntecedentesDesdeBD();

        $this->Cell(25, 8, '1. ALÉRGICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['alergico'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_alergia'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(25, 8, '2. CLÍNICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['clinica'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_clinica'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '3. GINECOLÓGICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['ginecologia'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_ginecologia'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '4. TRAUMATOLÓGICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['traumatologia'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_traumatologia'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '5. QUIRÚRGICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['quirurgico'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_quirurgico'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '6. FARMACOLÓGICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['farmacologico'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_farmacologico'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '7. PSIQUIÁTRICO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['psiquiatrico'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_psiquiatrico'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(25, 8, '8. OTRO', 1, 0, 'L');
        $this->Cell(6, 8, ($antecedentes['otro'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(159, 8, $antecedentes['descripcion_otro'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $antecedentesData = obtenerRespuestasAntecedentesDesdeBD();

        $this->Cell(55, 8, 'ANTECEDENTES DE DISCAPACIDAD:', 1, 0, 'C');
        $this->Cell(15, 8, 'SI', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesData['antecedentes_discapacidad'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(15, 8, 'NO', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesData['antecedentes_discapacidad'] == 'NO') ? 'X' : '', 1, 0, 'C');

        $this->Cell(51, 8, 'CARNET DE CONADIS:', 1, 0, 'C');
        $this->Cell(15, 8, 'SI', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesData['carnet_conadis'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(15, 8, 'NO', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesData['carnet_conadis'] == 'NO') ? 'X' : '', 1, 1, 'C');


        $infoDiscapacidades = obtenerInfoDiscapacidadesDesdeBD();

        if ($antecedentesData['antecedentes_discapacidad'] == 'SI') {

            $this->Cell(190, 8, 'SI SU RESPUESTA ES SI, DESCRIBA EL TIPO DE DISCAPACIDAD:', 1, 1, 'L');

            $this->Cell(35, 8, 'DISCAPACIDAD FÍSICA:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_fisica'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD INTELECTUAL:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_intelectual'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD MENTAL:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_mental'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD PSICOSOCIAL:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_psicosocial'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD SENSORIAL:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_sensorial'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD AUDITIVA:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_auditiva'], 1, 1, 'L');
            $this->SetFont('Arial', 'B', 6);
            $this->Cell(35, 8, 'DISCAPACIDAD VISUAL:', 1, 0, 'L');
            $this->SetFont('Arial', '', 6);
            $this->Cell(155, 8, $infoDiscapacidades['descripcion_discapacidad_visual'], 1, 1, 'L');
        }else {
            $this->SetFont('Arial', 'B', 6);

            $this->Cell(190, 8, 'SI SU RESPUESTA ES SI, DESCRIBA EL TIPO DE DISCAPACIDAD:', 1, 1, 'L');

            $this->Cell(35, 8, 'DISCAPACIDAD FÍSICA:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD INTELECTUAL:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD MENTAL:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD PSICOSOCIAL:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD SENSORIAL:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD AUDITIVA:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
            $this->Cell(35, 8, 'DISCAPACIDAD VISUAL:', 1, 0, 'L');
            $this->Cell(155, 8, '', 1, 1, 'L');
        }


        $porcentaje_discapacidad = obtenerPorcentajeDiscapacidadDesdeBD();

        $infoDiscapacidades = obtenerInfoDiscapacidadesDesdeBD();

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(83, 8, 'SI CUENTA CON EL CARNET, ¿CUAL ES EL PORCENTAJE DE DISCAPACIDAD?', 1, 0, 'L');

        if ($infoDiscapacidades['carnet_conadis'] == 'SI') {
            $this->SetFont('Arial', '', 6);
            $this->Cell(107, 8, $infoDiscapacidades['porcentaje_discapacidad'], 1, 1, 'L');
        } else {
            $this->Cell(107, 8, '', 1, 1, 'L');
        }
    
    }

    function agregarSeccionAntecedentes() {
        $alturaRestante = $this->alturaMaxima - $this->GetY();
    
        if ($alturaRestante < 30 && $this->numPaginasAgregadas < $this->numPaginasDeseadas) {
            $this->numPaginasAgregadas++;
            $this->AddPage();
            $this->SetY(30);
        }

        $antecedentesobs = obtenerAntecedentesObstetricos();

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);
    
        $this->Cell(190, 8, '3. ANTECEDENTES OBSTETRICOS', 1, 1, 'L',true);
    
        $this->Cell(30, 8, '1. MENARQUEA', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesobs['menarquea'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(25, 8, '2. GESTA', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesobs['gesta'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(25, 8, '3. CESÁREA', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesobs['cesarea'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(25, 8, '4. ABORTO', 1, 0, 'C');
        $this->Cell(6, 8, ($antecedentesobs['aborto'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(61, 8, '', 1, 1, 'C');
        $this->Cell(190, 8, '', 1, 1, 'L');

        
        $habitos = obtenerHabitosPersonales();

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(190, 8, 'HABITOS PERSONALES', 1, 1, 'L');
    
        $this->Cell(30, 8, '1. ALCOHOL', 1, 0, 'C');
        $this->Cell(6, 8, ($habitos['alcohol']), 1, 0, 'C');
        
        $this->Cell(25, 8, '2. DROGA', 1, 0, 'C');
        $this->Cell(6, 8, ($habitos ['droga'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(25, 8, '3. CIGARRILLO', 1, 0, 'C');
        $this->Cell(6, 8, ($habitos ['cigarrillo'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(25, 8, '4. OTRO', 1, 0, 'C');
        $this->Cell(6, 8, ($habitos ['otro_obstetricos'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->Cell(61, 8, '', 1, 1, 'C');

        $descripcion_antecedentes = obtenerDescripcionAntecedentesPatologicos();

        $tamano_maximo_linea = 139;

        $lineas_descripcion = str_split($descripcion_antecedentes, $tamano_maximo_linea);

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '4. ANTECEDENTES PATOLÓGICOS FAMILIARES', 1, 1, 'L', true);

        foreach ($lineas_descripcion as $linea) {
            $this->SetFont('Arial', '', 6);
            $this->Cell(190, 8, $linea, 1, 1, 'L');
        }
    
        $celda = obtenerDatosEnfermedadActual();

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '5. ENFERMEDAD ACTUAL', 1, 1, 'L', true);

        $this->Cell(30, 8, 'VÍA AEREA LIBRE', 1, 0, 'C');
        $this->Cell(6, 8, ($celda['via_aerea_libre'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(154, 8, $celda['descripcion_via_aerea_libre'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(30, 8, 'VÍA AEREA OBSTRUIDA', 1, 0, 'C');
        $this->Cell(6, 8, ($celda['via_aerea_obstruida'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(154, 8, $celda['descripcion_via_aerea_obstruida'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(30, 8, 'CONDICIÓN ESTABLE', 1, 0, 'C');
        $this->Cell(6, 8, ($celda['condicion_estable'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(154, 8, $celda['descripcion_condicion_estable'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(30, 8, 'CONDICIÓN INESTABLE', 1, 0, 'C');
        $this->Cell(6, 8, ($celda['condicion_inestable'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(154, 8, $celda['descripcion_condicion_inestable'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '6. SIGNOS VITALES', 1, 1, 'L', true);

        $this->Cell(25, 8, 'PRESIÓN ARTERIAL', 1, 0, 'C');
        $presion_arterial = obtenerDatosSignosVitales('presion_arterial');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20, 8, $presion_arterial, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(30, 8, 'FRECUENCIA CARDIÁCA', 1, 0, 'C');
        $frecuencia_cardiaca = obtenerDatosSignosVitales('frecuencia_cardiaca');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20, 8, $frecuencia_cardiaca, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(35, 8, 'FRECUENCIA RESPIRATORIA', 1, 0, 'C');
        $frecuencia_respiratoria = obtenerDatosSignosVitales('frecuencia_respiratoria');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20, 8, $frecuencia_respiratoria, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(25, 8, 'TEMPERATURA', 1, 0, 'C');
        $temperatura = obtenerDatosSignosVitales('temperatura');
        $this->SetFont('Arial', '', 6);
        $this->Cell(15, 8, $temperatura, 1, 1, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(25, 8, 'PESO', 1, 0, 'C');
        $peso = obtenerDatosSignosVitales('peso');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20, 8, $peso, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(30, 8, 'TALLA', 1, 0, 'C');
        $talla = obtenerDatosSignosVitales('talla');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20, 8, $talla, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(35, 8, 'OBSERVACIÓN:', 1, 0, 'C');
        $observacion = obtenerDatosSignosVitales('observacion');
        $this->SetFont('Arial', '', 6);
        $this->Cell(60, 8, $observacion, 1, 1, 'C');


        $descripcion_examen = obtenerDescripcionExamen();

        $tamano_maximo_linea = 139;

        $lineas_descripcion = str_split($descripcion_examen, $tamano_maximo_linea);

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '7. EXAMEN FÍSICO GENERAL', 1, 1, 'L', true);

        foreach ($lineas_descripcion as $linea) {
            $this->SetFont('Arial', '', 6);
            $this->Cell(190, 8, $linea, 1, 1, 'L');
        }


        $columna = obtenerDatosExamenFisicoRegional();

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '8. EXAMEN FÍSICO REGIONAL', 1, 1, 'L', true);

        $this->Cell(22, 8, '1. CABEZA', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['cabeza'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_cabeza'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '2. CUELLO', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['cuello'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_cuello'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '3. TÓRAX', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['torax'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_torax'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '4. ABDOMEN', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['abdomen'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_abdomen'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '5. COLUMNA', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['columna'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_columna'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '6. PELVIS', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['pelvis'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_pelvis'], 1, 1, 'L');
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(22, 8, '7. EXTREMIDADES', 1, 0, 'L');
        $this->Cell(6, 8, ($columna['extremidades'] == 'SI') ? 'X' : '', 1, 0, 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(162, 8, $columna['descripcion_extremidades'], 1, 1, 'L');

        $alturaRestante = $this->alturaMaxima - $this->GetY();
    
        if ($alturaRestante < 30 && $this->numPaginasAgregadas < $this->numPaginasDeseadas) {
            $this->numPaginasAgregadas++;
        }

        $diagnostico = obtenerDatosDiagnostico();

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '9. DIAGNÓSTICO', 1, 1, 'L', true);

        $this->Cell(22, 8, 'PRESUNTIVO:', 1, 0, 'L');
        $this->SetFont('Arial', '', 6);
        $this->Cell(168, 8, $diagnostico['presuntivo'], 1, 1, 'L');

        $this->SetFont('Arial', 'B', 6);

        $this->Cell(22, 8, 'DEFINITIVO:', 1, 0, 'L');
        $this->SetFont('Arial', '', 6);
        $this->Cell(168, 8, $diagnostico['definitivo'], 1, 1, 'L');

        // Habilita nuevamente el salto de página automático
        $this->SetAutoPageBreak(true, 15);
    }

    function agregarSeccionExamen() {

        $this->AddPage();
        $this->SetY(30);
        
        $tratamiento = obtenerDatosTratamiento();

        $this->SetFont('Arial', 'B', 6);
        $this->SetFillColor(155, 194, 230);

        $this->Cell(190, 8, '10. TRATAMIENTO', 1, 1, 'L', true);

        $this->Cell(100, 8, 'INDICACIONES', 1, 0, 'C');
        $this->Cell(55, 8, 'MEDICAMENTO', 1, 0, 'C');
        $this->Cell(35, 8, 'POSOLOGÍA', 1, 1, 'C');

        
        $this->SetFont('Arial', '', 6);
        $this->Cell(100, 8, isset($tratamiento[0]['indicacion_1']) ? $tratamiento[0]['indicacion_1'] : '', 1, 0, 'L');
        $this->Cell(55, 8, isset($tratamiento[0]['medicamento_1']) ? $tratamiento[0]['medicamento_1'] : '', 1, 0, 'C');
        $this->Cell(35, 8, isset($tratamiento[0]['posologia_1']) ? $tratamiento[0]['posologia_1'] : '', 1, 1, 'C');

        $this->Cell(100, 8, isset($tratamiento[0]['indicacion_2']) ? $tratamiento[0]['indicacion_2'] : '', 1, 0, 'L');
        $this->Cell(55, 8, isset($tratamiento[0]['medicamento_2']) ? $tratamiento[0]['medicamento_2'] : '', 1, 0, 'C');
        $this->Cell(35, 8, isset($tratamiento[0]['posologia_2']) ? $tratamiento[0]['posologia_2'] : '', 1, 1, 'C');

        $this->Cell(100, 8, isset($tratamiento[0]['indicacion_3']) ? $tratamiento[0]['indicacion_3'] : '', 1, 0, 'L');
        $this->Cell(55, 8, isset($tratamiento[0]['medicamento_3']) ? $tratamiento[0]['medicamento_3'] : '', 1, 0, 'C');
        $this->Cell(35, 8, isset($tratamiento[0]['posologia_3']) ? $tratamiento[0]['posologia_3'] : '', 1, 1, 'C');

        $this->Cell(100, 8, isset($tratamiento[0]['indicacion_4']) ? $tratamiento[0]['indicacion_4'] : '', 1, 0, 'L');
        $this->Cell(55, 8, isset($tratamiento[0]['medicamento_4']) ? $tratamiento[0]['medicamento_4'] : '', 1, 0, 'C');
        $this->Cell(35, 8, isset($tratamiento[0]['posologia_4']) ? $tratamiento[0]['posologia_4'] : '', 1, 1, 'C');
        $this->Cell(190, 25, '', 1, 1, 'L');

        $this->SetFont('Arial', '', 6);

        $this->Cell(55, -32,'FIRMA:', 0, 0,'C');

        $this->SetFont('Arial', 'B', 12);

        $this->Cell(10, -30,'_____________________', 0, 0,'C');

        $this->SetFont('Arial', '', 6);

        $this->Cell(-9, -22,'Dra Gladys Ortiz Menéndez', 0, 0,'C');
        $this->Cell(7, -16,'CI: 0915459010', 0, 0,'C');

        $this->Cell(15, -32,'', 0, 0,'C');

        $this->SetFont('Arial', '', 6);

        $this->Cell(60, -32,'FIRMA:', 0, 0,'C');

        $this->SetFont('Arial', 'B', 12);
        
        $this->Cell(10, -30,'_____________________', 0, 0,'C');

        $this->SetFont('Arial', '', 6);

        $datosAfiliado = obtenerDatosAfiliado();

        $this->Cell(-9, -22, $datosAfiliado['nombres'] . ' ' . $datosAfiliado['apellidos'], 0, 0, 'C');

        $this->Cell(-5, -16,'CI:', 0, 0,'C');
        
        $this->Cell(21, -16, $datosAfiliado['cedula'], 0, 0, 'C');

        // Habilita nuevamente el salto de página automático
        $this->SetAutoPageBreak(true, 15);

    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    function ChapterTitle($title) {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $title, 0, 1, 'L');
    }
}

function obtenerAtencionMedicaDesdeBD() {
    global $conn;
    $sql = "SELECT atencion_medica, profesion  FROM datos_afiliado WHERE id_datos_afiliado";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return [
            'atencion_medica' => $row['atencion_medica'] ?? 'OTRO',
            'profesion' => $row['profesion'] ?? ''
        ];
    } else {

        return 'OTRO';
    }
}

function obtenerAntecedentesDesdeBD() {
    $id_antecedentes_patologicos = $_GET['id'];
    global $conn;
    $sql = "SELECT alergico, descripcion_alergia, clinica, descripcion_clinica, ginecologia, descripcion_ginecologia, traumatologia, descripcion_traumatologia, quirurgico, descripcion_quirurgico, farmacologico, descripcion_farmacologico, psiquiatrico, descripcion_psiquiatrico, otro, descripcion_otro FROM antecedentes_patologicos WHERE id_antecedentes_patologicos = $id_antecedentes_patologicos";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'alergico' => '',
            'descripcion_alergia' => '',
            'clinica' => '',
            'descripcion_clinica' => '',
            'ginecologia' => '',
            'descripcion_ginecologia' => '',
            'traumatologia' => '',
            'descripcion_traumatologia' => '',
            'quirurgico' => '',
            'descripcion_quirurgico' => '',
            'farmacologico' => '',
            'descripcion_farmacologico' => '',
            'psiquiatrico' => '',
            'descripcion_psiquiatrico' => '',
            'otro' => '',
            'descripcion_otro' => ''
        );
    }
}

function obtenerDescripcionAntecedentes($antecedentes) {
    $id_antecedentes_patologicos = $_GET['id'];
    global $conn;
    $sql = "SELECT descripcion FROM antecedentes_patologicos WHERE id_antecedentes_patologicos = '$id_antecedentes_patologicos' AND antecedentes = '$antecedentes'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['descripcion'];
    } else {
        return '';
    }
}

function obtenerRespuestasAntecedentesDesdeBD(){
    $id_antecedentes_patologicos = $_GET['id'];
    global $conn;
    $sql = "SELECT antecedentes_discapacidad, carnet_conadis FROM antecedentes_patologicos WHERE id_antecedentes_patologicos = $id_antecedentes_patologicos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'antecedentes_discapacidad' => 'NO',
            'carnet_conadis' => 'NO'
        );
    }
}

function obtenerInfoDiscapacidadesDesdeBD() {
    $id_antecedentes_patologicos = $_GET['id'];
    global $conn;
    $sql = "SELECT * FROM antecedentes_patologicos WHERE id_antecedentes_patologicos = $id_antecedentes_patologicos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'descripcion_discapacidad_fisica' => '',
            'descripcion_discapacidad_intelectual' => '',
            'descripcion_discapacidad_mental' => '',
            'descripcion_discapacidad_psicosocial' => '',
            'descripcion_discapacidad_sensorial' => '',
            'descripcion_discapacidad_auditiva' => '',
            'descripcion_discapacidad_visual' => '',
        );
    }
}

function obtenerPorcentajeDiscapacidadDesdeBD() {
    $id_antecedentes_patologicos = $_GET['id'];
    global $conn;
    $sql = "SELECT porcentaje_discapacidad FROM antecedentes_patologicos WHERE id_antecedentes_patologicos = $id_antecedentes_patologicos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['porcentaje_discapacidad'];
    } else {
        return '';
    }
}

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

function obtenerAntecedentesObstetricos() {
    $id_antecedentes_obstetricos = $_GET['id'];
    global $conn;

    $sql = "SELECT menarquea, gesta, cesarea, aborto FROM antecedentes_obstetricos WHERE id_antecedentes_obstetricos = $id_antecedentes_obstetricos";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'menarquea' => '',
            'gesta' => '',
            'cesarea' => '',
            'aborto' => '',
        );
    }
}

function obtenerHabitosPersonales() {
    $id_antecedentes_obstetricos = $_GET['id'];
    global $conn;

    $sql = "SELECT alcohol, droga, cigarrillo, otro_obstetricos FROM antecedentes_obstetricos WHERE id_antecedentes_obstetricos = $id_antecedentes_obstetricos";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'alcohol' => '',
            'droga' => '',
            'cigarrillo' => '',
            'otro_obstetricos' => '',
        );
    }
}

function obtenerDatoDesdeBD($campo) {
    $id_datos_afiliado = $_GET['id'];
    global $conn;
    $sql = "SELECT $campo FROM datos_afiliado WHERE id_datos_afiliado = $id_datos_afiliado";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row[$campo];
    } else {
        return '';
    }
}


function obtenerDescripcionAntecedentesPatologicos() {
    $id_antecedentes_patologicos_familiares = $_GET['id'];
    global $conn;
    $sql = "SELECT descripcion_antecedentes_patologicos_familiares FROM antecedentes_patologicos_familiares WHERE id_antecedentes_patologicos_familiares = $id_antecedentes_patologicos_familiares";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['descripcion_antecedentes_patologicos_familiares'];
    } else {
        return '';
    }
}

function obtenerDatosEnfermedadActual() {
    $id_enfermedad_actual = $_GET['id'];
    global $conn;
    $sql = "SELECT via_aerea_libre, descripcion_via_aerea_libre, via_aerea_obstruida, descripcion_via_aerea_obstruida, condicion_estable, descripcion_condicion_estable, condicion_inestable, descripcion_condicion_inestable FROM enfermedad_actual WHERE id_enfermedad_actual = $id_enfermedad_actual";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'via_aerea_libre' => '',
            'descripcion_via_aerea_libre' => '',
            'via_aerea_obstruida' => '',
            'descripcion_via_aerea_obstruida' => '',
            'condicion_estable' => '',
            'descripcion_condicion_estable' => '',
            'condicion_inestable' => '',
            'descripcion_condicion_inestable' => '',
        );
    }
}

function obtenerDatosSignosVitales($datos) {
    $id_signos_vitales = $_GET['id'];
    global $conn;
    $sql = "SELECT $datos FROM signos_vitales WHERE id_signos_vitales = $id_signos_vitales";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row [$datos];
    } else {
        return '';
    }
}

function obtenerDescripcionExamen() {
    $id_examen_fisico_general = $_GET['id'];
    global $conn;
    $sql = "SELECT descripcion_examen_fisico_general FROM examen_fisico_general WHERE id_examen_fisico_general = $id_examen_fisico_general";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['descripcion_examen_fisico_general'];
    } else {
        return '';
    }
}

function obtenerDatosExamenFisicoRegional() {
    $id_examen_fisico_regional = $_GET['id'];
    global $conn;
    $sql = "SELECT cabeza, descripcion_cabeza, cuello, descripcion_cuello, torax, descripcion_torax, abdomen, descripcion_abdomen, columna, descripcion_columna, pelvis, descripcion_pelvis, extremidades, descripcion_extremidades FROM examen_fisico_regional WHERE id_examen_fisico_regional = $id_examen_fisico_regional";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'cabeza' => '',
            'descripcion_cabeza' => '',
            'cuello' => '',
            'descripcion_cuello' => '',
            'torax' => '',
            'descripcion_torax' => '',
            'abdomen' => '',
            'descripcion_abdomen' => '',
            'columna' => '',
            'descripcion_columna' => '',
            'pelvis' => '',
            'descripcion_pelvis' => '',
            'extremidades' => '',
            'descripcion_extremidades' => '',
        );
    }
}

function obtenerDatosDiagnostico() {
    $id_diagnostico = $_GET['id'];
    global $conn;
    $sql = "SELECT presuntivo, definitivo FROM diagnostico WHERE id_diagnostico = $id_diagnostico";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return '';
    }
}

function obtenerDatosTratamiento() {
    $id_tratamiento = $_GET['id'];
    global $conn;
    $sql = "SELECT indicacion_1, medicamento_1, posologia_1, indicacion_2, medicamento_2, posologia_2, indicacion_3, medicamento_3, posologia_3, indicacion_4, medicamento_4, posologia_4 FROM tratamiento WHERE id_tratamiento = $id_tratamiento";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    $tratamiento = array();

    while ($row = $result->fetch_assoc()) {
        $tratamiento[] = $row;
    }

    while (count($tratamiento) < 5) {
        $tratamiento[] = array('indicacion_1' => '', 'medicamento_1' => '', 'posologia_1' => '', 'indicacion_2' => '', 'medicamento_2' => '', 'posologia_2' => '', 'indicacion_3' => '', 'medicamento_3' => '', 'posologia_3' => '', 'indicacion_4' => '', 'medicamento_4' => '', 'posologia_4' => '');
    }

    return $tratamiento;
}

function obtenerDatosAfiliado() {
    $id_datos_afiliado = $_GET['id'];
    global $conn;
    $sql = "SELECT nombres, apellidos, cedula FROM datos_afiliado WHERE id_datos_afiliado = $id_datos_afiliado";

    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return array(
            'nombres' => '',
            'apellidos' => '',
            'cedula' => '',
        );
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->generarPrimeraPagina();
$pdf->agregarSeccionAntecedentes();
$pdf->agregarSeccionExamen();

$conn->close();

$pdf->Output();

?>