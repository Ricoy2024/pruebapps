<?php
    class Pages extends BaseController{
         
        public function __construct(){
            
        }

        public function index(){
            
            $data = [
                "title" => "Bienvenidos a UNLZ - APPWEB"
            ];
            $this->view('pages/index',$data);
        }

        
   }
   
?>