                <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>

                <div class="col text-white">
                    <h1 class="title-activities">Editar/Eliminar clases</h1>

                    <br>
                    <?php
                        if (isset($data['message'])){
                            echo $data['message'];
                        }
                    ?>
                    <br>

                    <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Día</th>
                                <th>Hora</th>
                                <th>Profesor</th>
                                <th class="text-align-center">Acciones</th>
                            </tr>
                        </thead>
                        <?php foreach ($data['allActivities'] as $actividad): ?> 
                        <tbody> 
                            <tr>
                                <td class="align-center" scope="row"><?php echo htmlspecialchars($actividad->actividad_nombre); ?></td>
                                <td class="align-center"><?php echo htmlspecialchars($actividad->dia); ?></td>
                                <td class="align-center"><?php echo htmlspecialchars($actividad->hora); ?></td>
                                <td class="align-center"><?php echo htmlspecialchars($actividad->profesor_nombre . ' ' . $actividad->profesor_apellido); ?></td>
                                <td class="text-align-center">
                                    <a style="color: transparent;" href="<?php echo RUTA_URL;?>/ActivityController/mostrar_editar_clase/<?php echo $actividad->id;?>">    
                                        <button class="btn btn-success btn-sm btn-edit" >Editar</button>
                                    </a>
                                    <a style="color: transparent;" href="<?php echo RUTA_URL;?>/ActivityController/eliminar_actividad/<?php echo $actividad->id;?>">    
                                        <button class="btn btn-warning btn-sm btn-edit">Eliminar</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>    
        </div>
    </div>
</div> 


<?php require RUTA_APP . "/views/layout/footer.php";?>