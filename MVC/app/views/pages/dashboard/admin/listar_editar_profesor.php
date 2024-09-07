                <?php require RUTA_APP . "/views/pages/dashboard/admin/panel_admin.php";?>

                <div style="color: white;">
                    <h2>Listado y edición de profesores</h2>
                    <ul>
                        <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Mail</th>
                                    <th>Acciones</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                        
                            <?php foreach($data['listaDeProfesores'] as $profesor): ?>
                        
                                <tbody>
                                    <tr>
                                        <td class="align-center" scope="row"><?php echo htmlspecialchars($profesor->nombre) ?></td>
                                        <td class="align-center"><?php echo htmlspecialchars($profesor->apellido) ?></td>
                                        <td class="align-center"><?php echo htmlspecialchars($profesor->email) ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo RUTA_URL;?>/ProfeController/showEditarProfe/<?php echo $profesor->id; ?>"><button class="btn btn-warning btn-edit">Editar</button></a>
                                        </td>
                                        <td>
                                            <img class="avatar" src="<?php echo RUTA_AVATAR . $profesor->foto_perfil; ?>" alt="Foto de perfil" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="<?php echo RUTA_AVATAR . $profesor->foto_perfil; ?>">
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Modal -->
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="imageModalLabel">Foto de perfil</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="modalImage" src="" alt="Foto de perfil" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            <?php endforeach; ?>
                        </table>
                                
                        <div class="mt-3"></div>
                        <?php
                            if (isset($data['message'])) {
                                echo $data['message'];
                            }
                        ?>
                    </ul>
                </div>

            </div>    
        </div>
    </div>
</div> 

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imageModal = document.getElementById('imageModal');
        var modalImage = document.getElementById('modalImage');

        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Elemento que activó el modal
            var imageSrc = button.getAttribute('data-bs-image'); // Extrae la URL de la imagen
            modalImage.src = imageSrc; // Actualiza el src de la imagen en el modal
        });
    });
</script>
                

<?php require RUTA_APP . "/views/layout/footer.php";?>