<?php include "../conexion.php"; ?>

<!DOCTYPE html>
<html lang="es-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CB2.ico">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Inicio de sesión</title>
</head>

<body>
    <main class="login">
        <header>
            <h1 class="titulo"><a href="">ServiHome</a></h1>
        </header>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input class="elemento_formulario" placeholder="Correo de usuario" type="text" id="correo" name="correo" required>
            <input class="elemento_formulario" placeholder="Contraseña" type="password" id="password" name="password" required>
            <input class="elemento_formulario" type="submit" value="Iniciar sesión" id="boton_enviar" name="btn_enviar">
        </form>
        <?php include "controlador_usuario.php"; ?>
        <?php include '../includes/footer.php'; ?>
    </main>   
</body>

</html>