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
        <div class="card w-100 ">
            <div class="card-body w-100">
                <br>
                <h2 class="mb-3 text-center">Nuevo producto</h2>
            <form  action="" id="form">
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Nombre</label>
            <input required class="form-control" id="nombre" type="text" placeholder="ingresa su nombre">
        </div>
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Apellido</label>
            <input class="form-control" id="apellido" type="text" placeholder="ingresa su apellido">
        </div>
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Telefono</label>
            <input class="form-control" id="telefono" type="number" placeholder="ingresa su telefono">
        </div>
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Email</label>
            <input class="form-control" id="email" type="email" placeholder="ingresa su Email">
        </div>
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Usuario</label>
            <input class="form-control" id="usuario" type="text" placeholder="ingresa su usuario">
        </div>
        <div class="input-group d-flex mb-1 justify-content-center">
            <label class="d-flex align-item-center" for="">Contraseña</label>
            <input class="form-control" id="pass" type="password" placeholder="ingresa su pass">
        </div>

        <div class="d-flex justify-content-center ">
        <button class="btn " type="submit">Enviar</button>
        </div>
        <br>
       </form>
            </div>
        </div>
        <br>
       <div class="table-content">
                <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Password</th>
                    </thead>
                    <tbody></tbody>
                </table>
                
       </div>
    </div>
    
</body>
</html>