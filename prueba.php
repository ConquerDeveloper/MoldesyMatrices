<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
require_once('fpdf.php');
$_query_ = mysql_query("SELECT * FROM citas");
while($culo = mysql_fetch_array($_query_)){
    $_SESSION['fecha'] = $culo['fecha'];
};
class Pdf extends FPDF
{
    function Header(){
        $this->Image('logo.jpg',20,18,750);
        $this->Cell(0,40,'',0,1,'C');
    }
}

$pdf = new Pdf('L', 'pt', 'Letter');
$pdf->AddPage();
$pdf->Cell(0,50,'',0,1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,100,'Bienvenido, ' . $_SESSION['usuario'] . '.',0,1,'C');
$pdf->Cell(0,30,'Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.',0,1,'L');
$pdf->Cell(0,30,'Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.',0,1,'L');
$pdf->Cell(0,30,'Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.',0,1,'L');
$pdf->Cell(0,30,'Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec Lorem ipsum dolor sit amec.',0,1,'L');
$pdf->Cell(0,30,'',0,1,'L');
$pdf->Cell(0,30,'Tu numero de cedula es: ' . $_SESSION['cedula'],0,1,'L');
$pdf->Cell(0,30,'La fecha de tu cita es: ' . $_SESSION['fecha'],0,1,'L');
$pdf->Output();




?>
