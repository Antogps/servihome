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
        $consulta = "SELECT * FROM usuarios WHERE CorreoElectronico = '$correo' AND password = '$password'";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) == 1) {
            // Las credenciales son válidas
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['correo'] = $correo;


            // Redirigir al usuario a "ingresar.php"
            header("Location: ingresar.php");
            exit(); // Importante: asegúrate de salir del script después de redirigir
        } else {
            // Las credenciales son inválidas
            echo "<br><div class='registrada'>Error al iniciar sesión</div>";
        }
    }

    // Llamada a la función para validar las credenciales
    validarCredenciales($correo, $password, $conexion);
}
?>
