<?php
    include(RUTA_APP."/external/Mailer/src/PHPMailer.php");
    include(RUTA_APP."/external/Mailer/src/SMTP.php");
    include(RUTA_APP."/external/Mailer/src/Exception.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $new_pass = create_pass(8);
    
    $this->authModel->change_pass($new_pass,$_POST['email']);
    
    $email="irongym.lightweight@gmail.com";
    $pass ="yyke wydf hnzg uuhe";
    $from_name ="ADMINISTRACIÓN IRON GYM";
    $host = "smtp.gmail.com";
    $port = 465;
    $smtp_auth=true;
    $smtp_secure=  'ssl';
    $link = RUTA_URL."/AuthController/update_pass/";
    $body = "<p>Hola
            <br>
            Tu nueva contraseña para ingresar al sistema es:<br> <b>{$new_pass}</b><br>
            Podrás cambiar esta contraseña ingresando al siguiente
            
            <a href={$link}>Link</a><br>
            Saludos,<br>
            El equipo de <b>Iron Gym</b>
            </p>";
    $mail = new PHPMailer();
    try{
        
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->SMTPAuth = $smtp_auth;
        $mail->Host = $host;
        $mail->Username= $email;
        $mail->Password = $pass;
        $mail->Port = $port;
        $mail->SMTPSecure =$smtp_secure;
        $mail->CharSet = 'utf-8'; 
        $mail->setFrom($email,$from_name);
        $mail->AddAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Recupero de Contraseña';
        $mail->Body = $body;
        if (!$mail->send()){
            echo "NO SE PUDO ENVIAR"; die();
        }
        if ($where == "new_pass") {
            $data = [
                "mail" => "<div class='alert alert-success text-center' role='alert'>
                                Te llegará una nueva contraseña por mail.
                            </div>",
                "error_mail" =>'',
            ];
            $this->view('pages/auth/forgot-password', $data);
        }
    }catch(Exception $e){
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
?>