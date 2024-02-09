<?php
// Verifica si se recibió un archivo
if ($_FILES['file']) {
    // Nombre del archivo
    $fileName = $_FILES['file']['name'];

    // Ruta donde se almacenarán los archivos
    $uploadDirectory = 'uploads/';

    // Ruta completa del archivo en el servidor
    $uploadPath = $uploadDirectory . $fileName;

    // Verifica si el archivo ya existe en el directorio de carga
    if (file_exists($uploadPath)) {
        echo 'El archivo ya existe.';
    } else {
        // Verifica si el archivo se ha subido correctamente
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {
            echo 'Archivo subido exitosamente.';
        } else {
            echo 'Error al subir el archivo.';
        }
    }
} else {
    echo 'No se recibió ningún archivo.';
}
?>
