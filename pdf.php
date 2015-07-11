<?php
session_start();
require_once('usuarios.php');
$inicio = new Inicio('nombreInicio', 'passInicio');
$inicio->iniciarSesion();
require_once('fpdf.php');
$_query_ = mysql_query("SELECT * FROM citas WHERE id_usuario = '" . $_SESSION['id_usuario'] . "'");
while ($row = mysql_fetch_array($_query_)) {
    $cedula = $row['cedula_usuario'];
    $fecha = $row['fecha'];
    $servicio = $row['servicio'];
    $comentario = $row['descripcion'];
    $cantidad = $row['cantidad'];
    $valor = $row['valor'];

}

class Pdf extends FPDF
{
    function Header()
    {
        $this->SetTitle('Documento PDF');
        $this->Image('logo.jpg', 20, 18, 560);
        $this->Cell(0, 40, '', 0, 1, 'C');
    }
}

$pdf = new Pdf('P', 'pt', 'Letter');
$pdf->AddPage();
$pdf->Cell(0, 50, '', 0, 1);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 100, 'Estimado/a ' . ucfirst($_SESSION['usuario']) . '.', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 30, utf8_decode('Gracias por solicitar nuestros servicios.'), 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('Sólo queda realizar el pago y será contactado por nosotros para la aprobación de su cita.'), 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('Guarde este documento, esta es su orden de servicio.'), 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('Nuestros técnicos nunca le solicitarán dinero en efectivo, sólo el personal administrativo'), 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('lo puede hacer, luego de efectuar los servicios.'), 0, 1, 'L');
$pdf->Cell(0, 30, '', 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('Tu número de cédula es: ') . $cedula, 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('La fecha de tu cita es: ') . $fecha, 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('El servicio solicitado es: ') . $servicio, 0, 1, 'L');
if($servicio == 'Mantenimiento Correctivo'){
    $pdf->Cell(0, 30, utf8_decode('La razón de la solicitud es: ' . $comentario), 0, 1, 'L');
}
$pdf->Cell(0, 30, utf8_decode('La cantidad de máquinas a revisar es: ') . $cantidad, 0, 1, 'L');
$pdf->Cell(0, 30, utf8_decode('El precio a pagar es: ') . $valor . ' Bs.F', 0, 1, 'L');
$pdf->Output();
