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
<br>
  <h3 class="bad text-center">ERROR EN LA AUTENTIFICACION POR FAVOR VUELVA A INTENTARLO</h3>

<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>