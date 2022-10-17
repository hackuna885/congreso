<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


$correoMd5 = !empty($correoMd5) ? $correoMd5 : '';


    $con = new SQLite3("../data/data.db");
    $cs = $con -> query("SELECT * FROM v_registroUsr WHERE correoMd5 = '$correoMd5'");

    while ($resul = $cs -> fetchArray()) {
        $correoMd5 = $resul['correoMd5'];

    };

    $con -> close();

?>