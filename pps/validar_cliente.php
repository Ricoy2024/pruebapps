<?php
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "pps");

$consulta = "SELECT * FROM tb_cliente where usuario='$usuario' and pass='$pass'";
$resultado = mysqli_query($conexion, $consulta);

/* asi se comenta php <!-- --> asi cuando es html */
$filas = mysqli_num_rows($resultado);

if ($filas) {
  $_SESSION["id"]=$consulta->id;
  $_SESSION["nombre"]=$consulta->nombre;
  $_SESSION["apellido"]=$consulta->apellido;
  header("location: home.php");
} else {
  include("login_cliente.php");
  
?>
<br>

  <h3 class="bad text-center">ERROR EN LA AUTENTIFICACION DEL CLIENTE POR FAVOR VUELVA A INTENTARLO</h3>

<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>