<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "sysgastro";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}