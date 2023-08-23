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
    <title>Panel administrador</title>
</head>

<body>
    <main>
        <header>
            <h1 class="titulo"><a href="">ServiHome</a></h1>
        </header>

        <h2>Realice su pedido</h2>
        <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <textarea  class="elemento_formulario" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Escribe tu mensaje aquí"></textarea>
            <br>
            <input class="elemento_formulario" type="submit" value="Enviar" id="boton_enviar" name="btn_enviar">
        </form>

        <?php include "../includes/footer.php"; ?>
    </main>
</body>

</html>