

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="passtyle.css">
</head>

<body>

    <h1>Inicio de sesión</h1>

    <div class="slider-img">
        <img src="images/buscar.jpg" width="120" alt="Buscar usuario">
    </div>

    <form method="POST">

        <label>Nombre de usuario:</label>
        <br>
        <img src="images/user.jpg" width="45" alt="Usuario">
        <input type="text" name="user">
        <br><br>

        <label>Contraseña:</label>
        <br>
        <img src="images/candadito.jpg" width="45" alt="Contraseña">
        <input type="password" name="pass">
        <br><br>

        <button type="submit">Ingresar</button>

    </form>

    <?php

    <p><?php echo $mens; ?></p>

    <p>¿No tienes una cuenta?</p>

    <a href="registro.php">Registrarse</a>

</body>
</html>
