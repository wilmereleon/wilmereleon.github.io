<?php
// Este es el código PHP que guarda los datos en una hoja de Excel y genera un PDF
// Se requiere instalar las librerías PHPExcel y TCPDF
require_once 'PHPExcel-1.8.2/Classes/PHPExcel.php';
require_once 'TCPDF-6.4.1/tcpdf.php';

// Se obtienen los datos del formulario
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$marca = $_POST['marca'];
$referencia = $_POST['referencia'];
$modelo = $_POST['modelo'];
$serial = $_POST['serial'];
$tipo = $_POST['tipo'];
$factura = $_POST['factura'];

// Se crea un objeto de PHPExcel
$objPHPExcel = new PHPExcel();

// Se establece la hoja activa
$objPHPExcel->setActiveSheetIndex(0);

// Se escriben los encabezados de la hoja de Excel
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Cédula');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Marca');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Referencia');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Modelo');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Serial');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tipo');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Factura');

// Se escriben los datos del formulario en la hoja de Excel
$objPHPExcel->getActiveSheet()->setCellValue('A2', $nombre);
$objPHPExcel->getActiveSheet()->setCellValue('B2', $cedula);
$objPHPExcel->getActiveSheet()->setCellValue('C2', $marca);
$objPHPExcel->getActiveSheet()->setCellValue('D2', $referencia);
$objPHPExcel->getActiveSheet()->setCellValue('E2', $modelo);
$objPHPExcel->getActiveSheet()->setCellValue('F2', $serial);
$objPHPExcel->getActiveSheet()->setCellValue('G2', $tipo);
$objPHPExcel->getActiveSheet()->setCellValue('H2', $factura);

// Se guarda la hoja de Excel en el archivo e.xlsx
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('e.xlsx');

// Se crea un objeto de TCPDF
$pdf = new TCPDF();

// Se establece el margen y la orientación del PDF
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// Se agrega una página al PDF
$pdf->AddPage();

// Se escribe el título del PDF
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Formulario de registro', 0, 1, 'C');

// Se escribe la tabla con los datos del formulario en el PDF
$pdf->SetFont('helvetica', '', 12);
$pdf->writeHTML('<table border="1" cellpadding="5" cellspacing="0">
  <tr>
    <th>Nombre</th>
    <th>Cédula</th>
    <th>Marca</th>
    <th>Referencia</th>
    <th>Modelo</th>
    <th>Serial</th>
    <th>Tipo</th>
    <th>Factura</th>
  </tr>
  <tr>
    <td>'.$nombre.'</td>
    <td>'.$cedula.'</td>
    <td>'.$marca.'</td>
    <td>'.$referencia.'</td>
    <td>'.$modelo.'</td>
    <td>'.$serial.'</td>
    <td>'.$tipo.'</td>
    <td>'.$factura.'</td>
  </tr>
</table>', true, false, false, false, '');

// Se guarda el PDF en el archivo f.pdf
$pdf->Output('f.pdf', 'F');

// Se muestra un mensaje de éxito
echo 'El formulario se ha guardado en la hoja de Excel e.xlsx y se ha generado el PDF f.pdf';
?>