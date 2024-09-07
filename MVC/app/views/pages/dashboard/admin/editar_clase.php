                <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>
                
                <div class="container">
                    <div class="d-grid col-8 mx-auto">           
                        <h1 class="title-activities">Editar clase seleccionada</h1>

                        <div class="container">
                            <div class="row align-items-center">

                                <!-- Primer columna -->
                                <div class="col">
                                    <form class="user" action="<?php echo RUTA_URL;?>/ActivityController/editar_clase/<?php echo $data['id_clase'];?>" method="POST">
                                        <!-- Dropdown Clases -->
                                        <label class="text-white">Clases</label>
                                        <select id="activities-select" class="form-select" name="nombre">
                                            <option value="Select">Selecciona una clase</option>
                                            <?php if(isset($data['activitiesList'])): ?>
                                                <?php foreach ($data['activitiesList'] as $activity): ?>
                                                    <option value="<?php echo htmlspecialchars($activity->id); ?>" data-nombre="<?php echo htmlspecialchars($activity->nombre); ?>">
                                                        <?php echo htmlspecialchars($activity->nombre); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option value="No hay actividades disponibles">No hay actividades disponibles</option>
                                            <?php endif; ?>
                                        </select>

                                        <!-- Dropdown Día -->
                                        <!-- <div id="day-dropdown">
                                            <label class="text-white">Día</label>
                                            <select class="form-select" name="dia">
                                                <option value="Select">Selecciona un día</option>
                                                <?php if(isset($data['daysList'])): ?>
                                                    <?php foreach ($data['daysList'] as $day): ?>
                                                        <option value="<?php echo htmlspecialchars($day->dia); ?>">
                                                            <?php echo htmlspecialchars($day->dia); ?>

                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="No hay días disponibles">No seleccionó una clase</option>
                                                <?php endif; ?>
                                            </select>
                                        </div> -->

                                        <!-- Dropdown Hora -->
                                        <!-- <div id="hour-dropdown">
                                            <label class="text-white">Horario disponible</label>
                                            <select class="form-select" name="hora">
                                                <option value="Select">Selecciona un horario</option>
                                                <?php if(isset($data['hoursList'])): ?>
                                                    <?php foreach ($data['hoursList'] as $hour): ?>
                                                        <option value="<?php echo htmlspecialchars($hour->hora); ?>">
                                                            <?php echo htmlspecialchars($hour->hora); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="Select">No seleccionó un día</option>
                                                <?php endif; ?>
                                            </select>
                                        </div> -->

                                        <!-- Dropdown Profesor  -->
                                        <div id="profesor-dropdown" >
                                            <label class="text-white">Profesores disponibles</label>
                                            <select class="form-select" name="profesor">
                                                <option value="Select">Selecciona un profesor</option>
                                                <?php if(isset($data['profesoresList'])): ?>
                                                    <?php foreach ($data['profesoresList'] as $profesor): ?>
                                                        <option value="<?php echo htmlspecialchars($profesor->id); ?>" data-nombre="<?php echo htmlspecialchars($profesor->nombre . ' ' . $profesor->apellido); ?>">
                                                        <?php echo htmlspecialchars($profesor->nombre . ' ' . $profesor->apellido); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="Select">No seleccionó un profesor</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <br/>

                                            <button id="buttonRegister" type="submit" class="btn btn-user btn-block button-input">
                                                Editar clase
                                            </button>

                                        <div class="mt-3"></div>
                                        <?php
                                            if (isset($data['message'])) {
                                                echo $data['message'];
                                            }
                                        ?>

                                    </form>
                                </div>


                            </div>    
                        </div>
                    </div>
                </div> 

            </div>    
        </div>
    </div>
</div> 
                

<?php require RUTA_APP . "/views/layout/footer.php";?>