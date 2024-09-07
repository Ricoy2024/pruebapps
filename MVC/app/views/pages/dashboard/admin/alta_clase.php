                <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>
                <?php $deshabilitarBoton = true;
                ?>
                
                <div class="container">
                    <div class="d-grid col-8 mx-auto">           
                        <h1 class="title-activities">Registrar nueva clase</h1>

                        <div class="container">
                            <div class="row align-items-center">

                                <!-- Primer columna -->
                                <div class="col">
                                    <form class="user" action="<?php echo RUTA_URL;?>/ActivityController/crear_clase_nueva" method="POST">

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

                                        <!-- Dropdown Profesor  -->
                                        <div id="profesor-dropdown" style="display: none;" >
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

                                            <button id="buttonRegister" <?php if ($deshabilitarBoton) echo 'disabled'; ?> type="submit" class="btn btn-user btn-block button-input">
                                                Crear clase
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

<script>
    // Obtener el dropdown de actividades
    var activitiesSelect = document.getElementById('activities-select');
    // Obtener el dropdown de días
    var dayDropdown = document.getElementById('day-dropdown');
    // Obtener el dropdown de horas
    var hourDropdown = document.getElementById('hour-dropdown');
    // Obtener el dropdown de profesores
    var profesorDropdown = document.getElementById('profesor-dropdown');

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
            // Mostrar el dropdown de profesor
            profesorDropdown.style.display = 'block';
        } else {
            profesorDropdown.style.display = 'none';
        }
    });

    //habilitar y deshabilitar botón Anotarse
    profesorDropdown.addEventListener('change', function() {
    if (this.value !== 'Select') {
        // Mostrar el dropdown de horas
        buttonRegister.disabled = false;
    } else {
        buttonRegister.disabled = true;
    }
    });

</script>
                

<?php require RUTA_APP . "/views/layout/footer.php";?>