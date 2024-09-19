<?php
session_start();

// trae los datos del formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "pps");

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//  evita inyección SQL
$stmt = $conexion->prepare("SELECT * FROM tb_cliente WHERE usuario=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$user = $resultado->fetch_assoc();


if ($user && password_verify($pass, $user['pass'])) {
    // Inicia sesión y guarda los datos del usuario
    $_SESSION["id"] = $user['id'];
    $_SESSION["nombre"] = $user['nombre'];
    header("Location: home.php");
    exit();
} else {
    $_SESSION['error'] = "ERROR EN LA AUTENTIFICACION DEL CLIENTE. POR FAVOR VUELVA A INTENTARLO.";
    header("Location: login_cliente.php");
    exit();
}

// Cierra la declaración y la conexión
$stmt->close();
mysqli_close($conexion);
?>



<?php include('public/view/layout/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="text-center">
        <section class="section-3">
            <br><br><br><br><br>
            <form action="validar.php" method="post">
                <h1>INICIO DE SESIÓN</h1>
                <br>
                <p>Usuario <input type="text" placeholder="Ingrese su usuario" name="usuario" autocomplete="off" required></p>
                <br>
                <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="pass" autocomplete="off" required></p>
                <br>
                <input class="btn" type="submit" value="Ingresar">
                <br>
                <br>
                <a href="registrarse.php">Registrarse</a>
                <br>
                <a href="restablecercon.php">Olvidé mi contraseña</a>
                <br><br><br><br><br><br><br>
            </form>

            <?php
            // mensaje de error 
            if (isset($_SESSION['error'])) {
                echo "<h3 class='bad text-center'>{$_SESSION['error']}</h3>";
                unset($_SESSION['error']); 
            }
            ?>
        </section>
    </div>
</body>
</html>
<?php include('public/view/layout/footer.php'); ?>