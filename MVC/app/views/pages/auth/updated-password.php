<?php require RUTA_APP . "/views/layout/header.php";?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                    <div class="col-lg-6 d-none d-lg-block image-updatePass"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Restablecer contraseña</h1>

                                </div>
                                <form class="user" action="<?php echo RUTA_URL;?>/AuthController/actualizar_password/"
                                    method="POST">
                                    <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user input-margin input-shadow"
                                            id="exampleInputEmail" placeholder="Tu email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required
                                            title="El email debe contener @ y terminar con '.com'">
                                        <input name="pass_actual" type="password" required
                                            class="form-control form-control-user mt-2 input-shadow" id="exampleInputEmail"
                                            aria-describedby="emailHelp" placeholder="Contraseña actual">
                                        <input name="pass_nueva" type="password" class="form-control form-control-user mt-2 input-shadow"
                                            id="exampleInputPassword" placeholder="Nueva contraseña" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,12}$"
                                            title="La contraseña debe tener entre 8 y 12 caracteres y contener al menos una letra y un número.">
                                        <input name="pass_nueva2" type="password"
                                            class="form-control form-control-user mt-2 input-shadow" id="exampleInputEmail2"
                                            aria-describedby="emailHelp" placeholder="Repetir contraseña nueva" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,12}$"
                                            title="La contraseña debe tener entre 8 y 12 caracteres y contener al menos una letra y un número.">
                                    </div>
                                    <br>
                                    <?php
                                        if ($data['error_pass']!=''){
                                            echo $data['error_pass'];
                                        }
                                    ?>
                                    <div style="margin-bottom: 10px;"></div>
                                    <button type="submit" class="btn btn-user btn-block button-input">
                                        Aplicar
                                    </button>
                                    <hr>
                                    <div class="text-center mb-2">
                                        <a class="medium blue-text" href="<?php echo RUTA_URL;?>/AuthController/login">Iniciar sesión</a>
                                    </div>
                                </form>
                            
                                <?php if ($data['mail'] != ''){
                                    echo $data['mail'];
                                }
                                ?>
                                <?php if ($data['error_mail'] != ''){
                                    echo $data['error_mail'];
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php require RUTA_APP . "/views/layout/footer.php";?>
<!-- Ruta de Update Password
 http://localhost/UNLZ-APPWEB-1C-2024/Grupo-1/MVC/AuthController/update_pass/ -->
