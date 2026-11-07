
<?php
session_start();

$mensaje = "";
$imagen = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos del formulario
    $user = trim($_POST["user"]);
    $pass = $_POST["pass"];

    // Buscar si el usuario existe
    if (isset($_SESSION["usuarios"][$user])) {

        // Recuperar el hash de la contraseña
        $hash = $_SESSION["usuarios"][$user]["password"];

        // Verificar la contraseña
        if (password_verify($pass, $hash)) {

            $nombre = $_SESSION["usuarios"][$user]["nombre"];

            $mensaje = "¡Perfecto! Estás dentro, " . htmlspecialchars($nombre);

            $imagen = "images/si.jpg";

        } else {

            $mensaje = "Contraseña incorrecta. Inténtalo nuevamente.";

            $imagen = "images/vete.jpg";

        }

    } else {

        $mensaje = "Este usuario no existe.";

        $imagen = "images/vete.jpg";

    }
}
?>

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

    // Mostrar la imagen del resultado
    if ($imagen != "") {
        echo '<div class="slider-img">';
        echo '<img src="' . $imagen . '" width="150" alt="Resultado">';
        echo '</div>';
    }

    ?>

    <p><?php echo $mensaje; ?></p>

    <p>¿No tienes una cuenta?</p>

    <a href="registro.php">Registrarse</a>

</body>
</html>
