<?php
// Conexión a la base de datos (suponiendo que se llame "novelas")
$conexion = new mysqli("localhost", "usuario", "contraseña", "novelas");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener todas las novelas
$sql = "SELECT * FROM novelas";
$resultado = $conexion->query($sql);

// Si hay novelas, las muestra
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "<h2>" . $fila["titulo"] . "</h2>";
        echo "<p>" . $fila["contenido"] . "</p>";
    }
} else {
    echo "No se encontraron novelas";
}

// Cierra la conexión
$conexion->close();
?>
