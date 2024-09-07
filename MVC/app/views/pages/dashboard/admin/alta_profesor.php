
                <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>

                
                <div class="container gap-5 text-white form-alta-prof"> 
                    <form class="user form-alta-pd" action="<?php echo RUTA_URL; ?>/ProfeController/AltaProfesor/"
                    method="POST" enctype="multipart/form-data">

                        <h3 class="bg-title">Agregar profesor</h3>

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input required type="text"
                                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre" value="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}"
                                title="El nombre solo puede contener letras y espacios, y debe tener al menos 2 caracteres.">
                        </div>
                        
                        <div class="form-group text-white">
                            <label for="">Apellido</label>
                            <input required type="text"
                                class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Apellido" value="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}"
                                title="El apellido solo puede contener letras y espacios, y debe tener al menos 2 caracteres.">
                        </div>

                        <div class="form-group text-white">
                            <label for="">Dni</label>
                            <input  required type="text"
                                class="form-control" name="dni" pattern="[0-9]{8}" id="dni" aria-describedby="helpId" placeholder="Dni" value="" title="El número de DNI debe contener 8 números.">
                        </div>

                        <div class="form-group text-white">
                            <label for="">Email</label>
                            <input required type="text"
                                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email" value="" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
                                title="El email debe contener @ y terminar con '.com'">
                        </div>

                        <div class="form-group text-white">
                            <label for="">Foto perfil</label>
                            <input required name="avatar" class="form-control" type="file" id="formFile">
                        </div>

                        <div class="form-group text-white">
                            <label for="">Celular</label>
                            <input required type="text"
                                class="form-control" name="celular" id="celular" aria-describedby="helpId" pattern="11[0-9]{8}" placeholder="Celular. Ejemplo: 1140406060" value=""
                                title="El número de teléfono debe comenzar con '11' y tener un total de 10 dígitos">
                        </div>

                        <br>

                        <?php
                            if ($data['error_message']){
                                echo $data['error_message'];
                            }
                            else {
                                echo $data['success_message'];
                            }
                        ?>

                        <?php
                            if ($data['error_tipo']!=''){
                                echo $data['error_tipo'];
                            }
                        ?>
                        <?php 
                            if ($data['error_megas']!=''){
                                echo $data['error_megas'];
                            }
                        ?>

                        <button type="submit" class="btn btn-primary btn-user btn-block button-input">
                            Agregar profesor
                        </button>
                        
                    </form>

                    <br>
                    <br>
                </div> 


            </div>    
        </div>
    </div>
</div> 
                

<?php require RUTA_APP . "/views/layout/footer.php";?>