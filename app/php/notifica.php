<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

include_once 'info.php';
// Codifica el formato json
$_POST = json_decode(file_get_contents("php://input"), true);

// Entradas Form
// $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$opcion = 1;

// Conexion a DB
$con = new SQLite3("../data/data.db");

if ($opcion === 1) {


	$cs = $con -> query("SELECT * FROM registroUsr WHERE id BETWEEN '101' AND '105';");
	// $cs = $con -> query("SELECT * FROM registroUsr WHERE id = '1' OR id = '1231';");
	
			while ($resulDos = $cs -> fetchArray()) {

				$idBus = $resulDos['id'];
				$nCorreo = $resulDos['correo'];
				$nombreComUsr = $resulDos['nombreCom'];
				$passUsr = $resulDos['passDecrypt'];

				// ##################################
				// Inicia enviar correo
				// ##################################
	
				$csDos = $con -> query("SELECT id,correoMd5, MAX(id) AS ultimoRegis FROM registroUsr WHERE id = '$idBus'");
		
				while ($resulDos = $csDos -> fetchArray()) {
					$id = $resulDos['id'];
					$correoMd5 = $resulDos['correoMd5'];
					$ultimoRegis = $resulDos['ultimoRegis'];
	
					//Algoritmo generador de Correos de envío
	
					if ($ultimoRegis > 0 && $ultimoRegis < 10001) {
						$genAlgorit = substr($id,-1);
	
						switch ($genAlgorit) {
							case 1:
								$correoDeEnvio = 'altausuario10@utfv.edu.mx';
								break;
							case 2:
								$correoDeEnvio = 'altausuario9@utfv.edu.mx';
								break;
							case 3:
								$correoDeEnvio = 'altausuario8@utfv.edu.mx';
								break;
							case 4:
								$correoDeEnvio = 'altausuario1@utfv.edu.mx';
								break;
							case 5:
								$correoDeEnvio = 'altausuario6@utfv.edu.mx';
								break;
							case 6:
								$correoDeEnvio = 'altausuario5@utfv.edu.mx';
								break;
							case 7:
								$correoDeEnvio = 'altausuario4@utfv.edu.mx';
								break;
							case 8:
								$correoDeEnvio = 'altausuario3@utfv.edu.mx';
								break;
							case 9:
								$correoDeEnvio = 'altausuario2@utfv.edu.mx';
								break;
							case 0:
								$correoDeEnvio = 'altausuario10@utfv.edu.mx';
								break;
						}
	
					}
				}
	
				
		
	
	
				$mail = new PHPMailer(true);
	
					//Server settings
					// $mail->SMTPDebug = 2;    //Sirve como guía para detectar errores de envió
					$mail->CharSet = 'UTF-8';
			
					$mail->isSMTP();
			
					$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = $correoDeEnvio;                     // SMTP username
					$mail->Password   = '@123Alta2022';                               // SMTP password
					$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
					$mail->Port       = 465;                                    // TCP port to connect to
			
					//PARA PHP 5.6 Y POSTERIOR
					$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
			
					//Recipients
					$mail->setFrom($correoDeEnvio, 'USUARIO ACTIVADO');
					$mail->addAddress($nCorreo);     //Correo de Salida
					// $mail->addBCC('oliver.velazquez@corsec.com.mx');
					// $mail->addAttachment('video.jpg');  //Archivo Adjunto
			
					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					// $mail->msgHTML(file_get_contents('ejemplo.html'), __DIR__);     //Se envio archivo en HTML pero $mail->Body debe estar desactivado
					$mail->Subject = 'USUARIO ACTIVADO - XVIII CONGRESO NACIONAL DE ADMINISTRACIÓN Y NEGOCIOS 2022';
					$mail->Body    = '
					<h1>¡Felicidades '.$nombreComUsr.' tu correo ya está activo!</h1>
					<br>
					<p>
					Te recordamos que tu usuario y contraseña son:
					<br>
					<br>
					<table>
						<tr>
							<td><b>Usuario:</b></td>
							<td>'.$nCorreo.'</td>
						</tr>
						<tr>
							<td><b>Password:</b></td>
							<td>'.$passUsr.'</td>
						</tr>
					</table>
					<br>
					<br>
					Puedes dar click en el siguiente enlace:
					<br>
					<a href="https://congreso.utfv.net/acceso/inicio.app">https://congreso.utfv.net/acceso/inicio.app</a>
					<br>
					<br>
					O dentro de la pagina https://congreso.utfv.net, iniciar sesión en el menú principal, ingresando tu correo y contraseña.
					</p>
					<br>
					<p>
						<b>Recuerda descargar tu acceso en el siguiente link:</b>
					</p>
					<a href="https://congreso.utfv.net/genGafetes/usr.app?idUser='.$correoMd5.'">https://congreso.utfv.net/genGafetes/usr.app?idUser='.$correoMd5.'</a>
					<br>
					<br>
					';
			
					$mail->send();
	
	
				echo json_encode($nCorreo);			
			
	
			// ##################################
			// Termina enviar correo
			// ##################################
			}


		
	
}else{
	echo json_encode('');
}

$con -> close();

 ?>