<?php
// Iniciar la sesión
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos simulados (normalmente estarían en una base de datos)
    $username = "admin";
    $password = "1234";

    // Simulación de autenticación (comparar con los valores hardcodeados)
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Autenticación exitosa, guardar la sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirigir a la página de administración
        header('Location: adminpage.php');
        exit;
    } else {
        // Error de autenticación
        $error = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lab2styles.css" />
    <title>LAB2 Log in</title>
    <link href="images/lab1logo.png" rel="icon" />
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="loginpage.php">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>