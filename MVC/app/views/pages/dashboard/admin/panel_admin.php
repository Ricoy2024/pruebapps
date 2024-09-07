<?php require RUTA_APP . "/views/layout/header.php";?>

<h2 class="text-center text-white title-panel">Panel del Administrador</h2>

<div class = "panelbotones">   
    <div class="container ">
        <div class="panelbotones">
            <div class="vertical-menu">
                <br>
                <br>
                <a href="<?php echo RUTA_URL;?>/AuthController/redirectAdminPanel" class="active">MENU</a>
                <a href="<?php echo RUTA_URL;?>/ProfeController/mostrarAgregarProfesor">Agregar profesor</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_alta_clase">Agregar clase</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_calendario_clases">Calendario de clases</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_editar_eliminar_clase">Editar/Eliminar clase</a>
                <a href="<?php echo RUTA_URL;?>/ProfeController/mostrarListarEditarProfesores">Listar/Editar profesores</a>
            </div>

            <div class="d-grid gap-2 col-7 mx-auto">

            <br>
                
            <!-- </div>    
        </div>
    </div>
</div> -->