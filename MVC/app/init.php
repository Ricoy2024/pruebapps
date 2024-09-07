<?php
  // se cargan las librerías
  require_once 'config/config.php';

  //require_once "lib/Base.php";
  //require_once "lib/Controller.php";
  //require_once "lib/Core.php";

  // Cargando helpers
  require_once 'helpers/password_creator.php';


  // autoload php

  spl_autoload_register(function($className){
    require_once 'core/'.$className.'.php';
  });

?>