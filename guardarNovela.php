<?php
// Recibir los datos del formulario y escaparlos
$titulo = htmlspecialchars($_POST['titulo']);
$contenido = htmlspecialchars($_POST['contenido']);

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

// Preparar la consulta usando consultas preparadas
$sql = "INSERT INTO novelas (titulo, contenido) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $titulo, $contenido);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Novela guardada con éxito.";
} else {
    echo "Error al guardar la novela: " . $conn->error;
}

// Cerrar declaración y conexión
$stmt->close();
$conn->close();
?>
