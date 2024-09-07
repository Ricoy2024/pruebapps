<!-- Navegador de botones que se ven en la parte superior del index -->
<nav class="navbar navbar-expand navbar-light header-bc" style="display:flex; justify-content: space-between;">
   <ul class="nav navbar-nav">
         <li class="nav-item buttons-header">
            <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL; ?>">Inicio</a>
         </li>

         <?php if (isset($_SESSION['Nombre']) && !($_SESSION['Nombre'] == "usuario administrador.")): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL; ?>/AuthController/redirectUserPanel">Panel usuario</a>
            </li>
         <?php endif; ?>

         <?php if (isset($_SESSION['Nombre']) && $_SESSION['Nombre'] == "usuario administrador."): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL; ?>/AuthController/redirectAdminPanel">Panel admin</a>
            </li>
         <?php endif; ?>

         <!-- agregar if para validar cuando el usuario ya esta logeado dejar de mostrarlo -->
         <?php if (!isset($_SESSION['Nombre'])): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL; ?>/AuthController/login">Iniciar sesión</a>
            </li>
         <?php endif; ?>

         <?php if (!isset($_SESSION['Nombre'])): ?>
            <li class="nav-item buttons-header">
                  <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL;?>/ActivityController/mostrar_actividades">Actividades</a>
            </li>
         <?php endif; ?>

         <?php if (!isset($_SESSION['Nombre'])): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL;?>/ProfeController/MuestraProfesores">Profesores</a>
            </li>
       
         <?php endif; ?>

         <?php if (!(isset($_SESSION['Nombre']) && $_SESSION['Nombre'] == "usuario administrador.")): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL;?>/ContactController/muestraContacto">Contacto</a>
            </li> 
         <?php endif; ?> 

         <?php if (isset($_SESSION['Nombre'])): ?>
            <li class="nav-item buttons-header">
               <a class="nav-link active text-buttons-c" href="<?php echo RUTA_URL; ?>/AuthController/endSession">Cerrar sesión</a>
            </li>
         <?php endif; ?>
   </ul>

   <div class="container-text-logo">
      <img
         src="<?php echo RUTA_URL?>/images/IRON GYM.png"
         class="img-fluid rounded"
         alt=""
         style="width: 60px;
         height: 49px;"
      />

      <h3 class="iron-gym-text">Iron Gym Center</h3>
   </div>
</nav>