<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$idUser = (isset($_GET['idUser'])) ? $_GET['idUser'] : '';

//Libreria de dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

//Generamos el Gafete dentro de la Ruta 'img/qr/'

    $con = new SQLite3("../data/data.db");
    $cs = $con -> query("SELECT * FROM v_registroUsr WHERE correoMd5 = '$idUser'");


    while ($resul = $cs -> fetchArray()) {
        $id = $resul['id'];
        $nombreCom = $resul['nombreCom'];
        $institucion = $resul['institucion'];
        $correoMd5 = $resul['correoMd5'];
        $usrAsistencia = $resul['usrAsistencia'];
        $dirPdf = '../../pdf/';
        $nomPdf = $correoMd5.'.pdf';
        $archivoPdf = $dirPdf.$nomPdf;
      
      
        
        

            //Generamos PDF
            $dompdf = new Dompdf();
            ob_start();
            include "plantilla.php";
            sleep(10);
            $html = ob_get_clean();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'vertical');
            $dompdf->render();
            sleep(10);
    
            //Pregunta donde guardar el PDF
            $pdf = $dompdf->stream($nomPdf);
    
            //Guarda PDF dentro de la ruta
            // $output = $dompdf->output();
            // file_put_contents($archivoPdf, $output);

	
            // ##################################


    };
    
    $con -> close();

?>