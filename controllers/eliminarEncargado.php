<?php
include 'config.php';

if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("DELETE FROM encargado WHERE matricula_encargado = ?");
    $stmt->bind_param("s", $matricula);

    if ($stmt->execute()) {
        header("Location: ../views/registrarEncargado.php"); // Redirigir a la página principal después de eliminar
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $stmt->close();
}