<?php
if (isset($_POST['btn_enviar'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Función para validar las credenciales en la base de datos
    function validarCredenciales($correo, $password, $conexion) {
        // Escapar caracteres especiales para prevenir inyección de SQL
        $correo = mysqli_real_escape_string($conexion, $correo);
        $password = mysqli_real_escape_string($conexion, $password);

        // Consulta para verificar las credenciales en la tabla "usuarios"
        $consulta = "SELECT * FROM usuarios WHERE CorreoElectronico = '$correo' AND contrasena = '$password'";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_assoc($resultado);
            $rol = $row['Rol'];

            if ($rol == 'administrador') {
                // Las credenciales son válidas y el usuario es administrador
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['correo'] = $correo;

                // Redirigir al usuario a "panel_administrador.php" (por ejemplo)
                header("Location: panel_administrador.php");
                exit(); // Importante: asegúrate de salir del script después de redirigir
            } else {
                // El usuario no es administrador, mostrar mensaje de error
                echo "<br><div class='registrada'>No tienes permiso para acceder a esta área.</div>";
            }
        } else {
            // Las credenciales son inválidas
            echo "<br><div class='registrada'>Error al iniciar sesión</div>";
        }
    }

    // Llamada a la función para validar las credenciales
    validarCredenciales($correo, $password, $conexion);
}
?>
