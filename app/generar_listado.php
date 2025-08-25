<?php
include("../fpdf/fpdf.php");
require "../config.php";

class PDF extends FPDF {

    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }
    function Header() {
        
        $this->Image('../images/LogoISTJBA.png', 15, 3, 45);
        $this->Image('../images/Unidad-de-Salud-logo.png', 148, 7, 50);
    }

    function listado($data) {
        
        $this->SetFont('Arial', 'B', 11);
        
        $this->SetY(30);
        $this->SetX(10);
        
        $this->Cell(190, 10, 'Listado De Personas Discapacitadas', 0, 1, 'C');
        
        $this->SetFont('Arial', 'B', 9);
        $this->SetX(10);
        $this->SetFillColor(155, 194, 230);
        $this->Cell(67, 10, 'Datos Personales', 1, 0, 'C', true);
        $this->Cell(123, 10, 'Tipo De Discapacidad', 1, 1, 'C', true);

        $this->SetFillColor(221, 235, 247);
        $this->Cell(67, 10, 'Nombre Completo', 1, 0, 'C', true);
        $this->Cell(13, 10, 'Fisica', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Intelectual', 1, 0, 'C', true);
        $this->Cell(14, 10, 'Mental', 1, 0, 'C', true);
        $this->Cell(22, 10, 'Psicosocial', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Sensorial', 1, 0, 'C', true);
        $this->Cell(18, 10, 'Auditiva', 1, 0, 'C', true);
        $this->Cell(16, 10, 'Visual', 1, 1, 'C', true);

        $this->SetFont('Arial', '', 9);
        foreach ($data as $row) {
            $this->SetX(10);
            $nombreCompleto = $row['nombres'] . ' ' . $row['apellidos'];
            $this->Cell(67, 10, $nombreCompleto, 1, 0, 'L');
            $this->Cell(13, 10, $this->getMark($row['descripcion_discapacidad_fisica']), 1, 0, 'C');
            $this->Cell(20, 10, $this->getMark($row['descripcion_discapacidad_intelectual']), 1, 0, 'C');
            $this->Cell(14, 10, $this->getMark($row['descripcion_discapacidad_mental']), 1, 0, 'C');
            $this->Cell(22, 10, $this->getMark($row['descripcion_discapacidad_psicosocial']), 1, 0, 'C');
            $this->Cell(20, 10, $this->getMark($row['descripcion_discapacidad_sensorial']), 1, 0, 'C');
            $this->Cell(18, 10, $this->getMark($row['descripcion_discapacidad_auditiva']), 1, 0, 'C');
            $this->Cell(16, 10, $this->getMark($row['descripcion_discapacidad_visual']), 1, 0, 'C');
            $this->Ln();
        }
    }

    function getMark($value) {
        return !empty($value) ? 'X' : '';
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AddPage('');


$sql = "SELECT da.nombres, da.apellidos, 
        ap.descripcion_discapacidad_fisica, 
        ap.descripcion_discapacidad_intelectual,
        ap.descripcion_discapacidad_mental,
        ap.descripcion_discapacidad_psicosocial,
        ap.descripcion_discapacidad_sensorial,
        ap.descripcion_discapacidad_auditiva,
        ap.descripcion_discapacidad_visual
        FROM datos_afiliado da
        JOIN antecedentes_patologicos ap ON da.id_datos_afiliado = ap.id_datos_afiliado
        WHERE ap.antecedentes_discapacidad = 'sí'";  // Filtrar por "sí"

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


$pdf->listado($data);

// Salida del PDF
$pdf->Output();
?>