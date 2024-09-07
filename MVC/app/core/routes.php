<?php
   /*
      Mapear la url ingresada en el navegador,
         1 - controlador
         2 - método
         3 - parámetro
         ej: /articulos/editar/4
   */

   class Routes{
    protected $actualController='pages';
    protected $actualMethod='index';
    protected $param =[];

     /* constructor.*/
     
     public function __construct(){
         //print_r($this->getUrl());
        $url = $this-> getUrl();

        //buscar en controladores si el controlador existe
        if(isset($_GET['url'])){
        if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
            // si existe se setea como controlador por defecto 
            $this->actualController = ucwords($url[0]);

            //unset indice 
            unset($url[0]);
        }
        //requerir el controlador
        require_once '../app/controllers/' . $this->actualController . '.php';
        $this->actualController= new $this->actualController;
      }else{
        require_once '../app/controllers/' . $this->actualController . '.php';
        $this->actualController= new $this->actualController;
      }
        //chequear la segunada parte de la url que seria el metodo
        if(isset($url[1])){
            if(method_exists($this->actualController, $url[1])){
                //chequeamos el metodo
                $this->actualMethod = $url[1];
                //unset indice 
                unset($url[1]);
            }
        }
        //para probar traer metodo
        //echo $this->actualMethod;

        //obtener los posibles params

        $this->params= $url ? array_values($url) : [];


        //llamar callback con params
        call_user_func_array([$this->actualController, $this->actualMethod],  $this->params);


    }

    public function getUrl(){
        //echo $_GET['url'];
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/' , $url);
            return $url;
        }
        
    }

}

?>