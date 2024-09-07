

<header class="header">
    <?php require RUTA_APP .'/views/layout/header.php';?>
</header>

<!-- Br sirve para separar secciones (dejar un espacio en blanco entre cada html) -->
<br/>
<!-- Fin del Br -->

<main class="container">

    <!-- Jumbrotron creado con bs5-jumbotron-fluid -->
    <div class="p-5 mb-4 bg-light rounded-3 spinning-image">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold spinning-text">Clases de Spinning
            </h1>
            <p class="col-md-10 fs-5 spinning-text">
                ¡Descubre el apasionante mundo del Spinning en nuestro gimnasio! 
                Nuestras clases te ofrecen una experiencia intensa y divertida que 
                fortalecerá tu cuerpo y mente.
                ¡Reserva tu clase hoy y comienza tu viaje fitness con nosotros!
            </p>
            <button class="btn btn-lg spinning-button" type="button" >
                <a class="nav-link" href="<?php echo RUTA_URL; ?>/AuthController/login">¡Incríbete Ahora!</a>
            </button>
        </div>
    </div>
    <!-- Fin del jumbotron -->

    <!-- Carrusel -->


    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="First slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="1"
                aria-label="Second slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="2"
                aria-label="Third slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="3"
                aria-label="Four slide"
            ></li>
        </ol>

        <div class="carousel-inner carousel-border-r" role="listbox">
            <div class="carousel-item active">
                <img
                    src="<?php echo RUTA_URL?>/images/Jump3.PNG"
                    class="w-100 h-70 d-block opacity-img"
                    alt="First slide"
                />
                <div class="carousel-caption d-none d-md-block description-photo">
                    <h2 class="fw-600 carousel-title">Body Jump</h2>
                    <h4 class="fw-light carousel-text">Una clase dinámica y divertida que combina ejercicios de cardio con entrenamiento en trampolines. El Body Jump te ofrece una experiencia de ejercicio de bajo impacto que mejora la resistencia cardiovascular, la fuerza y el equilibrio, ¡todo mientras te diviertes saltando!</h4>
                </div>
            </div>

            <div class="carousel-item">
                <img
                    src="<?php echo RUTA_URL?>/images/Yoga.png"
                    class="w-100 h-70 d-block opacity-img"
                    alt="Second slide"
                />
                <div class="carousel-caption d-none d-md-block description-photo">
                    <h2 class="fw-600 carousel-title">Yoga</h2>
                    <h4 class="fw-light carousel-text">Una práctica que une cuerpo, mente y espíritu a través de posturas, respiración y meditación. El yoga te ayuda a mejorar la flexibilidad, la fuerza y el equilibrio, al mismo tiempo que reduce el estrés y promueve la calma interior, dejándote con una sensación de bienestar y serenidad.</h4>
                </div>
            </div>

            <div class="carousel-item">
                <img
                src="<?php echo RUTA_URL?>/images/KickBoxing2.jpg"
                    class="w-100 h-70 d-block opacity-img"
                    alt="Third slide"
                />
                <div class="carousel-caption d-none d-md-block description-photo">
                    <h2 class="fw-600 carousel-title">Kick Boxing</h2>
                    <h4 class="fw-light carousel-text">Una emocionante clase que fusiona técnicas de boxeo y artes marciales. El kickboxing te permite liberar el estrés mientras aprendes golpes y patadas efectivas, mejorando tu fuerza, coordinación y confianza en ti mismo/a.</h4>
                </div>
            </div>

            <div class="carousel-item">
                <img
                src="<?php echo RUTA_URL?>/images/Zumba2.jpg"
                    class="w-100 h-70 d-block opacity-img"
                    alt="Third slide"
                />
                <div class="carousel-caption d-none d-md-block description-photo">
                    <h2 class="fw-600 carousel-title">Zumba</h2>
                    <h4 class="fw-light carousel-text">Únete a las más divertidas clases de zumba, donde el movimiento y el entrenamiento cardio no va a faltar nunca. Imposible aburrirse con las clases más movidas y la mejor música para esta espectacular clase.</h4>
                </div>
            </div>
        </div>

        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    

    <!-- Fin Carrusel -->
    

</main>

<!-- Inicio del Footer -->
<footer>
    <?php require RUTA_APP .'/views/layout/footer.php';?>
</footer>
<!-- Final de Footer -->

