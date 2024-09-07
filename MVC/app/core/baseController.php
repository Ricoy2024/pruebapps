<?php 
   //Clase controlador principal
   // Se encarga de poder cargar los models y views

   class BaseController{

      //Cargar model

      public function model($model){
         //carga
         require_once '../app/models/'. $model.'.php';
         // instanciar el model
         return new $model();
      }
      // Cargar view 
      public function view($view, $data =[]){
         //chequear si existe el archivo view
         if (file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
         }else{
            //Si el archivo de la vista no existe
            die("La vista no existe");
         }
         
      }

      // public function mails($mail){
      //    //carga
      //    require_once '../app/mails/'.$mail.'.php';
      //    // instanciar el model
      //    return new $mail();
      // }

   }
?>