<?php
// Conexión a la base de datos (cambiar los valores según tu configuración)
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta para obtener todas las novelas guardadas
$sql = "SELECT titulo, contenido FROM novelas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir las novelas en formato JSON
    $novelas = array();
    while($row = $result->fetch_assoc()) {
        $novelas[] = $row;
    }
    echo json_encode($novelas);
} else {
    echo "No se encontraron novelas guardadas.";
}

// Cerrar conexión
$conn->close();
?>

