<?php
class ContactController extends BaseController {

    public function __construct(){
        $this->authModel = $this->model('AuthModel');
    }
    
    public function muestraContacto(){
        $this->view('pages/contact/contact');
    }

    public function enviarconsulta(){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'mensaje' => $mensaje,
        ];

        if (!empty($this->authModel->buscar_por_mail($data))) {
            include(RUTA_APP . "/mails/mail_consulta.php");

            if (enviarConsulta($nombre, $email, $mensaje)) {
                $data['mail'] = '<div class="alert alert-success" role="alert">
                                    ¡Se ha enviado su consulta exitosamente!
                                 </div>';
            } else {
                $data['mail'] = '<div class="alert alert-danger" role="alert">
                                    Error al enviar el correo. Inténtalo de nuevo más tarde.
                                 </div>';
            }
            $data['error_mail'] = '';
        } else {
            $data['mail'] = '';
            $data['error_mail'] = "<div class='alert alert-danger' role='alert'>
                                      <p class='text-center'>El email no está registrado.</p>
                                   </div>";
        }

        $this->view('pages/dashboard/socio/formulario_consulta', $data);
    }
}
?>
