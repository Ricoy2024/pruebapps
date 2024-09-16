<?php

require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer(true);

$cuerpo = '
    <html> 
        <head> 
            <title>Prueba de envio de correo</title> 
        </head>
        <body> 
            <h2>Solicitud de consulta!</h2>
            <p> 
                Contacto: ' . $nombre . ' - ' . $correo . ' <br>
                Mensaje: ' . $mensaje . ' 
            </p> 
        </body>
    </html>
    ';

try {


    
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pruebaalex291@gmail.com';                     //SMTP username
    $mail->Password   = 'mhooplsninvtjtla';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('pruebaalex291@gmail.com');     //Add a recipient

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nueva consulta recibida';
    $mail->Body    = $cuerpo;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado con exito..';
} catch (Exception $e) {
    echo "Mensaje de error: {$mail->ErrorInfo}";
}
?>

<a href="index.php">Volver a inicio</a>