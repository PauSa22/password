
<?php
session_start();

// Creamos el arreglo de usuarios
if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = array();
}

$mens = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos del formulario
    $nombre = trim($_POST["nombre"]);
    $user = trim($_POST["user"]);
    $pass = $_POST["pass"];
    $confirm = $_POST["confirm"];

    // Validar campos
    if (empty($nombre) || empty($user) || empty($pass) || empty($confirm)) {

        $mens = "Todos los campos son obligatorios.";

    } elseif (strlen($pass) < 6) {

        $mens = "La contraseña debe tener al menos 6 caracteres.";

    } elseif ($pass != $confirm) {

        $mens = "Las contraseñas no coinciden.";

    } elseif (isset($_SESSION["usuarios"][$user])) {

        $mens = "Este usuario ya está registrado.";

    } else {

        // Crear el hash de la contraseña
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Guardar los datos en el arreglo
        $_SESSION["usuarios"][$user] = array(
            "nombre" => $nombre,
            "password" => $hash
        );

        $mens = "Usuario registrado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="passtyle.css">
</head>

<body>

    <h1>Registro de usuarios</h1>

    <div class="slider-img">
        <img src="images/buscar.jpg" width="120" alt="Buscar usuario">
        <img src="images/dehecho.jpg" width="100" alt="Usuario">
    </div>

    <form method="POST">

        <label>Nombre:</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

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

        <label>Confirmar contraseña:</label>
        <br>
        <input type="password" name="confirm">
        <br><br>

        <button type="submit">Registrarse</button>

    </form>

    <p><?php echo htmlspecialchars($mens); ?></p>

    <p>¿Ya tienes una cuenta?</p>

    <a href="login.php">Iniciar sesión</a>

</body>
</html>
