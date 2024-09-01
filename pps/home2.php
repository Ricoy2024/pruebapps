<?php include('public/view/layout/header.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
       <form action="" id="form">
        <div class="input-group">
            <label for="">Nombre</label>
            <input id="nombre" type="text" placeholder="ingresa su nombre">
        </div>
        <div class="input-group">
            <label for="">Apellido</label>
            <input id="apellido" type="text" placeholder="ingresa su apellido">
        </div>
        <div class="input-group">
            <label for="">Email</label>
            <input id="email" type="text" placeholder="ingresa su Email">
        </div>
        <div class="input-group">
            <label for="">fecha de nacimiento</label>
            <input id="fecha" type="date" >
        </div>
        <button type="submit">Enviar</button>
       </form> 
       <div class="table-content">

       </div>
    </div>
</body>
</html>