                <?php require RUTA_APP . "/views/pages/dashboard/socio/panel_socio.php";?>

                <div class="container col-9">
                        <br>
                        <div class="d-grid gap-2">           
                                <h1 class="title-activities">¡Envíenos su consulta!</h1>
                        </div>

                        <form class="user"  action="<?php echo RUTA_URL;?>/ContactController/enviarconsulta/"
                        method="POST">

                                <div class="text-white">
                                        </br> 
                                        <label for="exampleFormControlInput1" class="form-label">NOMBRE</label>
                                        <input type="text" required class="form-control" name="nombre" id="idnombre" placeholder="Ingrese su nombre"pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}"
                                        title="El nombre solo puede contener letras y espacios, y debe tener al menos 2 caracteres." value="<?php echo $_SESSION['Nombre']; ?>" readonly>
                                </div>

                                <div class="text-white">
                                        </br> 
                                        <label for="exampleFormControlInput1" class="form-label">CORREO ELECTRÓNICO</label>
                                        <input type="email" class="form-control" name="email" id="idemail" placeholder="email@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required
                                        title="El email debe contener @ y terminar con '.com'" value="<?php echo $_SESSION['Email']; ?>" readonly>
                                </div>
                                
                                <div class="text-white">
                                        </br> 
                                        <label for="exampleFormControlTextarea1" class="form-label">CONSULTA</label>
                                        <textarea class="form-control" required placeholder="Ingrese Consulta" id="idmensaje" name="mensaje" rows="3"></textarea>
                                </div>
                                </br> 

                                <button class="btn btn-primary button-input" type="submit">Enviar Consulta</button>

                        </form>

                        <br>

                        <?php if ($data['mail'] != ''){
                        echo $data['mail'];
                        }
                        ?>
                        <?php if ($data['error_mail'] != ''){
                        echo $data['error_mail'];
                        }
                        ?>

                        <br>
                        <br>
                </div>

            </div>    
        </div>
    </div>
</div> 
                

<?php require RUTA_APP . "/views/layout/footer.php";?>