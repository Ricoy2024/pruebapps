<?php
    class ActivityController extends BaseController{
  
        public function __construct(){
            $this->activityModel=$this->model('ActivityModel');
        }

        //  REDIRECCIÓN A VISTAS

        //REDIRECCIÓN A AGREGAR CLASE EN ADMIN
        public function mostrar_alta_clase() {

            $data = $this->traer_actividades();
            $data2 = $this->traer_dias();
            $data3 = $this->traer_horas();
            $data4 = $this->traer_profesores(); 
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data2, $data3, $data4, $data5);

            // Cargar la vista y pasar los datos necesarios
            $this->view('pages/dashboard/admin/alta_clase', $combinedData);
        }

        
        //REDIRECCIÓN A EDITAR Y ELIMINAR CLASES EN ADMIN
        public function mostrar_editar_eliminar_clase() {

            $allActivities = $this->activityModel->obtener_listado_clases_model();

            $data = [
                'allActivities' => $allActivities
            ];
            
            // Cargar la vista y pasar los datos necesarios
            $this->view('pages/dashboard/admin/editar_eliminar_clase', $data);
        }    

        // REDIRECCIÓN A LA PANTALLA DE EDITAR CLASE (ADMIN)
        public function mostrar_editar_clase($id_clase_seleccionada) {

            $data = $this->traer_actividades();
            $data2 = $this->traer_dias();
            $data3 = $this->traer_horas();
            $data4 = $this->traer_profesores(); 
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            $data6 = [
                'dataclaseseleccionada' => $id_clase_seleccionada
            ];

            $data7 = [
                'id_clase' => $id_clase_seleccionada
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data2, $data3, $data4, $data5, $data6, $data7);

            $this->view('pages/dashboard/admin/editar_clase', $combinedData);
        }

        
        //REDIRECCIÓN A CALENDARIO DE CLASES
        public function mostrar_calendario_clases() {

            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data = [
                'listadeactividades' => $listar_actividades
            ];
            
            $this->view('pages/dashboard/panel_calendario_clases', $data); // Cargar la vista y pasarle los datos
        }


        //REDIRECCIÓN A SECCIÓN AGREGAR Y ELIMINAR CLASE EN SOCIO
        public function mostrar_alta_eliminar_clase(){

            $data = $this->traer_actividades();
            $data2 = $this->traer_dias();
            $data3 = $this->traer_horas();
            $data4 = $this->traer_actividades_anotadas(); 
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data2, $data3, $data4, $data5);

            // Cargar la vista y pasar los datos necesarios
            $this->view('pages/dashboard/socio/alta_eliminar_clase_socio', $combinedData);
        }

        
        //REDIRECCIÓN A SECCIÓN MOSTRAR LISTADO DE CLASES ANOTADAS DEL SOCIO
        public function mostrar_listado_clases(){

            $data = $this->traer_actividades();
            $data2 = $this->traer_dias();
            $data3 = $this->traer_horas();
            $data4 = $this->traer_actividades_anotadas(); 
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data2, $data3, $data4, $data5);

            // Cargar la vista y pasar los datos necesarios
            $this->view('pages/dashboard/socio/listado_clases_subscriptas',$combinedData);
        }


        //REDIRECCIÓN A SECCIÓN FORMULARIO CONSULTAS PARA SOCIOS
        public function mostrar_formulario_consultas(){
            $data = [
                "error_mail" =>'',
                "mail" =>'',
            ];

            $this->view('pages/dashboard/socio/formulario_consulta',$data);
        }


        // REDIRECCIÓN A LA PANTALLA DE ACTIVIDADES PARA SOCIOS
        public function mostrar_actividades(){
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data = [
                'listadeactividades' => $listar_actividades
            ];
            
            $this->view('pages/activities/activities',$data);
        }


        // Función que trae las actividades de la base de datos y las pasa a los dropdowns.
        public function traer_actividades() {
            $activitiesList = $this->activityModel->obtener_lista_actividades_model();
            
            $data = [
                'activitiesList' => $activitiesList
            ];
        
            return $data;
        }


        // Función que trae los días de la base de datos y las pasa a los dropdowns.
        public function traer_dias(){

            $daysList = $this->activityModel->obtener_listado_dias_model();

            $data2 = [
                'daysList' => $daysList
            ];

            return $data2;

        }


        // Función que trae los horarios de la base de datos y las pasa a los dropdowns.
        public function traer_horas() {

            $hoursList = $this->activityModel->obtener_listado_horas_model();

            $data3 = [
                'hoursList' => $hoursList
            ];

            return $data3;
        }


        // Función que trae los profesores de la base de datos y las pasa a los dropdowns.
        public function traer_profesores() {

           $profesoresList = $this->activityModel->traer_profesor_model();

            $data4 = [
                'profesoresList' => $profesoresList
            ]; 

            return $data4;
        }


        public function traer_actividades_anotadas() {

            $activitiesAdded = $this->activityModel->traer_listado_actividades_model();

            $data4 = [
                'activitiesAdded' => $activitiesAdded
            ];

            return $data4;
        }


        public function guardar_clase_anotada() {

            $data = [
                'nombre' => $_POST['nombre'],
                'hora' => $_POST['hora'],
                'dia' => $_POST['dia'],
                'dni' => $_SESSION['Dni']
            ];

            $activitySelected = $this->activityModel->guardar_clase_anotada_model($data);
        
            if ($activitySelected) {
                // Mensaje éxito
                $successMessage = '<div class="alert alert-success" role="alert">
                                        ¡Se ha registrado a la clase exitosamente!
                                    </div>';
                $data['message'] = $successMessage;
            } else {
                // Mensaje error
                $errorMessage = '<div class="alert alert-danger" role="alert">
                                        La clase no existe o ya se ha registrado a esa clase.
                                </div>';
                $data['message'] = $errorMessage;
            }

            //Se vuelve a llamar a estos métodos para cargar datos en los dropdowns (sino aparecen vacíos)
            $data1 = $this->traer_actividades();

            $data2 = $this->traer_dias();

            $data3 = $this->traer_horas();

            $data4 = $this->traer_actividades_anotadas();

            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data1, $data2, $data3, $data4, $data5);

            // Cargar la vista y pasar los datos
            $this->view('pages/dashboard/socio/alta_eliminar_clase_socio', $combinedData);
        }

        
        public function crear_clase_nueva() {
            // Obtener los datos necesarios para los dropdowns
            $data2 = $this->traer_actividades();
            $data3 = $this->traer_dias();
            $data4 = $this->traer_horas();
            $data5 = $this->traer_profesores(); 
            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            // Combinar los datos
            $data6 = [
                'listadeactividades' => $listar_actividades
            ];
        
            // Combinar todos los datos necesarios
            $data = array_merge($data2, $data3, $data4, $data5, $data6);
        
            // Recuperar el ID del profesor seleccionado
            $id_profesor = $_POST['profesor'];
            
            // Recuperar el nombre del profesor desde la lista
            $nombre_profesor = '';
            if (isset($data['profesoresList'])) {
                foreach ($data['profesoresList'] as $profesor) {
                    if ($profesor->id == $id_profesor) {
                        $nombre_profesor = $profesor->nombre;
                        break;
                    }
                }
            }
        
            // Preparar los datos para el modelo
            $formData = [
                'nombre' => $_POST['nombre'],
                'dia' => $_POST['dia'],
                'hora' => $_POST['hora'],
                'nombre_profesor' => $nombre_profesor,
                'id_profesor' => $id_profesor
            ];
        
            // Llamar al método del modelo para crear la nueva clase
            $claseAgregada = $this->activityModel->crear_clase_nueva_model($formData);
            
            if ($claseAgregada) {
                // Mensaje exito
                $successMessage = '<div class="alert alert-success" role="alert">
                                        ¡Se ha registrado la clase exitosamente!
                                    </div>';
                $data['message'] = $successMessage;
            } else {
                // Mensaje error
                $errorMessage = '<div class="alert alert-danger" role="alert">
                                        No se ha podido registrar la clase.
                                </div>';
                $data['message'] = $errorMessage;
            }
        
            // Cargar la vista y pasar los datos combinados
            $this->view('pages/dashboard/admin/alta_clase', $data); 
        }

        
        public function eliminar_actividad_socio($id_clase_seleccionada) {

            $result = $this->activityModel->eliminar_actividad_socio_model($id_clase_seleccionada);

            if ($result) {
                // Mensaje de éxito
                $successMessage = '<div class="alert alert-success" role="alert">
                                        ¡Se ha eliminado a la clase exitosamente!
                                    </div>';
                $data['message'] = $successMessage;
            } else {
                // Mensaje de error
                $errorMessage = '<div class="alert alert-danger" role="alert">
                                        No se ha podido eliminar la clase seleccionada, inténtelo nuevamente.
                                </div>';
                $data['message'] = $errorMessage;
            }
            
            $data1 = $this->traer_actividades();

            $data2 = $this->traer_dias();

            $data3 = $this->traer_horas();

            $data4 = $this->traer_actividades_anotadas();

            $listar_actividades = $this->activityModel->listar_actividades_model();
            
            $data5 = [
                'listadeactividades' => $listar_actividades
            ];

            // Combinar los datos
            $combinedData = array_merge($data, $data1, $data2, $data3, $data4, $data5);

            // Cargar la vista y pasar los datos
            $this->view('pages/dashboard/socio/alta_eliminar_clase_socio', $combinedData);
        }


        public function eliminar_actividad($id_clase_seleccionada) {

            $result = $this->activityModel->eliminar_actividad_model($id_clase_seleccionada);

            $allActivities = $this->activityModel->obtener_listado_clases_model();

            if ($result) {
                // Mensaje exito
                $message = '<div class="alert alert-success" role="alert">
                                        ¡Se ha eliminado la clase exitosamente!
                                    </div>';
            } else {
                // Mensaje error
                $message = '<div class="alert alert-danger" role="alert">
                                        No se ha podido eliminar la clase seleccionada.
                                </div>';
            }

            $data = [
                'allActivities' => $allActivities,
                'message' => $message
            ];


            $this->view('pages/dashboard/admin/editar_eliminar_clase', $data);

        }

        public function editar_clase($id_clase) {

            $data = [
                'id_actividad' => $_POST['nombre'],
                'id_profesor' => $_POST['profesor'],
                'id_clase' => $id_clase
            ];


            $result = $this->activityModel->editar_clase_model($data);

            if ($result) {
                // Mensaje exito
                $message = '<div class="alert alert-success" role="alert">
                                        ¡Se ha editado la clase exitosamente!
                                    </div>';
            } else {
                // Mensaje error
                $message = '<div class="alert alert-danger" role="alert">
                                        No se ha podido editar la clase seleccionada.
                                </div>';
            }

            $allActivities = $this->activityModel->obtener_listado_clases_model();

            $data = [
                'allActivities' => $allActivities,
                'message' => $message
            ];
            
            // Cargar la vista y pasar los datos necesarios
            $this->view('pages/dashboard/admin/editar_eliminar_clase', $data);
        }

    }
?>