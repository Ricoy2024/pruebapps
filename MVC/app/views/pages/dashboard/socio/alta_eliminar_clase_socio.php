                <?php require RUTA_APP . "/views/pages/dashboard/socio/panel_socio.php";?>

                <?php $deshabilitarBoton = true;
                ?>


                <div class="container">
                    <br>
                    <!-- <h1 class="title-activities">¡Anotarse en las clases!</h1> -->
                    <div class="row align-items-center">
                        <h1 class="title-activities">¡Anotarse en las clases!</h1>

                        <form class="user" action="<?php echo RUTA_URL;?>/ActivityController/guardar_clase_anotada" method="POST">

                            <!-- Dropdown Clases -->
                            <label class="text-white">Clases</label>
                            <select id="activities-select" class="form-select" name="nombre">
                                <option value="Select">Selecciona una clase</option>
                                <?php if(isset($data['activitiesList'])): ?>
                                    <?php foreach ($data['activitiesList'] as $activity): ?>
                                        <option value="<?php echo htmlspecialchars($activity->nombre); ?>">
                                            <?php echo htmlspecialchars($activity->nombre); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="No hay actividades disponibles">No hay actividades disponibles</option>
                                <?php endif; ?>
                            </select>

                            <!-- Dropdown Día -->
                            <div id="day-dropdown" style="display: none;" >
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
                            </div>

                            <!-- Dropdown Hora -->
                            <div id="hour-dropdown" style="display: none;" >
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
                            </div>

                            <br/>

                                <button id="buttonRegister" <?php if ($deshabilitarBoton) echo 'disabled'; ?> type="submit" class="btn btn-user btn-block button-input">
                                    Anotarse
                                </button>

                            <div class="mt-3"></div>
                            <?php
                                if (isset($data['message'])) {
                                    echo $data['message'];
                                }
                            ?>

                        </form>

                        <h1 class="title-activities">Actividades anotadas</h1>

                            <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                                    <thead>
                                        <tr>
                                            <th>Clase</th>
                                            <th>Día</th>
                                            <th>Hora</th>
                                            <th class="text-align-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <?php if(isset($data['activitiesAdded']) && !empty($data['activitiesAdded'])): ?>

                                        <?php foreach ($data['activitiesAdded'] as $activitiesAdded): ?> 
                                        <tbody> 
                                            <tr>
                                                <td class="align-center" scope="row"><?php echo htmlspecialchars($activitiesAdded->nombre); ?></td>
                                                <td class="align-center"><?php echo htmlspecialchars($activitiesAdded->dia); ?></td>
                                                <td class="align-center"><?php echo htmlspecialchars($activitiesAdded->hora); ?></td>
                                                <td class="text-align-center">
                                                    <a href="<?php echo RUTA_URL;?>/ActivityController/eliminar_actividad_socio/<?php echo $activitiesAdded->id; ?>">    
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php endforeach; ?>

                                    <?php else: ?>
                                        <td value="No hay actividades disponibles">Aún no se ha anotado a ninguna actividad.</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    <?php endif; ?>
                                </table>                              

                        <h1 class="title-activities">Actividades semanales</h1>

                        <div style="color: white;">
                            <?php if(!empty($data['listadeactividades'])): ?>

                                <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                                    <thead>
                                        <tr>
                                            <th>Horario</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th> 
                                        </tr>
                                    </thead>
                                
                                    <?php foreach($data['listadeactividades'] as $actividad): ?>
                                
                                    <tbody>
                                        <tr>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->hora ) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->lunes ) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->martes ) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->miercoles ) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->Jueves ) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->Viernes) ?></td>
                                            <td scope="row"><?php echo htmlspecialchars($actividad->Sabado ) ?></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>

                            <?php else: ?>
                                <p></p>
                            <?php endif; ?>
                        </div>  
                    
                    </div>
                </div>

                <br>

            </div>    
        </div>
    </div>
</div> 

<script>
    // Obtener el dropdown de actividades
    var activitiesSelect = document.getElementById('activities-select');
    // Obtener el dropdown de días
    var dayDropdown = document.getElementById('day-dropdown');
    // Obtener el dropdown de horas
    var hourDropdown = document.getElementById('hour-dropdown');

    // Agregar un listener para el cambio en el dropdown de actividades
    activitiesSelect.addEventListener('change', function() {
        // Si se selecciona una actividad válida
        if (this.value !== 'Select') {
            // Mostrar el dropdown de días
            dayDropdown.style.display = 'block';
        } else {
            // Ocultar el dropdown de días y horas si no se selecciona una actividad válida
            dayDropdown.style.display = 'none';
            hourDropdown.style.display = 'none';
        }
    });

    //mostrar el dropdown de horas después de seleccionar un día
    dayDropdown.addEventListener('change', function() {
        if (this.value !== 'Select') {
            // Mostrar el dropdown de horas
            hourDropdown.style.display = 'block';
        } else {
            hourDropdown.style.display = 'none';
        }
    });

    //habilitar y deshabilitar botón Anotarse
    hourDropdown.addEventListener('change', function() {
        if (this.value !== 'Select') {
            // Mostrar el dropdown de horas
            buttonRegister.disabled = false;
        } else {
            buttonRegister.disabled = true;
        }
    });

</script>
                

<?php require RUTA_APP . "/views/layout/footer.php";?>