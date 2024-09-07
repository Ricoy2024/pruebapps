<?php require RUTA_APP ."/views/layout/header.php";?>

    <div class="container ">

        <br/>

        <h1 class="title-activities">Actividades semanales</h1>
        <div style="color: white;">
            <?php if(!empty($data['listadeactividades'])): ?>
            <ul>
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
            </ul>
        </div> 
    </div>   

<?php require RUTA_APP . "/views/layout/footer.php";?>