<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

$id = (isset($_SESSION['id'])) ? $_SESSION['id'] : '';

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$con = new SQLite3("../../../../app/data/data.db");
$cs = $con -> query("SELECT * FROM 	registroUsr WHERE id = $id");
while ($resul = $cs -> fetchArray()) {

    $id = $resul['id'];
    $nombreCom = $resul['nombreCom'];
    $institucion = $resul['institucion'];

    //Generamos PDF
    $dompdf = new Dompdf();
    ob_start();
    include "plantilla.php";
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    // $dompdf->setPaper('letter', 'portrait');
    // $dompdf->set_paper(array(0, 0, 612.00, 792.00), 'portrait');
    $dompdf->set_paper(array(0, 0, 792.00, 612.00));
    
    $dompdf->render();

    $pdf = $dompdf->stream('constancia.pdf');
    //  $dompdf->stream('mypdf.pdf', [ 'Attachment' => true]);

    //Guarda PDF dentro de la ruta
    //  $output = $dompdf->output();
    //  file_put_contents($archivoPdf, $output);

}

 
$con -> close();

?>