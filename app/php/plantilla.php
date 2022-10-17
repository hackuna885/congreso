<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');



$id = !empty($id) ? $id : '';
$nombreCom = !empty($nombreCom) ? $nombreCom : '';
$institucion = !empty($institucion) ? $institucion : '';
$correoMd5 = !empty($correoMd5) ? $correoMd5 : '';
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
    <div class="codigoBarras">
                    <div class="otraCodigoBarras"><?php echo $barCode;?></div>
                </div>
    </body>
</html>