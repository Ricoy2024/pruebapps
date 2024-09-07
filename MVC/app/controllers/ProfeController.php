<?php
    class ProfeController extends BaseController{
        private $profeModel;

        // CONSTRUCTOR
        public function __construct(){
            $this->profeModel=$this->model('ProfeModel');
        }


        // REDIRECCION A VISTAS

        public function mostrarListarEditarProfesores(){
            // Obtener el listado de profesores desde el modelo
            $listaDeProfesores = $this->profeModel->listarprofesores();
            
            $data = [
                'listaDeProfesores' => $listaDeProfesores, // Pasar el listado a la vista
                'mostrar_panel_alta'=> false,
                'error_tipo'=>'',
                'error_megas'=>'',
            ];
        
            $this->view('pages/dashboard/admin/listar_editar_profesor', $data); // Cargar la vista y pasarle los datos
        }

        public function mostrarAgregarProfesor() {

            $data = [
                'mostrar_panel_alta'=> true,
                'error_message'=>'',
                'success_message'=>'',
                'error_tipo'=>'',
                'error_megas'=>'',

            ];
            $this->view('pages/dashboard/admin/alta_profesor',$data);
        }

        //--------------------------------------------------------------------

         // Función que llama a profesores y redirecciona es el que esta hardcode.
        public function MuestraProfesores(){
            
            $this->view('pages/dashboard/panel_profesores');
        }

        public function MuestraPanelProfesoresSocio(){
            
            $this->view('pages/dashboard/socio/panel_profesores_socio');
        }
        
        public function showEditarProfe($id_profe) {

            $profesor = $this->profeModel->profeById($id_profe);

            $data = [
                'error_message'=>'',
                'success_message'=>'',
                'error_tipo'=>'',
                'error_megas'=>'',
                'dataprofesor' => $profesor // Pasar el listado a la vista
            ];

            $this->view('pages/dashboard/admin/editar_profesor', $data);
        }

        // se comento el borrar profe 
        // public function eliminarProfe($id) {
        //    $result=  $this->profeModel->deleteProfe($id);

        //    if ($result) {
        //     // Si la eliminación fue exitosa, definir mensaje de éxito
        //     $successMessage = '<div class="alert alert-success" role="alert">
        //                             ¡Se ha eliminado el profesor exitosamente!
        //                         </div>';
        //     $data['message'] = $successMessage;
        // } else {
        //     // Si hubo un error, definir mensaje de error
        //     $errorMessage = '<div class="alert alert-danger" role="alert">
        //                             No se ha podido eliminar el profe seleccionado, inténtelo nuevamente.
        //                     </div>';
        //     $data['message'] = $errorMessage;
        // }
        //        // Obtener el listado de profesores desde el modelo
        //        $listaDeProfesores = $this->profeModel->listarprofesores();
            
        //        $data2 = [
        //            'listaDeProfesores' => $listaDeProfesores // Pasar el listado a la vista
        //        ];

        //        $this->view('pages/dashboard/admin/panel_admin', $data,$data2); // Cargar la vista y pasarle los datos

        // }

        public function EditarProfe($id_profe) {
            $avatar = $_FILES['avatar']['name'];

            if (!empty($avatar)) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $celular = $_POST['celular'];
                $avatar = $_FILES['avatar']['name'];
                $image_type = $_FILES['avatar']['type'];
                $image_size = $_FILES['avatar']['size'];
                $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;
                
                $data= [
                    'id' => $id_profe,
                    'nombre' => $nombre,
                    'apellido' =>$apellido,
                    'dni' => $dni,
                    'email' => $email,
                    'avatar' => $avatar,
                    'celular' => $celular,
                ];

                if ($avatar != ''){
                    if($image_size <= 10000000){
                        if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
                            move_uploaded_file($_FILES['avatar']['tmp_name'], $ubi . $avatar);
                        }else{
                            $result2 = $this->profeModel->DataProfesorModel($data);
                            $data = [
                                'error_tipo' => '<div class="alert alert-danger" role="alert">
                                El tipo de imagen debe ser jpg, jpeg o png.
                                </div>',
                                'mostrar_panel_alta'=> true,
                                'error_megas'=>'',
                                'success_message'=>'',
                                'error_message' =>'',
                                'dataprofesor' => $result2
                            ];
                            $this->view('pages/dashboard/admin/editar_profesor',$data);
                        }
                    }else{
                        $result2 = $this->profeModel->DataProfesorModel($data);
                        $data = [
                            'error_megas' => '<div class="alert alert-danger" role="alert">
                            El tamaño de la imagen es demasiado grande
                            </div>',
                            'mostrar_panel_alta'=> true,
                            'error_tipo'=>'',
                            'success_message'=>'',
                            'error_message' =>'',
                            'dataprofesor' => $result2
                        ];
                        $this->view('pages/dashboard/admin/editar_profesor',$data);
                    }
    
                }
                
                $result = $this->profeModel->ValidarMailProfesor($data);

                if($result) {
                    $result2 = $this->profeModel->DataProfesorModel($data);
                    $data2 = [
                        'error_message' => '<div class="alert alert-danger" role="alert">
                                                El email o DNI ya se encuentra registrado.
                                            </div>',
                        'mostrar_panel_alta'=> true,
                        'success_message'=>'',
                        'error_tipo'=>'',
                        'error_megas'=>'',
                        'dataprofesor' => $result2
                        
                    ];
                    $this->view('pages/dashboard/admin/editar_profesor', $data2);    
                }


                $result = $this->profeModel->EditarProfeAvatarModel($data);

                if (!$result){
                    $result2 = $this->profeModel->DataProfesorModel($data);
                    $data = [
                        'error_message' => '<div class="alert alert-danger" role="alert">
                                                Hubo un error al editar el profesor.
                                            </div>',
                        'success_message'=>'',
                        'error_tipo'=>'',
                        'error_megas'=>'',
                        'dataprofesor' => $result2 // Pasar el listado a la vista
                    ];
                    $this->view('pages/dashboard/admin/editar_profesor', $data);
                }
                else {
                            $data = [
                            'error_message'=>'',
                            'error_tipo'=>'',
                            'error_megas'=>'',
                            'success_message' => '<div class="alert alert-success" role="alert">
                                                    EDITADO EXITOSO.
                                                </div>',
                            'dataprofesor' => $result // Pasar el listado a la vista
                        ];
                    $this->view('pages/dashboard/admin/editar_profesor', $data);
                }

            }


            else {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $celular = $_POST['celular'];

                $data= [
                    'id' => $id_profe,
                    'nombre' => $nombre,
                    'apellido' =>$apellido,
                    'dni' => $dni,
                    'email' => $email,
                    //'avatar' => $avatar,
                    'celular' => $celular,
                ];

                $result = $this->profeModel->ValidarMailProfesor($data);

                if ($result){
                    $result2 = $this->profeModel->DataProfesorModel($data);
                    $data2 = [
                        'error_message' => '<div class="alert alert-danger" role="alert">
                                                El email o DNI ya se encuentra registrado.
                                            </div>',
                        'mostrar_panel_alta'=> true,
                        'success_message'=>'',
                        'error_tipo'=>'',
                        'error_megas'=>'',
                        'dataprofesor' => $result2
                        
                    ];
                    $this->view('pages/dashboard/admin/editar_profesor',$data2);    
                }

                $result = $this->profeModel->EditarProfeModel($data);

                if (!$result){
                    $result2 = $this->profeModel->DataProfesorModel($data);
                    $data2 = [
                        'error_message' => '<div class="alert alert-danger" role="alert">
                                                Hubo un error al editar el profesor.
                                            </div>',
                        'success_message'=>'',
                        'error_tipo'=>'',
                        'error_megas'=>'',
                        'dataprofesor' => $result2 // Pasar el listado a la vista
                    ];
                    $this->view('pages/dashboard/admin/editar_profesor', $data2);
                }
                else 
                    {
                        $data2 = [
                            'error_message'=>'',
                            'error_tipo'=>'',
                            'error_megas'=>'',
                            'success_message' => '<div class="alert alert-success" role="alert">
                                                    EDITADO EXITOSO.
                                                </div>',
                            'dataprofesor' => $result // Pasar el listado a la vista
                    ];
                    $this->view('pages/dashboard/admin/editar_profesor', $data2);
                }
            }
        }

    public function AltaProfesor() {

        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $avatar = $_FILES['avatar']['name'];
            $image_type = $_FILES['avatar']['type'];
            $image_size = $_FILES['avatar']['size'];
            $celular = $_POST['celular'];
            $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;

            if ($avatar != ''){
                if($image_size <= 10000000){
                    if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $ubi . $avatar);
                    }else{
                        $data = [
                            'error_tipo' => '<div class="alert alert-danger" role="alert">
                            El tipo de imagen debe ser jpg, jpeg o png.
                            </div>',
                            'mostrar_panel_alta'=> true,
                            'error_megas'=>'',
                            'success_message'=>'',
                            'error_message' =>'',

                        ];
                        $this->view('pages/dashboard/admin/alta_profesor',$data);
                    }
                }else{
                    $data = [
                        'error_megas' => '<div class="alert alert-danger" role="alert">
                        El tamaño de la imagen es demasiado grande
                        </div>',
                        'mostrar_panel_alta'=> true,
                        'error_tipo'=>'',
                        'success_message'=>'',
                        'error_message' =>'',
                    ];
                    $this->view('pages/dashboard/admin/alta_profesor',$data);
                }

            }else{
                $avatar ='img_default.png';
            }

            $data= [
                'nombre' => $nombre,
                'apellido' =>$apellido,
                'dni' => $dni,
                'email' => $email,
                'avatar' => $avatar,
                'celular' => $celular,
            ];

            $result = $this->profeModel->BuscarPorMailProfesor($data);

            if($result) {
                $data2 = [
                    'error_message' => '<div class="alert alert-danger" role="alert">
                                            El email ya se encuentra registrado.
                                        </div>',
                    'mostrar_panel_alta'=> true,
                    'success_message'=>'',
                    'error_tipo'=>'',
                    'error_megas'=>'',

                ];
                $this->view('pages/dashboard/admin/alta_profesor',$data2);    
            }

            $result = $this->profeModel->BuscarPorDniProfesor($data);

            if($result) {
                $data2 = [
                    'error_message' => '<div class="alert alert-danger" role="alert">
                                            El DNI ya se encuentra registrado.
                                        </div>',
                    'mostrar_panel_alta'=> true,
                    'success_message'=>'',
                    'error_tipo'=>'',
                    'error_megas'=>'',

                ];
                $this->view('pages/dashboard/admin/alta_profesor',$data2);    
            }            

            $result = $this->profeModel->AltaProfesorModel($data);

            if (!$result){
                $data2 = [
                    'error_message' => '<div class="alert alert-danger" role="alert">
                                            Hubo un error al crear el profesor.
                                        </div>',
                    'mostrar_panel_alta'=> true,
                    'success_message'=>'',
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    
                ];
                $this->view('pages/dashboard/admin/alta_profesor',$data2);
            }
            else {
                $data2 = [
                    'error_message'=>'',
                    'mostrar_panel_alta'=> true,
                    'success_message' => '<div class="alert alert-success" role="alert">
                                            Agregado EXITOSO.
                                        </div>',
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    'dataprofesor' => $result // Pasar el listado a la vista
                ];
                $this->view('pages/dashboard/admin/alta_profesor',$data2);
            }
        }
    }
}
?>