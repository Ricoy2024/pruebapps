<?php 
include "db.php";
include 'public/view/layout/header.php';

if (isset($_POST["registrar"])) {
    global $conexion;
    
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);
    $telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
    $mail = mysqli_real_escape_string($conexion, $_POST["mail"]);
    $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $pass = mysqli_real_escape_string($conexion, $_POST["pass"]);
    $password_encriptada = sha1($pass);
    
    $sqluser = "SELECT id FROM tb_cliente WHERE mail = '$mail' ";
    $resultadouser = $conexion->query($sqluser);    
    $filas = $resultadouser->num_rows;
    
    if ($filas > 0) {
        echo "<script> 
        alert ('el mail ya esta registrado')
        window.location = 'index.php';
        </script>";
    } else {
        $sqlusuario = "INSERT INTO tb_cliente (nombre,apellido,telefono,mail,usuario,pass) VALUES ('$nombre','$apellido','$telefono','$mail','$usuario','$password_encriptada')";
        
        if ($conexion->query($sqlusuario) === TRUE) {
            echo "<script>
            alert('registro exitoso');
            window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('error al registrarse');
            window.location.href = 'index.php';
            </script>";
        }
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
    </head>
    <body>
        <div class="container d-flex flex-direcion-column">
            <p>POR FAVOR INGRESE TODOS LOS CAMPOS PARA PODER REGISTRARSE</p>
        
            <br>
            <br>
            <form class="p-1" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="form" method="POST">
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">Nombre</label>
                <input class="form-control" name="nombre" type="text" placeholder="ingresa su nombre" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]{2,}" required   >
            </div>
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">Apellido</label>
                <input class="form-control" name="apellido" type="text" placeholder="ingresa su apellido" required>
            </div>
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">Telefono</label>
                <input class="form-control" name="telefono" type="number" placeholder="ingresa su telefono"required>
            </div>
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">Email</label>
                <input class="form-control" name="mail" type="email" placeholder="ingresa su Email"required>
            </div>
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">Usuario</label>
                <input class="form-control" name="usuario" type="text" placeholder="ingresa su usuario"required >
            </div>
            <div class="input-group d-flex mb-1">
                <label class="d-flex align-item-center" for="">pass</label>
                <input class="form-control" name="pass" type="password" placeholder="ingresa su pass"required>
            </div>



            
            <button type="submit" name="registrar" class="widht-65 pull-right btn btn-sm btn-success">
                <span class="bigger-110">Registrar</span>
            </button>
        </form> 
        <div class="table-content">

        </div>
        </div>


    
    </body>
    </html>