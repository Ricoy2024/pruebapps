

                <?php require RUTA_APP . "/views/pages/dashboard/socio/panel_socio.php";?>

                <div class="container w-110">
                    <br>
                    <h1 class="title-activities">¡Conocé algunos de nuestros profes!</h1>

                    <div class="warpper">
                        <input class="radio" id="one" name="group" type="radio" checked>
                        <input class="radio" id="two" name="group" type="radio">
                        <input class="radio" id="three" name="group" type="radio">
                        <input class="radio" id="four" name="group" type="radio">
                        <input class="radio" id="five" name="group" type="radio">
                        <input class="radio" id="six" name="group" type="radio">

                        <div class="tabs">
                            <label class="tab" id="one-tab" for="one">Julián</label>
                            <label class="tab" id="two-tab" for="two">Agustina</label>
                            <label class="tab" id="three-tab" for="three">Clara</label>
                            <label class="tab" id="four-tab" for="four">Sebastián</label>
                            <label class="tab" id="five-tab" for="five">Guadalupe</label>
                            <label class="tab" id="six-tab" for="six">Federico</label>
                        </div>

                        <!-- Aca se muestran los paneles con la foto y la descripción del profesor -->
                        <div class="container text-center panels">

                        <!-- Primer panel : Julian -->
                            <div class="panel" id="one-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                            src="<?php echo RUTA_URL?>/images/Julian.png"
                                            class="img-fluid rounded"
                                            alt=""
                                        />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                            Julián
                                        </div>

                                        <div class="description">
                                            <p >Un maestro en CrossFit y Kickboxing, Julián te guiará a través de entrenamientos desafiantes que te ayudarán a alcanzar tus metas de fuerza y ​​condición física.</p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesor de crossfit y kick boxing</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Segundo panel: Agustina -->

                            <div class="panel" id="two-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                            src="<?php echo RUTA_URL?>/images/Agustina.jpg"
                                            class="img-fluid rounded"
                                            alt=""
                                        />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                        Agustina
                                        </div>

                                        <div class="description">
                                            <p>Con Agustina, encontrarás paz y energía en cada clase de Yoga y Spinning. 
                                                Sus enseñanzas te ayudarán a encontrar equilibrio y mejorar tu bienestar general.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesora de yoga y spinning </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tercer panel: Clara -->

                            <div class="panel" id="three-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                            src="<?php echo RUTA_URL?>/images/Clara.jpg"
                                            class="img-fluid rounded"
                                            alt=""
                                        />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                        Clara
                                        </div>

                                        <div class="description">
                                            <p>¿Quieres tonificar y divertirte al mismo tiempo? 
                                                ¡Clara es tu respuesta! Como profesora de Pilates y Zumba, te llevará en un viaje hacia una mejor salud y vitalidad.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesora de pilates y zumba</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Cuarto panel: Sebastian -->

                            <div class="panel" id="four-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                        src="<?php echo RUTA_URL?>/images/Sebastian.jpg"
                                        class="img-fluid rounded"
                                        alt=""
                                    />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                            Sebastián
                                        </div>

                                        <div class="description">
                                            <p>¿Listo para elevar tu entrenamiento? 
                                                Sebastián es experto en Body Jump y CrossFit, combinando intensidad y diversión para desafiar tus límites.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesor de Body Jump y Crossfit</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Quinto panel: Guadalupe -->

                            <div class="panel" id="five-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                        src="<?php echo RUTA_URL?>/images/Guadalupe.jpg"
                                        class="img-fluid rounded trainer-pic"
                                        alt=""
                                    />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                            Guadalupe
                                        </div>

                                        <div class="description">
                                            <p>Encuentra tu ritmo con Guadalupe, nuestra profesora de Zumba y Yoga. 
                                                Sus clases son una experiencia única que te dejará sintiéndote revitalizado y 
                                                lleno de energía positiva.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesora de zumba y yoga</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Sexto panel: Federico -->

                            <div class="panel" id="six-panel">
                                <div class="row">
                                    <div class="col-6 ">                    
                                        <img
                                        src="<?php echo RUTA_URL?>/images/Federico.jpg"
                                        class="img-fluid rounded"
                                        alt=""
                                    />
                                    </div>

                                    <div class="col-6 ">
                                        <div class="panel-title">
                                        Federico
                                        </div>

                                        <div class="description">
                                            <p>Con Federico, el Spinning y el Kickboxing se convierten en una experiencia emocionante y efectiva. 
                                                Prepárate para sudar y superar tus límites con su guía experta.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="small">Profesor de spinning y kick boxing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deja un espacio -->
                    <br/>

                    <container>
                        <h2 class="title-activities">Únete a nosotros, donde nuestro equipo está listo para inspirarte, 
                        motivarte y guiarte en cada paso de tu viaje fitness. ¡Te esperamos!</h2>
                    </container>
                </div>

            </div>
        </div>
    </div>
</div>

<?php require RUTA_APP . "/views/layout/footer.php";?>