<?php
ob_end_clean(); 
header('Content-Type: application/csv');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=listadoClientes_'.$_GET['fi'].'_'.$_GET['ff'].'.csv');
header('Expires: 0');
header('Cache-control: private');
header('Content-Type: application/x-octet-stream'); // Archivo de Excel
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-Description: File Transfer');
header('Last-Modified: '.date('D, d M Y H:i:s'));
header("Content-Transfer-Encoding: binary");


require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH."informeController.php");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$outputBuffer = fopen("php://output", 'a');
$column_array =  informeController::listadoClientesCSV($_GET['fi'],$_GET['ff']); 

$separado_por_comas=str_pad("EMPRESA ",10).chr(59)."CIUDAD\t\t\t".chr(59)."CONTACTO\t\t\t".chr(59)."AREA\t\t\t".chr(59)."AUDITORIA\t\t\t".chr(59)."SEDE\n\r";
fwrite($outputBuffer, $separado_por_comas);
foreach($column_array as $val) {
    //echo $val."<br>";
    fwrite($outputBuffer, strval($val));
}

fclose($outputBuffer);
exit;

?>