<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../vendor/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../vendor/home/css/animate.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css">
    <link rel="stylesheet" href="../../vendor/home/css/style.css">
    <title>Congreso 2022</title>
</head>
<body oncontextmenu="return false">
    <div id="app" >
        <div class="wrapper">

            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="../../vendor/home/img/logo.svg" class="img-fluid">
                        <div class="btnSideBarSe">
                            <button type="button" id="sidebarCollapse2" class="btn btn-infoTres mt-3">
                                <i class="fas fa-align-left"></i>
                                <span> Mostrar Contenido</span>
                            </button>
                        </div>
                </div>

                <!-- LINKS MENU -->
                <?php include '../../vendor/home/assets/inc/menu.inc'; ?>
                <!-- LINKS MENU -->


            </nav>

            <div id="content">

                <!-- BOTON MENU -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-infoDos">
                            <i class="fas fa-align-left"></i>
                            <span> Mostrar Menú</span>
                        </button>
                    </div>
                </nav>
                <!-- BOTON MENU -->

                <!-- CONTENIDO -->
                <div class="container animate__animated animate__fadeIn">
                    
                    <?php
                        switch ($id) {
                            case 'inicio':
                                include '../../vendor/home/assets/inc/inicio.inc';
                                break;
                            case 'programa':
                                include '../../vendor/home/assets/inc/programa.inc';
                                break;
                            case 'salas':
                                include '../../vendor/home/assets/inc/salas.inc';
                                break;
                            case 'foros':
                                include '../../vendor/home/assets/inc/foros.inc';
                                break;
                            case 'conferencias':
                                include '../../vendor/home/assets/inc/conferencias.inc';
                                break;
                            case 'constancia':
                                include '../../vendor/home/assets/inc/constancia.inc';
                                break;
                            
                            default:
                                include '../../vendor/home/assets/inc/inicio.inc';
                                break;
                        }
                    ?>
                    
                </div>
                <!-- CONTENIDO -->

                <?php
                    switch ($id) {
                        case 'listas':
                            echo '
                            
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h3 class="modal-title text-danger" id="staticBackdropLabel">¡Importante!</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Si tu nombre <b class="text-danger">NO aparece en listas</b>, favor de pasar a dirección, con gusto te atenderemos.
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Entendido</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <script>
                                // Ejecutar Modal
                                window.onload = function() {
                                    $("#staticBackdrop").modal("show");
                                };
                            </script>

                            ';
                            break;
                    }

                ?>
                    
                    

            </div>

        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse2').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>    
    
    
</body>
</html>