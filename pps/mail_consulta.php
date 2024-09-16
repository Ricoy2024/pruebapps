<?php include('public/view/layout/header.php') ?>
    <!-- php mailer-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="section-1b">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="container">
                    <div
                     class="text-center">Dejanos tu consulta
                    </div>
                    <hr>
                    <form action="php_mailer_consulta.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="correo@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto" style="margin-bottom: 2rem;">
                            <button type="submit" class="btn btn-outline-success ">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section>

    </section>


</body>
  <!-- scrip php mailer-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<?php include('public/view/layout/footer.php') ?>