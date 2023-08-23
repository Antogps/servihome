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
        <h2>Panel de administrador</h2>
        <ul>
            <li><a href="funciones/crear.php">Crear usuarios</a></li>
            <li><a href="funciones/eliminar.php">Eliminar usuarios</a></li>
            <li><a href="funciones/editar.php">Editar peticiones</a></li>
            <li><a href="funciones/consultar.php">Consultar peticiones</a></li>
        </ul>

        <?php include "controlador.php"; ?>
        <?php include "../includes/footer.php"; ?>
    </main>
</body>

</html>