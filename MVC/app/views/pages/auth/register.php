<?php require RUTA_APP . "/views/layout/header.php";?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea tu cuenta</h1>
                            </div>

                            <form class="user" action="<?php echo RUTA_URL; ?>/AuthController/registrarUsuario/"
                                method="POST" enctype="multipart/form-data" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="nombre" type="text" class="form-control form-control-user input-shadow"
                                            id="exampleFirstName" placeholder="Nombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}"
                                            title="El nombre solo puede contener letras y espacios, y debe tener al menos 2 caracteres.">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="apellido" type="text" class="form-control form-control-user input-margin"
                                            id="exampleLastName" placeholder="Apellido" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}"
                                            title="El apellido solo puede contener letras y espacios, y debe tener al menos 2 caracteres.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user input-margin"
                                        id="exampleInputEmail" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required
                                        title="El email debe contener @ y terminar con '.com'">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" id="exampleDNI" name="dni" pattern="[0-9]{8}" required
                                            class="form-control form-control-user input-margin" placeholder="DNI" 
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="El número de DNI debe contener 8 números."/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="exampleCellphone" name="celular" pattern="11[0-9]{8}" required
                                            class="form-control form-control-user input-margin" placeholder="Celular. Ejemplo: 1140406060" 
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="El número de teléfono debe comenzar con '11' y tener un total de 10 dígitos"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="contrasena" type="password" class="form-control form-control-user input-shadow"
                                            id="exampleInputPassword" placeholder="Contraseña" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,12}$"
                                            title="La contraseña debe tener entre 8 y 12 caracteres y contener al menos una letra y un número.">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="contrasena2" type="password" class="form-control form-control-user input-margin"
                                            id="exampleRepeatPassword" placeholder="Repetir contraseña" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,12}$"
                                            title="La contraseña debe tener entre 8 y 12 caracteres y contener al menos una letra y un número.">
                                    </div>
                                </div>
                                <?php 
                                    if ($data['error_pass']!=''){
                                        echo $data['error_pass'];
                                    }
                                ?>
                                <?php
                                    if (isset($_SESSION['success'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                                        unset($_SESSION['success']);
                                    }
                                ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block button-input">
                                    Crear usuario
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="medium blue-text" href="<?php echo RUTA_URL;?>/AuthController/resetPassword">Olvidé mi contraseña</a>
                            </div>
                            <div class="text-center">
                                <a class="medium blue-text" href="<?php echo RUTA_URL;?>/AuthController/login">Ya tenés cuenta?
                                    Ingresá</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // solo numeros en el DNI
        var dniInput = document.getElementById("exampleDNI");
        dniInput.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, "");
        });

        // solo numeros en el Celular
        var cellphoneInput = document.getElementById("exampleCellphone");
        cellphoneInput.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, "");
        });
    });
</script>
<?php require RUTA_APP . "/views/layout/footer.php";?>