
<?php 
include('public/view/layout/header.php');
session_start();

// Verifica si el usuario  inicio sesión
if (!isset($_SESSION['id'])) {
    header("Location: login_admin.php");
    exit(); 
}

?>
<br>
<br>
<br>
<br>
<br>
<nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-light bg-light fixed-top">
  <div class="text-white bg-success p-2">
    <?php
    echo $_SESSION['nombre'];
    ?>
  </div>

</nav>

<h1 class="text-center">PÁGINA EN CONSTRUCCIÓN = )</h1>

<?php include('public/view/layout/footer.php') ?>
```