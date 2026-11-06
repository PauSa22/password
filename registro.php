
<?php
session_start();

// Crear el arreglo de usuarios
if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = array();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos del formulario
    $nombre = trim($_POST["nombre"]);
    $user = trim($_POST["user"]);
    $pass = $_POST["pass"];
    $confirm = $_POST["confirm"];
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de los usuarios</title>
    <link rel="stylesheet" href="passtyle.css">
</head>

<body>

    <h1>Registro de usuarios</h1>

    <form method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre">
        <br>

        <label>Nombre de usuario:</label>
        <input type="text" name="user">
        <br>

        <label>Contraseña:</label>
        <input type="password" name="pass">
        <br>

        <label>Confirmar contraseña:</label>
        <input type="password" name="confirm">
        <br>

        <button type="submit">Registrarse</button>

    </form>

    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <p>¿Ya tienes una cuenta?</p>

    <a href="login.php">Iniciar sesión</a>

</body>
</html>
