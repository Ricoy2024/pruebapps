<?php include('public/view/layout/header.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

  <div class="text-center ">
  <section class="section-3">
  <br> <br> <br> <br> <br> 
    <form  action="validar.php" method="post">
        <h1> INICIO DE SESION </h1> 
        <br>
        <p>Usuario <input type="text" placeholder="Ingrese su usuario" name="usuario" autocomplete="off" required></p>
        <br>
        <p>Contraseña <input type="password" placeholder="Ingrese su pass" name="dni" autocomplete="off" required></p>
        
        <br>
        <input class="btn" type="submit" value="Ingresar">
        <br>
        <br>
        <a href="registrarse.php"> Registrarse</a>
        <br>
        <a href="restablecercon.php"> Olvide mi contraseña</a>
        <br> <br> <br> <br> <br> <br> <br> 
    </form>
    </section>
    </div>
    
</body>
</html>
<?php include('public/view/layout/footer.php')?>