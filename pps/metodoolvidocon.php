<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
    <title>Recuperación de Contraseña - Taller Mecánico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow:  4px 15px rgba(,,,.1);
            width: 400px;
        }
        h2 {
            color: #ff5722; /* Color naranja */
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #ff5722; /* Color naranja */
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #e64a19; /* Color más oscuro al pasar el ratón */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>VINTAJE 76</h2>
    <form action="reset_password.php" method="POST">
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="tuemail@ejemplo.com">
        </div>
        <button type="submit" class="btn btn-custom">Recuperar Contraseña</button>
    </form>
    <div class="footer">
        <p>&copy; vintage 76 . Todos los derechos reservados.</p>
    </div>
</div>

</body>
</html>
