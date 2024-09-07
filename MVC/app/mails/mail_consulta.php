<?php
include(RUTA_APP . "/external/Mailer/src/PHPMailer.php");
include(RUTA_APP . "/external/Mailer/src/SMTP.php");
include(RUTA_APP . "/external/Mailer/src/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarConsulta($nombre, $email, $mensaje) {
    $emailOrigen = $email;
    $emailDestino = "irongym.lightweight@gmail.com";
    $pass = "yyke wydf hnzg uuhe";
    $from_name = $nombre;
    $host = "smtp.gmail.com";
    $port = 465;
    $smtp_auth = true;
    $smtp_secure = 'ssl';

    $body = "
        <p>Hola,</p>
        <p>Has recibido una nueva consulta de <b>$nombre</b> ($email):</p>
        <p>Consulta: $mensaje</p>
        <p>Saludos,<br>
        El equipo de <b>Iron Gym</b></p>
    ";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = $smtp_auth;
        $mail->Host = $host;
        $mail->Username = $emailDestino;
        $mail->Password = $pass;
        $mail->Port = $port;
        $mail->SMTPSecure = $smtp_secure;
        $mail->CharSet = 'utf-8';
        $mail->setFrom($emailOrigen, $from_name);
        $mail->addAddress($emailDestino);
        $mail->isHTML(true);
        $mail->Subject = 'Nueva consulta recibida';
        $mail->Body = $body;
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}");
        return false;
    }
}
?>