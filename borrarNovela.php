<?php
// Recibir la contraseña y el título de la novela a borrar
$titulo = $_POST['titulo'];
$password = $_POST['password'];

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

// Preparar la consulta para borrar la novela de la base de datos
$sql = "DELETE FROM novelas WHERE titulo='$titulo' AND password='$password'";

if ($conn->query($sql) === TRUE) {
    echo "Novela borrada con éxito.";
} else {
    echo "Error al borrar la novela: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
