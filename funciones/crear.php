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
    <title>Crear usuarios</title>
</head>

<body>
    <main>
        <h2>Crear Usuario</h2>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input class="elemento_formulario" placeholder="Nombre" type="text" id="nombre" name="nombre" required>
            <input class="elemento_formulario" placeholder="Apellidos" type="text" id="apellidos" name="apellidos"
                required>
            <input class="elemento_formulario" placeholder="Empresa" type="text" id="empresaa" name="empresa" required>
            <input class="elemento_formulario" placeholder="Correo electrónico" type="email" id="correo" name="correo"
                required>
            <select class="elemento_formulario" id="rol" name="rol" required>
                <option value="" selected disabled>Selecciona un rol</option>
                <option value="administrador">Administrador</option>
                <option value="cliente">Cliente</option>
            </select>

            <input class="elemento_formulario" placeholder="Ubicación" type="text" id="ubicacion" name="ubicacion"
                required>
            <input class="elemento_formulario" type="submit" value="Crear Usuario" id="boton_enviar" name="btn_enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $empresa = $_POST["empresa"];
                $correo = $_POST["correo"];
                $rol = $_POST["rol"];
                $ubicacion = $_POST["ubicacion"];
            
            
                // Realizar la inserción en la base de datos
                $sql = "INSERT INTO usuarios (Nombre, Apellidos, Empresa, CorreoElectronico, Rol, Ubicacion, ) 
                        VALUES ('$nombre', '$apellidos', '$empresa', '$correo', '$rol', '$ubicacion')";

                if ($conexion->query($sql) === TRUE) {
                    $success_message = "Usuario creado exitosamente.";
                } else {
                    $error_message = "Error al crear el usuario: " . $conexion->error;
                }
            }
        ?>



        <?php include "../includes/footer.php"; ?>
    </main>
</body>

</html>