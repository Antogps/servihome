<?php
if (isset($_POST['btn_enviar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Función para validar las credenciales en la base de datos
    function validarCredenciales($username, $password, $conexion) {
        // Escapar caracteres especiales para prevenir inyección de SQL
        $username = mysqli_real_escape_string($conexion, $username);
        $password = mysqli_real_escape_string($conexion, $password);

        // Consulta para verificar las credenciales en la tabla "usuarios"
        $consulta = "SELECT * FROM usuarios02 WHERE username = '$username' AND password = '$password'";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            // Las credenciales son válidas
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;


            // Redirigir al usuario a "ingresar.php"
            header("Location: ingresar.php");
            exit(); // Importante: asegúrate de salir del script después de redirigir
        } else {
            // Las credenciales son inválidas
            echo "<br><div class='registrada'>Error al iniciar sesión</div>";
        }
    }

    // Llamada a la función para validar las credenciales
    validarCredenciales($username, $password, $conexion);
}
?>
