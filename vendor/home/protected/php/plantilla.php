<?php

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
        @page {
            margin: 0px;
            padding: 0px; 
        }

        * {
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hoja {
            height: 815px;
            width: 1054px;
            position: absolute;
        }
        .hoja img {
            width: 100%;
        }
        .nomInvitado {
            position: absolute;
            width: 815px;
            height: 60px;
            padding: 5px;
            margin-top: 435px;
            margin-left: 120px;
            text-align: center;
            /* background-color: rgba(255, 0, 0, 0.5);  */
        }
        .institucion {
            position: absolute;
            width: 815px;
            height: 60px;
            padding: 5px;
            margin-top: 505px;
            margin-left: 120px;
            text-align: center;
            /* background-color: rgba(255, 0, 0, 0.5);  */
        }

        </style>
    </head>
    <body>
        <div class="hoja">
            <div class="nomInvitado">
                <h1><?php echo $nombreCom;?></h1>
                <!-- <h1>OLIVER RAÚL VELÁZQUEZ TORRES</h1> -->
            </div>
            <div class="institucion">
                <h3><?php echo $institucion;?></h3>
                <!-- <h3>UNIVERSIDAD TECNOLÓGICA FIDEL VELÁZQUEZ</h3> -->
            </div>
            <img src="../../img/reco2022.jpg">
        </div>
    </body>
</html>