<?php
$correo = $_SESSION["correo"] ?? '';

if (!empty($correo)) {
    // Realizar la consulta a la base de datos para obtener el nombre y apellidos del usuario
    $sql = "SELECT Nombre, Apellidos FROM usuarios WHERE CorreoElectronico = '$correo'";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $apellidos = $row['Apellidos'];
        echo '<div class="bienvenida">';
        echo 'Bienvenido/a, ' . '<span class="nombre">' . htmlspecialchars($nombre . ' ' . $apellidos) . '</span>' . ' ' . '|' . ' ';
        echo '<a href="logout.php" class="registro.php">Cerrar sesión</a>';
        echo '</div><br>';
    }
}
?>
