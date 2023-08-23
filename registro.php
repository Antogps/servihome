<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CB2.ico">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>CineBase</title>
</head>

<body>
    <main class="login">

        <a href='selector.php' class="enlace">
            Consultar películas
        </a>

        <header>
            <h1 class="titulo"><a href="ingresar.php">CineBase</a></h1>
        </header>

        <h2>Registro de Usuario</h2>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input class="elemento_formulario" type="text" id="nombre" name="nombre" placeholder="Nombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
            <input class="elemento_formulario" type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
            <input class="elemento_formulario" type="email" id="email" name="email" placeholder="Correo electrónico" required>
            <input class="elemento_formulario" type="text" id="username" name="username" placeholder="Nombre de usuario" required pattern="^\S+$" title="No se permiten espacios en blanco">
            <input class="elemento_formulario" type="password" id="password" name="password" placeholder="Contraseña" required>
            <input class="elemento_formulario" type="submit" value="Registrarse" id="boton_enviar">
        </form>
        <br>
        <p>¿Ya estás registrado? <a href="login.php">Inicia sesión aquí</a></p>


        <?php
        // Procesar el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperar los datos del formulario y aplicar trim y preg_replace
            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Validar los datos y realizar las acciones necesarias
            if (empty($nombre) || empty($apellidos) || empty($email) || empty($username) || empty($password)) {
                echo "<br><p>Por favor, complete todos los campos.</p>";
            } else {
                try {
                    // Verificar si el correo ya está registrado
                    $sql = "SELECT * FROM usuarios02 WHERE Email = '$email'";
                    $result = $conexion->query($sql);

                    // Verificar si el correo electrónico ya está registrado
                    if ($result->num_rows > 0) {
                        echo "<br><span class='registrada'>El correo electrónico ya está registrado.</span>";
                    }

                    // Verificar si el nombre de usuario ya está registrado
                    $sql = "SELECT * FROM usuarios02 WHERE Username = '$username'";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<br><p class='registrada'>El nombre de usuario ya está registrado.</p>";
                    } else {
                        // Insertar los datos en la base de datos
                        $sql = "INSERT INTO usuarios02 (nombre, apellidos, email, username, password) VALUES ('$nombre', '$apellidos', '$email', '$username', '$password')";

                        if ($conexion->query($sql) === TRUE) {
                            echo "<br><p class='no_registrada'>Se ha registrado correctamente</p>";
                            $_SESSION['loggedIn'] = true; // Establecer la sesión como iniciada
                            $_SESSION['username'] = $username; // Guardar el nombre de usuario en la variable de sesión
                            header("Location: ingresar.php"); // Redirigir al archivo "ingresar.php"
                            exit;
                        } else {
                            echo "<br><p>Ocurrió un error al registrar el usuario.</p>";
                        }
                        
                    }
                } catch (Exception $e) {
                    echo "<br><p>".$e->getMessage()."</p>";
                }
            }
        }
        ?>
        <?php include 'footer.php'; ?>
    </main>
</body>

</html>
