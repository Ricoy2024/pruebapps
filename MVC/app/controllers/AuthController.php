<?php
    class AuthController extends BaseController{
        
        public function __construct(){
            $this->authModel=$this->model('AuthModel');
        }
        
        /* Función para llamar a la vista login con blanqueo de errores*/
        public function login(){
            $data = [
                'error_login'=>'',
            ];
            $this->view('pages/auth/login',$data);
        }

        public function endSession() {
            // Elimina todas las variables de sesión
            $_SESSION = array();
        
            // Si se desea destruir la sesión, también se elimina la cookie de sesión
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
        
            // Finalmente, destruye la sesión
            session_destroy();
        
            // Redirige al usuario a la página de inicio o a donde desees después de cerrar sesión
            $this->view('pages/index');
            exit();
        }

        public function redirectUserPanel() {
            if($_SESSION) {
                $this->view('pages/dashboard/socio/panel_socio');
            }
            else {
                $this->view('pages/index');
            }
        }

        public function redirectAdminPanel(){
            if($_SESSION) {
                $data=[ 
                    'mostrar_panel_alta'=> false,
                    'error_tipo'=>'',
                    'error_megas'=>'',
                ];
                $this->view('pages/dashboard/admin/panel_admin',$data);

            }
            else {
                $this->view('pages/index');
            }
        }

        /* Función que verifica los datos del usuario y redirige al panel y guarda los datos en la sesión*/
        public function loginUsuario() {
            $data = [
                'dni' => $_POST['dni'],
                'contraseña' => $_POST['contraseña']
            ];
        
            // Busca el usuario por DNI
            $usuario = $this->authModel->buscar_por_dni($data);
        
            if ($usuario) {
                // Verifica la contraseña ingresada con la contraseña almacenada
                if ($data['contraseña'] === $usuario->pass) {
                    // Contraseña correcta
                    $_SESSION['Nombre'] = $usuario->Nombre;
                    $_SESSION['Dni'] = $usuario->Dni;
                    $_SESSION['Email'] = $usuario->Email;
                    $this->view('pages/dashboard/socio/panel_socio');
                } else {
                    // Contraseña incorrecta
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                                            Usuario o contraseña incorrectos.
                                            </div>',
                        ];  
                    $this->view('pages/auth/login', $data);
                }
            } else {
                // Usuario no encontrado
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                                    Usuario o contraseña incorrectos.
                                    </div>',
                ];
                $this->view('pages/auth/login', $data);
            }
        }
        
        

        /* Función para llamar a la vista registro con blanqueo de errores*/
        public function register(){
                $data = [
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    'error_pass'=>'',
                ];
            
            $this->view('pages/auth/register',$data);
        }

        /* Función que toma los datos del formulario, hace las verificaciones y los envía al modelo*/
        public function registrarUsuario(){
            //die('arranca la funcion registrar usuario');
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $celular = $_POST['celular'];
                $contrasena = $_POST['contrasena'];
                $contrasena2 = $_POST['contrasena2'];

                if ($contrasena == $contrasena2){
                    $data= [
                        'nombre' => $nombre,
                        'apellido' =>$apellido,
                        'dni' => $dni,
                        'email' => $email,
                        'celular' => $celular,
                        'contraseña' => $contrasena,
                        'contraseña2' => $contrasena2
                    ];
                    $auth = $this->authModel->buscar_por_dni($data);
                    if (empty($auth)){
                        $auth = $this->authModel->buscar_por_mail($data);
                        if (empty($auth)){
                            if($this->authModel->crear_usuario($data)){
                                    $_SESSION['success'] = 'Registro exitoso, ya puede logearse.';
                                $this->view('pages/auth/login');
                            }else{
                                $data = [
                                    'error_pass' => '<div class="alert alert-danger" role="alert">
                                                        No se pudo crear el usuario, intente nuevamente.
                                                    </div>',
                                    'error_tipo' =>'',
                                    'error_megas'=>''
                                ];
                                $this->view('pages/auth/register',$data); 
                            }
                        }
                        else{
                            $data = [
                                'error_pass' => '<div class="alert alert-danger" role="alert">
                                                    Ya existe una cuenta creada con ese Email.
                                                </div>',
                                'error_tipo' =>'',
                                'error_megas'=>''
                            ];
                            $this->view('pages/auth/register',$data);
                        }
                        }else{
                            $data = [
                                'error_pass' => '<div class="alert alert-danger" role="alert">
                                                    Ya existe una cuenta creada con ese dni.
                                                </div>',
                                'error_tipo' =>'',
                                'error_megas'=>''
                            ];
                            $this->view('pages/auth/register',$data);
                        }
                    }
                else
                {
                    $data = [
                        'error_pass' => '<div class="alert alert-danger" role="alert">
                                            Las contraseñas no coinciden
                                        </div>',
                        'error_tipo' =>'',
                        'error_megas'=>'',
                        'error_cell'=>''
                    ];
                    $this->view('pages/auth/register',$data);
                }
            }
        }

        public function resetPassword(){
            
            $data = [
                'mail' => '',
                'error_mail' => '',
            ];      
            $this->view('pages/auth/forgot-password',$data);
        }




        /* Función para llamar a la vista registro con blanqueo de errores*/
        public function loginAdministrador(){
            $data = [
                'error_login'=>'',
            ];

        $this->view('pages/auth/loginAdministrador',$data);
        }


        public function loginadmin(){
            $data = [
                'dni' => $_POST['dni'],
                'contraseña' => $_POST['contraseña']
            ];

            if($this->authModel->buscar_por_dni_administrador($data)){
                if($usuario = $this->authModel->buscar_por_dni_administrador($data)) {
                    //$_SESSION['Nombre'] = $usuario->Nombre;
                    $_SESSION['Nombre'] = "usuario administrador.";
                    $data = [
                        'mostrar_panel_alta'=> false,
                        'error_tipo'=>'',
                        'error_megas'=>'',
                    ];
                    $this->view('pages/dashboard/admin/panel_admin', $data);
                }else{
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                    </div>',
                    ];
                    $this->view('pages/auth/loginAdministrador',$data);
                }        
            }else{
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                </div>',
                ];
                $this->view('pages/auth/loginAdministrador',$data);
            }
        }
        
        public function enviar_password(){
            $email = $_POST['email'];
            $data = [
                'email' => $email,
            ];
        
        
            if (!empty($this->authModel->buscar_por_mail_recuperar($data))) {
                $where = "new_pass";
                include(RUTA_APP . "/mails/mail_pass.php"); 
            } else {
                $data = [
                    "error_mail"=> "<div class='alert alert-danger' role='alert'>
                                <p class = 'text-center'>El email no existe o es incorrecto.</p>
                            </div>",
                    "mail"=>'',
                ];
                $this->view('pages/auth/forgot-password', $data);
            }
        }

        public function update_pass(){
            $data = [
                'mail' => '',
                'error_mail'=>'',
                'error_pass'=>'',
            ];
            $this->view('pages/auth/updated-password',$data);
        }

        public function actualizar_password(){
            $email = $_POST['email'];
            $passActual =$_POST['pass_actual'];
            $passNueva = $_POST['pass_nueva'];
            $passNueva2 = $_POST['pass_nueva2'];

            if ($passNueva != $passNueva2){
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-danger' role='alert'>
                    <p class = 'text-center'>Las contraseñas no coinciden.</p>
                </div>",
                ];
                $this->view('pages/auth/updated-password',$data);
            }else{
                if($this->authModel->change_pass($passNueva, $email)){
                    $data = [
                        'mail' => '',
                        'error_mail'=>'',
                        'error_pass'=> "<div class='alert alert-success' role='alert'>
                        <p class = 'text-center'>La contraseña fue actualizada</p>
                    </div>",
                    ];
                    $this->view('pages/auth/updated-password',$data);
                }
            }
        }
    }
?>