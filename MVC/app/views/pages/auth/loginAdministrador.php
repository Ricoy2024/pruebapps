<?php require RUTA_APP ."/views/layout/header.php";?>

<div class="container ">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-loginadministrador-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Ingresar como Administrador</h1>
                                </div>
                                <form class="user" action="<?php echo RUTA_URL; ?>/AuthController/loginadmin/"
                                    method="POST">
                                    <div class="form-group">
                                        <input name="dni" type="text" class="form-control form-control-user input-margin"
                                            id="exampleInputDni" aria-describedby="dniHelp" placeholder="DNI" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="contraseña" type="password" class="form-control form-control-user input-margin"
                                            id="exampleInputPassword" placeholder="Contraseña" required>
                                    </div>
                                    <div class="form-group small">
                                        <input type="checkbox" id="showPassword" onclick="togglePassword()"> 
                                        <label for="showPassword">Mostrar contraseña</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input input-margin" id="customCheck">
                                            <label class="custom-control-label" for="customCheck" require>Recordame</label>
                                        </div>
                                    </div>
                                    <?php 
                                        if ($data['error_login']!=''){
                                            echo $data['error_login'];
                                        }
                                    ?>
                                    <button type="submit" class="btn btn-user btn-block button-input">
                                        Entrar
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="medium blue-text" href="<?php echo RUTA_URL;?>/AuthController/resetPassword">Olvidé
                                        mi contraseña</a>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<!-- solo numeros en el DNI -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputDni = document.getElementById("exampleInputDni");
        inputDni.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, "");
        });
    });

    // función para que muestre la contraseña ingresada
    function togglePassword() {
        var passwordField = document.getElementById("exampleInputPassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
    
    <?php require RUTA_APP . "/views/layout/footer.php";?>