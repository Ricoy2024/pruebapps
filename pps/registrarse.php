<?php include('public/view/layout/header.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <div class="container d-flex flex-direcion-column">
        <h1 class="text-center">Registrese para ser cliente de Lubricentro Vintaje 76</h1>
        <br>
        <br>
       <form class="p-1" action="" id="form">
        <div class="input-group d-flex mb-1">
            <label class="d-flex align-item-center" for="">Nombre</label>
            <input class="form-control" id="nombre" type="text" placeholder="ingresa su nombre">
        </div>
        <div class="input-group d-flex mb-1">
            <label class="d-flex align-item-center" for="">Apellido</label>
            <input class="form-control" id="apellido" type="text" placeholder="ingresa su apellido">
        </div>
        <div class="input-group d-flex mb-1">
            <label class="d-flex align-item-center" for="">Email</label>
            <input class="form-control" id="email" type="text" placeholder="ingresa su Email">
        </div>
        <div class="input-group d-flex mb-1">
            <label class="d-flex align-item-center" for="">fecha de nacimiento</label>
            <input class="form-control" id="fecha" type="date" >
        </div>
        <button class="btn " type="submit">Enviar</button>
       </form> 
       <div class="table-content">

       </div>
    </div>
</body>
</html>