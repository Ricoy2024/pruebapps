<?php require RUTA_APP . "/views/layout/header.php";?>

<h2 class="text-center text-white title-panel">Bienvenido/a <?php echo $_SESSION['Nombre']; ?> al panel del socio</h2>

<div class = "panelbotones">   
    <div class="container ">
        <div class="panelbotones">
            <div class="vertical-menu">
                <br>
                <br>
                <a href="<?php echo RUTA_URL;?>/AuthController/redirectUserPanel" class="active">MENU</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_alta_eliminar_clase">Anotarse o eliminar actividad</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_calendario_clases">Calendario clases</a>
                <a href="<?php echo RUTA_URL;?>/ProfeController/MuestraPanelProfesoresSocio">Panel profesores</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_listado_clases">Mis actividades</a>
                <a href="<?php echo RUTA_URL;?>/ActivityController/mostrar_formulario_consultas">Consultas</a>
            </div>

            <div class="d-grid gap-2 col-7 mx-auto">
                
            <!-- </div>    
        </div>
    </div>
</div> -->