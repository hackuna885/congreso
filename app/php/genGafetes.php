<?php

    error_reporting(E_ALL ^ E_DEPRECATED);
    header("Content-Type: text/html; Charset=UTF-8");
    date_default_timezone_set('America/Mexico_City');
    
    $idUser = (isset($_GET['idUser'])) ? $_GET['idUser'] : '';
    
    
    //Libreria de dompdf
    // use Dompdf\Dompdf;
    // require_once 'dompdf/autoload.inc.php';
    
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

            $contCaract = strlen($id);

            switch ($contCaract) {
                case 1:
                    $barCode = '*00000'.$id.'*';
                    break;
                case 2:
                    $barCode = '*0000'.$id.'*';
                    break;
                case 3:
                    $barCode = '*000'.$id.'*';
                    break;
                case 4:
                    $barCode = '*00'.$id.'*';
                    break;
                case 5:
                    $barCode = '*0'.$id.'*';
                    break;
                
                default:
                $barCode = '*'.$id.'*';
                    break;
            }


            echo '

            <html>
                <head>
                    <link rel="stylesheet" href="../css/cadeneros.css">
                </head>
                <body>
                    <div class="hoja">
                        <div class="nomInvitado">
                            <h1>'.$nombreCom.'</h1>
                            <br>
                            <h3>'.$institucion.'</h3>
                        </div>                        
            ';
                            include('phpqrcode.php');
                            $contenido = "https://congreso.utfv.net/checkQr/qr.app?idUser=".$correoMd5;
                            
                            // Exportamos una imagen llamado resultado.png que contendra el valor de la avriable $content
                            QRcode::png($contenido,"resultado.png",QR_ECLEVEL_L,20,2);
                            
                            // Impresión de la imagen en el navegador listo para usarla
                            echo '<div class="codigoQr"><img src="../app/php/resultado.png"/></div>
                            
                            <div class="codigoBarras">
                                <div class="otraCodigoBarras">'.$barCode.'</div>
                            </div>
                            <img src="../img/acceso.jpg">
                    </div>
                </body>
            </html>
            
            
            
            ';


          
          
            
            
    
                //Generamos PDF
                // $dompdf = new Dompdf();
                // ob_start();
                // include "../../puebaBarras.html";
                // $html = ob_get_clean();
                // $dompdf->loadHtml($html);
                // $dompdf->setPaper('letter', 'vertical');
                // $dompdf->render();
        
                //Pregunta donde guardar el PDF
                // $pdf = $dompdf->stream($nomPdf, array('Attachment'=> false));
        
                //Guarda PDF dentro de la ruta
                // $output = $dompdf->output();
                // file_put_contents($archivoPdf, $output);
    
        
                // ##################################
    
    
        };
        
        $con -> close();
    
    ?>
