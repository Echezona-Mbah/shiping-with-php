<?php
// set_include_path(get_include_path() . PATH_SEPARATOR . "administrator/dompdf/src/Dompdf.php");
// require_once( '../../../dompdf_0-8-3/autoload.inc.php');
require_once( 'Dompdf.php');
use Dompdf\Dompdf;
use Dompdf\Options;
// 
$dompdf = new Dompdf();

$dompdf->loadHtml('result-temp.php');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();