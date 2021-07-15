<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
//variables
$id=$_GET['id'];                
$ped=$_GET['np'];
// Introducimos HTML de prueba



 $html=file_get_contents_curl("http://localhost/tpfinal/report/Facturas.php?id=$id&np=$ped");
 

 
// Instanciamos un objeto de la clase DOMPDF.
//Instanciamos las opciones de DomPdf para poder cargar imagenes al pdf
$opcion = new Options();
$opcion-> set('isRemoteEnabled',true);
 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF($opcion);
 // Cargamos el contenido HTML.
$pdf->load_html($html);
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper('A3', 'portrait');
//$pdf->set_paper(array(0,0,104,250));
 

 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('reporteVenta.pdf');
function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
?>