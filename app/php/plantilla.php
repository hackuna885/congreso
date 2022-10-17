<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');



$id = !empty($id) ? $id : 1;
$nombreCom = !empty($nombreCom) ? $nombreCom : 'Oliver Raúl Velázquez Torres';
$institucion = !empty($institucion) ? $institucion : 'Universidad Tecnológica Fidel Velázquez';
$correoMd5 = !empty($correoMd5) ? $correoMd5 : '4fcaecb132895e6effeba9d763a3fe24';
// $id = !empty($id) ? $id : '';
// $nombreCom = !empty($nombreCom) ? $nombreCom : '';
// $institucion = !empty($institucion) ? $institucion : '';
// $correoMd5 = !empty($correoMd5) ? $correoMd5 : '';

//Generador id de Barras

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


?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/cadeneros.css">
    </head>
    <body>
        <div class="hoja">
            <div class="nomInvitado">
                <h1><?php echo $nombreCom;?></h1>
                <br>
                <h3><?php echo $institucion;?></h3>
            </div>
            <!-- <img src="../../img/acceso.jpg" style="background-color: red;"> -->
            <?php
                include('phpqrcode.php');

                $contenido = "https://congreso.utfv.net/";
                
                // Exportamos una imagen llamado resultado.png que contendra el valor de la avriable $content
                QRcode::png($contenido,"resultado.png",QR_ECLEVEL_L,20,2);
                
                // Impresión de la imagen en el navegador listo para usarla
                echo "<div class='codigoQr'><img src='resultado.png'/></div>";
                ?>
                <div class="codigoBarras">
                    <div class="otraCodigoBarras"><?php echo $barCode;?></div>
                </div>
                 <img src="../../img/acceso.jpg">
        </div>
    </body>
</html>