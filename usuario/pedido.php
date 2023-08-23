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
    <title>ServiHome</title>
</head>

<body>
    <main>
        <header>
            <h1 class="titulo"><a href="">ServiHome</a></h1>
        </header>

<?php include "bienvenida_usuario.php"; ?>

        <h2>Realice su pedido</h2>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <textarea  class="elemento_formulario" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Escribe tu mensaje aquí"></textarea>
            <br>
            <input class="elemento_formulario" type="submit" value="Enviar" id="boton_enviar" name="btn_enviar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mensaje = $_POST["mensaje"];
            
            // Obtener la fecha actual para el pedido
            $fechaPedido = date("Y-m-d");
            
            // Obtener el ID del usuario de la sesión actual
            $usuarioID = $_SESSION['usuario_id']; 
            
            // Estado por defecto
            $estado = "abierto";
            
            // Insertar la información en la tabla "pedidos"
            $sql = "INSERT INTO pedidos (FechaPedido, Descripcion, Estado, UsuarioID) 
                    VALUES ('$fechaPedido', '$mensaje', '$estado', '$usuarioID')";
            
            if ($conexion->query($sql) === TRUE) {
                $success_message = "Pedido registrado exitosamente.";
            } else {
                $error_message = "Error al registrar el pedido: " . $conexion->error;
            }
        }
        ?>


        <?php include "../includes/footer.php"; ?>
    </main>
</body>

</html>