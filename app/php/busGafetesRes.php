<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

// Codifica el formato json
$_POST = json_decode(file_get_contents("php://input"), true);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$txtBuscador = (isset($_POST['txtBuscador'])) ? $_POST['txtBuscador'] : '';

// Intradas del form
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$aPaterno = (isset($_POST['aPaterno'])) ? $_POST['aPaterno'] : '';
$aMaterno = (isset($_POST['aMaterno'])) ? $_POST['aMaterno'] : '';
$nombreCom = (isset($_POST['nombreCom'])) ? $_POST['nombreCom'] : '';
$institucion = (isset($_POST['institucion'])) ? $_POST['institucion'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';

// Conexion a DB
$con = new SQLite3("../data/data.db") or die("Problemas para conectar");

// Opciones del CRUD
switch ($opcion) {
    // Insertar
    case 1 :
        
        break;
    // Actualizar
    case 4 :
        $cs = $con -> query("UPDATE registroUsr SET fechaRecarga = '$fechaRecarga', registrado = '$registrado', asignado = '$asignado', numEmpRespAsig = '$numEmpRespAsig', nomRespAsig = '$nomRespAsig', diviAsig = '$diviAsig', numEmpRecib = '$numEmpRecib', nombreRecib = '$nombreRecib', fechaRecib = '$fechaRecib' WHERE id = '$id'");
        break;
    // Leer
    case 2 :
        $cs = $con -> query("SELECT * FROM registroUsr WHERE correo LIKE '%$txtBuscador%'");
        $datos = array();
        $i = 0;

        while ($resul = $cs -> fetchArray()) {
            $datos[$i]['id'] = $resul['id'];
            $datos[$i]['nombre'] = $resul['nombre'];
            $datos[$i]['aPaterno'] = $resul['aPaterno'];
            $datos[$i]['aMaterno'] = $resul['aMaterno'];
            $datos[$i]['nombreCom'] = $resul['nombreCom'];
            $datos[$i]['institucion'] = $resul['institucion'];
            $datos[$i]['rfc'] = $resul['rfc'];
            $datos[$i]['tel'] = $resul['tel'];
            $datos[$i]['userMd5'] = $resul['userMd5'];
            $datos[$i]['correo'] = $resul['correo'];
            $datos[$i]['correoMd5'] = $resul['correoMd5'];
            $datos[$i]['password'] = $resul['password'];
            $datos[$i]['passDecrypt'] = $resul['passDecrypt'];
            $datos[$i]['modalidad'] = $resul['modalidad'];
            $datos[$i]['usrNavega'] = $resul['usrNavega'];
            $datos[$i]['usrSO'] = $resul['usrSO'];
            $datos[$i]['usrVerSO'] = $resul['usrVerSO'];
            $datos[$i]['usrVerSO'] = $resul['usrVerSO'];
            $datos[$i]['usrFechaHoraReg'] = $resul['usrFechaHoraReg'];
            $datos[$i]['tipoUsuario'] = $resul['tipoUsuario'];
            $datos[$i]['usrActivo'] = $resul['usrActivo'];
            $datos[$i]['usrAsistencia'] = $resul['usrAsistencia'];
            $i++;
        
        }

        break;
}

$datos = (isset($datos) ? $datos : '');
echo json_encode($datos);

$con -> close();

?>