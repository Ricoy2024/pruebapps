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
    <form action="validar.php" method="post">
        <h1> INICIO DE SESION </h1> 
        <br>
        <p>Usuario <input type="text" placeholder="Ingrese su usuario" name="usuario"></p>
        <br>
        <p>Contraseña <input type="password" placeholder="Ingrese su pass" name="dni"></p>
        
        <br>
        <input class="btn" type="submit" value="Ingresar">
        <br>
        <br>
        <a href="registrarse.php"> Registrarse</a>
        <br>
        <a href=""> Olvide mi contraseña</a>
        <br> <br> <br> <br> <br> <br> <br> 
<!--
        <div class="card " style="width: 18rem;">
        <br>
  <div class="card-body ">
    <h5 class="card-title">OLVIDASTE LA CONTRASEÑA</h5>
    <a href="#" class="btn btn-primary stretched-link">click aqui</a>
  </div> 
  <br>
  
  <div class="card-body">
    <h5 class="card-title">SOS NUEVO</h5>
    <a href="#" class="btn btn-primary stretched-link">registrarse</a>
  </div>
</div>
-->

    </form>
    </section>
    </div>
    
</body>
</html>
<?php include('public/view/layout/footer.php')?>