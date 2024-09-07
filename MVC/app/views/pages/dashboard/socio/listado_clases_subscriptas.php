                <?php require RUTA_APP . "/views/pages/dashboard/socio/panel_socio.php";?>

                <div class="container">
                    <br>
                    <h1 class="title-activities text-white">Mis clases subscriptas</h1>

                    <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Día</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <?php if(isset($data['activitiesAdded']) && !empty($data['activitiesAdded'])): ?>

                            <?php foreach ($data['activitiesAdded'] as $activitiesAdded): ?> 
                                <tbody> 
                                    <tr>
                                        <td class="align-center" scope="row"><?php echo htmlspecialchars($activitiesAdded->nombre); ?></td>
                                        <td class="align-center"><?php echo htmlspecialchars($activitiesAdded->dia); ?></td>
                                        <td class="align-center"><?php echo htmlspecialchars($activitiesAdded->hora); ?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                                                    
                    
                        <?php else: ?>
                            <td value="No hay actividades disponibles">Aún no se ha anotado a ninguna actividad.</td>
                            <td>-</td>
                            <td>-</td>
                        <?php endif; ?>
                    </table> 

                </div>  

            </div>
        </div>
    </div>
</div>

<?php require RUTA_APP . "/views/layout/footer.php";?>