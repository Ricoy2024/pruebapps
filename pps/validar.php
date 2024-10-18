<?php
session_start(); 

// Trae datos del formulario
$usuario = $_POST['usuario'] ?? ''; // Usar el operador null coalescing para evitar errores
$pass = $_POST['pass'] ?? '';  // Lo mismo aquí

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "pps");

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Evita inyección SQL
$stmt = $conexion->prepare("SELECT * FROM tb_cliente WHERE usuario=?");
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . mysqli_error($conexion));
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$user = $resultado->fetch_assoc();

// Verifica si el usuario existe y si la contraseña es correcta
if ($user && password_verify($pass, $user['pass'])) {
    // Inicia sesión y guarda los datos del usuario
    $_SESSION["id"] = $user['id'];
    $_SESSION["nombre"] = $user['nombre'];
    $_SESSION["apellido"] = $user['apellido'];
    $_SESSION['usuario'] = $usuario; 

    session_regenerate_id(); // Regenerar ID de sesión
    if ($usuario === 'admin') {
        header("Location: botonera_lateral2.php"); // Redirige al área del administrador
    } else {
        header("Location: home.php"); // Redirige al área del usuario normal
    }
    exit();
} else {
    echo "<script>alert('Usuario o contraseña incorrecta'); location.href='nuevapaglogin.php';</script>";
}

// Cierra la declaración y la conexión
$stmt->close();
mysqli_close($conexion);
?>