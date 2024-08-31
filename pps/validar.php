<?php
$usuario = $_POST['usuario'];
$dni = $_POST['dni'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "pps");

$consulta = "SELECT * FROM tb_admin where usuario='$usuario' and dni='$dni'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
  header("location: home.php");
} else {
  include("login_admin.php");
?>
  <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
  <h1>hola alex como va</h1>
  <h1>hola cris</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>