<?php
// Verifica si se ha enviado un archivo
if ($_FILES['file']) {
    // Nombre y ubicación del archivo en el servidor
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileDestination = 'uploads/' . $fileName;

    // Mueve el archivo cargado al destino final en el servidor
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        echo '¡El archivo se ha subido exitosamente!';
    } else {
        echo '¡Error al subir el archivo!';
    }
} else {
    echo '¡No se ha recibido ningún archivo!';
}
?>
