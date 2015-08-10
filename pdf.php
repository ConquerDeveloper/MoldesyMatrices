<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
require_once('fpdf.php');
$_query_ = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'");

class Pdf extends FPDF
{
    function Header()
    {
        $this->SetTitle('Documento PDF');
        $this->Image('logo.jpg', 20, 18, 560);
        $this->Cell(0, 40, '', 0, 1, 'C');
    }
}

while ($row = mysql_fetch_array($_query_)) {
    $cedula = $row['cedula_usuario'];
    $fecha = $row['fecha'];
    $servicio = $row['servicio'];
    $comentario = $row['descripcion'];
    $cantidad = $row['cantidad'];
    $valor = $row['valor'];

$pdf = new Pdf('P', 'pt', 'Letter');
$pdf->AddPage();
$pdf->Cell(0, 50, '', 0, 1);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0,0,'Estimado/a ' . ucfirst($_SESSION['usuario']),0,1,'C');
$pdf->Cell(0, 50, '', 0, 1);
$pdf->SetMargins(30,25,30);
$pdf->SetAutoPageBreak(true, 50);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(25, utf8_decode('Gracias por solicitar nuestros servicios. Solo queda realizar el pago y sera contactado para la aprobacion de su cita. Guarde este documento, esta es su orden de servicio.'));
$pdf->Ln();
$pdf->Ln();
$pdf->Write(25, utf8_decode('Nuestros tecnicos nunca le solicitaran dinero en efectivo, solo el personal administrativo, solo el personal administrativo lo puede hacer luego de efectuar los servicios.'));
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Write(25, utf8_decode('Tu numero de cedula es: ' . $cedula));
$pdf->Ln();
$pdf->Write(25, utf8_decode('La fecha de tu cita es: ' . $fecha));
$pdf->Ln();
$pdf->Write(25, utf8_decode('El servicio solicitado es: ' . $servicio));
if($servicio == 'Mantenimiento Correctivo'){
    $pdf->Ln();
    $pdf->Write(25, utf8_decode('La razon de la solicitud es: ' . $comentario));
}
$pdf->Ln();
$pdf->Write(25, utf8_decode('La cantidad de maquinas a revisar es: ' . $cantidad));
$pdf->Ln();
$pdf->Write(25, utf8_decode('El precio a pagar es: ' . $valor . ' Bs.F'));
$pdf->Output();
}