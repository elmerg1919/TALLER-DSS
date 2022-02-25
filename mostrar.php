<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,10,'LISTA DE ESTUDIANTES',1,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20, 10, 'ID',1,0,'C',0);
    $this->Cell(60, 10, 'Nombre',1,0,'C',0);
    $this->Cell(60, 10, 'Apellido',1,0,'C',0);
    $this->Cell(50, 10, 'Calificacion_Al',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require('conexion.php');
$consulta ="SELECT * FROM estudiantes";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row=$resultado->fetch_assoc()){
    $pdf->Cell(20, 10, $row['Id_Alumno'],1,0,'C',0);
    $pdf->Cell(60, 10, $row['Nombre_Al'],1,0,'C',0);
    $pdf->Cell(60, 10, $row['Apellido'],1,0,'C',0);
    $pdf->Cell(50, 10, $row['Calificacion_Al'],1,1,'C',0);
}

$pdf->Output();
?>