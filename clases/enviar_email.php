<?php

/**
 * Clase para envio de correo electrónico
 * Adrian Guillen
 * 22310361
 */

use PHPMailer\PHPMailer\PHPMailer, SMTP, Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Configure el servidor SMTP para enviar
    $mail->SMTPAuth   = true;                          // Habilita la autenticación SMTP
    $mail->Username   = 'noreply@adrianguillen2004.com';                     //Usuario SMTP
    $mail->Password   = 'GuillenA7';                     //Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Habilitar el cifrado TLS
    $mail->Port       = 465;                     //Puerto TCP al que conectarse, si usa 587 agregar `SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS`

    //Correo emisor y nombre
    $mail->setFrom('noreply@adrianguillen2004.com', 'TepainyBooks');
    //Correo receptor y nombre
    $mail->addAddress("theendjmaster@outlook.com", 'Adrian');

    //Contenido
    $mail->isHTML(true);   //Establecer el formato de correo electrónico en HTML
    $mail->Subject = 'Detalles de su compra'; //Titulo del correo

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>'. $idtransaccion . '</b></p>';

    //Cuerpo del correo
    $mail->Body = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    //Enviar correo
    return $mail->send();
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
    //exit;
}