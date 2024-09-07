

                <?php if (isset($_SESSION['Nombre']) && !($_SESSION['Nombre'] == "usuario administrador.")): ?>
                    <?php require RUTA_APP . "/views/pages/dashboard/socio/panel_socio.php";?>
                    <br>
                <?php else: ?>
                    <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>
                <?php endif; ?>

                <h1 class="title-activities">Calendario de actividades</h1>

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
    </div>
</div> 
                

<?php require RUTA_APP . "/views/layout/footer.php";?>