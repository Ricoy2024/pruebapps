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
  $_SESSION["id"]=$consulta->id;
  $_SESSION["nombre"]=$consulta->nombre;
  $_SESSION["apellido"]=$consulta->apellido;
  header("location: botonera_lateral2.php");
} else {
  echo "<script> alert('contraseña incorrecta ');
  location.href='nuevapaglogin.php';
  </script>";
  include("nuevapaglogin.php");
  
?>
<br>

  <h3 class="bad text-center">ERROR EN LA AUTENTIFICACION POR FAVOR VUELVA A INTENTARLO</h3>

<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>