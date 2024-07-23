<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre_alumno"];
    $matricula = $_POST["matricula_alumno"];
    $correo = $_POST["correo_electronico"];
    $contrasena = password_hash($_POST["contrasena_alumno"], PASSWORD_DEFAULT);
    $cuatrimestre = $_POST["cuatrimestre_alumno"];
    $grupo = $_POST["grupo_alumno"];

    // Asegúrate de que la consulta tiene el número correcto de parámetros
    $stmt = $conn->prepare("INSERT INTO alumno (nombre_alumno, matricula_alumno, correo_electronico, contrasena_alumno, cuatrimestre_alumno, grupo_alumno) VALUES (?, ?, ?, ?, ?, ?)");
    
    // La cantidad de 's' debe coincidir con el número de parámetros en la consulta
    $stmt->bind_param("ssssss", $nombre, $matricula, $correo, $contrasena, $cuatrimestre, $grupo);

    if ($stmt->execute()) {
        echo "Nuevo alumno registrado con éxito.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT nombre_alumno, matricula_alumno, correo_electronico, cuatrimestre_alumno, grupo_alumno FROM alumno";
$result = $conn->query($sql);

$conn->close();
?>
