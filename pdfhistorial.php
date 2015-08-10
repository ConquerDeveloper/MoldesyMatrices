<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
require_once('fpdf.php');
function Mostrar(){
    $vista = array();
    $_query_ = mysql_query("SELECT * FROM reparaciones WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'");
    while ($row = mysql_fetch_array($_query_)) {
        $vista[] = $row;
    }
    return $vista;
}
$mostrar = Mostrar();

class Pdf extends FPDF
{
    function Header()
    {
        $this->SetTitle('Historial PDF');
        $this->Image('logo.jpg', 20, 18, 560);
        $this->Cell(0, 40, '', 0, 1, 'C');
    }
}

$pdf = new Pdf('P', 'pt', 'Letter');
$pdf->AddPage();
$pdf->Cell(0, 50, '', 0, 1);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0,0, 'Estimado/a ' . ucfirst($_SESSION['usuario']) . '.', 0, 1, 'C');
$pdf->Cell(0, 50, '', 0, 1);
$pdf->SetMargins(30,25,30);
$pdf->SetAutoPageBreak(true, 50);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(25, utf8_decode('Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.'));
$pdf->Ln();
$pdf->Ln();
for($i = 0; $i < sizeof($mostrar); $i ++){
    $pdf->Write(25, utf8_decode('El número de cita fue: ') . $mostrar[$i]['id_cita']);
    $pdf->Ln();
    $pdf->Write(25, utf8_decode('El servicio solicitado fue: ') . $mostrar[$i]['servicio']);
    $pdf->Ln();
    $pdf->Write(25,utf8_decode('La fecha de su cita fue: ') . $mostrar[$i]['fecha']);
    if($mostrar[$i]['servicio'] == 'Mantenimiento Correctivo'){
        $pdf->Ln();
        $pdf->Write(25, utf8_decode('La razón de la solicitud fue: ' . $mostrar[$i]['descripcion']));
    }
    $pdf->Ln();
    $pdf->Write(25, utf8_decode('La cantidad de máquinas a revisar fue: ') . $mostrar[$i]['cantidad']);
    $pdf->Ln();
    $pdf->Write(25, utf8_decode('El precio padago fue: ') . $mostrar[$i]['valor'] . ' Bs.F');
    $pdf->Ln();
    $pdf->Write(25, utf8_decode('La reparación realizada fue: ' . $mostrar[$i]['reparacion']));
    $pdf->Ln();
    $pdf->Ln();
}
$pdf->Output();
