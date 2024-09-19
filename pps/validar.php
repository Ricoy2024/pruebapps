<?php
session_start(); 

// trae datos del formulario
$usuario = $_POST['usuario'];
$dni = $_POST['dni'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "pps");

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// evita inyección SQL
$stmt = $conexion->prepare("SELECT * FROM tb_admin WHERE usuario=? AND dni=?");
$stmt->bind_param("ss", $usuario, $dni);
$stmt->execute();
$resultado = $stmt->get_result();
$user = $resultado->fetch_assoc();

// usuario existe?
if ($user) {
    // Inicia sesión y guarda los datos del usuario
    $_SESSION["id"] = $user['id'];
    $_SESSION["nombre"] = $user['nombre'];
    $_SESSION["apellido"] = $user['apellido'];
    $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión
    header("Location: botonera_lateral2.php");
    exit();
} else {
    echo "<script>alert('Contraseña incorrecta'); location.href='nuevapaglogin.php';</script>";
}

// Cierra la declaración y la conexión
$stmt->close();
mysqli_close($conexion);
?>