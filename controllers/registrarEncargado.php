<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre_encargado"];
  $matricula = $_POST["matricula_encargado"];
  $correo = $_POST["correo_encargado"];
  $contrasena = password_hash($_POST["contrasena_encargado"], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO encargado (nombre_encargado, matricula_encargado, correo_encargado, contrasena_encargado) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nombre, $matricula, $correo, $contrasena);

  if ($stmt->execute()) {
    //echo "<script>alert('Nuevo encargado registrado con éxito.');</script>"; // Mensaje de alerta
    header("Location: ../views/registrarEncargado.php"); // Redirecciona a registrarEncargado.php
    exit; // Detiene la ejecución del script
  } else {
    echo "<script>alert('Error: ' . $stmt->error);</script>";
  }

  $stmt->close();
}