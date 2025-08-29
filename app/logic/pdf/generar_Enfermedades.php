<?php
include("../../../fpdf/fpdf.php");
require "../../config/config.php";

class PDF extends FPDF {

    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }
    function Header() {
        
        $this->Image('../../../images/LogoISTJBA.png', 15, 3, 45);
        $this->Image('../../../images/Unidad-de-Salud-logo.png', 148, 7, 50);
    }

    function listado($data) {
        $this->SetFont('Arial', 'B', 11);

        $this->SetY(30);
        $this->SetX(10);

        $this->Cell(190, 10, 'Listado De Personas Con Enfermedades', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 9);
        $this->SetX(10);
        $this->SetFillColor(155, 194, 230);
        $this->Cell(68, 10, 'Datos Personales', 1, 0, 'C', true);
        $this->Cell(122, 10, 'Enfermedad Actual', 1, 1, 'C', true);

        $this->SetFillColor(221, 235, 247);
        $this->Cell(68, 10, 'Nombre Completo', 1, 0, 'C', true);
        $this->Cell(27, 10, 'Vía Aérea Libre', 1, 0, 'C', true);
        $this->Cell(33, 10, 'Vía Aérea Obstruida', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Condición Estable', 1, 0, 'C', true);
        $this->Cell(32, 10, 'Condición Inestable', 1, 1, 'C', true);

        $this->SetFont('Arial', '', 9);
        foreach ($data as $row) {
            $this->SetX(10);
            $nombreCompleto = $row['nombres'] . ' ' . $row['apellidos'];
            $this->Cell(68, 10, $nombreCompleto, 1, 0, 'L');
            $this->Cell(27, 10, ($row['via_aerea_libre'] == 'SI' ? 'X' : ''), 1, 0, 'C');
            $this->Cell(33, 10, ($row['via_aerea_obstruida'] == 'SI' ? 'X' : ''), 1, 0, 'C');
            $this->Cell(30, 10, ($row['condicion_estable'] == 'SI' ? 'X' : ''), 1, 0, 'C');
            $this->Cell(32, 10, ($row['condicion_inestable'] == 'SI' ? 'X' : ''), 1, 0, 'C');
            $this->Ln();
        }
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AddPage('');

$sql = "SELECT da.nombres, da.apellidos, 
        ap.via_aerea_libre, 
        ap.via_aerea_obstruida,
        ap.condicion_estable,
        ap.condicion_inestable
        FROM datos_afiliado da
        JOIN enfermedad_actual ap ON da.id_datos_afiliado = ap.id_datos_afiliado
        WHERE ap.via_aerea_libre = 'SI'
        OR ap.via_aerea_obstruida = 'SI'
        OR ap.condicion_estable = 'SI'
        OR ap.condicion_inestable = 'SI'";

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