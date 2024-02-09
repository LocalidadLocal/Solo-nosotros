<?php
// Recibir los datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];

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

// Preparar la consulta para insertar la novela en la base de datos
$sql = "INSERT INTO novelas (titulo, contenido) VALUES ('$titulo', '$contenido')";

if ($conn->query($sql) === TRUE) {
    echo "Novela guardada con éxito.";
} else {
    echo "Error al guardar la novela: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
