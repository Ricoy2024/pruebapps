<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- copíe y pegue las pag aca lo del video -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="style3.css">
    <title>cred data table</title>
  </head>
  <body>
    <div class="container fondo">
    <h1 class="text-center">crud</h1>
    <h1 class="text-center">cruddata</h1>

    <div class="row">
        <div class="col-2 offset-10">
            <div class="text-center">
                <!-- Button trigger modal    creamos el boton para crear -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                    <i class="bi bi-plus-circle-fill"></i> crear
                    </button>
            </div>

        </div>

    </div>

    
    <br />
    <br />

    <div class="table-responsive">
        <table id="datos_usuario" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Fecha creacion</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>

    <!-- modal -->
            <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <form method="POST" id="formulario" enctype="multiplart/form-data">
                    <div class="modal-content">
                    <div class="modal-body">
                        <label for="nombre">Ingrese el nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        <br />

                        <label for="apellidos">Ingrese los apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control">
                        <br />

                        <label for="telefono">Ingrese el telefono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control">
                        <br />

                        <label for="email">Ingrese el email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <br />

                        <label for="imagen">Seleccione la imagen</label>
                        <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                        <span id="imagen-subida"></span>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_usuario" id="id_usuario">
                        <input type="hidden" name="operacion" id="operacion">
                        <input type="submit" name="action" id="action" class="btn btn-success"
                        value="Crear">
                </div>
                </div>
                </form>
                </div>
           
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/Javascript">
    $(document).ready(function(){
        $("#botonCrear").click(function(){
            $("#formulario")[0].reset();
            $(".modal-title").text("Crear usuario");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
            $("#imagen_subida").html("");
        });
        
        var datatable = $('#datos_usuario').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax": {
                url: "obtener_registros.php",
                type:"POST"
            },
            "columsDefs":[
                {
                "targets":[0, 3, 4],
                "orderable":false,
            },
            ]
        });


        //codigo inserccion

        $(document).on('submit','#formulario',function(event){
        event.preventDefoult();
        var nombre= $("#nombre").val();
        var apellidos=$("#apellidos").val();
        var telefono=$("#telefono").val();
        var email=$("#email").val();
        var extension=$("#imagen_usuario").val().split('.').pop().toLowerCase();

        if(extension != ''){
            if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1){
             alert("formato de imagen invalido");
             $("#imagen_usuario").val('');
            return false;
            }
        }
        if(nombre !='' && apellidos != '' && email!='' ){
            $.ajax({
                url: "crear.php",
                metotd: "POST",
                data: new FormData(this),
                contenType:false,
                processData:false,
                success:function(data){
                    alert(data);
                    $('#formulario')[0].reset();
                    $('#modalUsuario').modal.hide();
                    dataTable.ajax.reload();
                }
            });
               }else{
                   alert("Algunos campos son obligatorios");
                }
    });
    });

    
  </script>

    

  </body>
</html>