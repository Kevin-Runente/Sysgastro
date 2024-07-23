<?php
ini_set('session.gc_maxlifetime', 1800);
session_set_cookie_params(1800);
session_start();

if (isset($_SESSION['matricula'])) {
    header("location: ../views/.php");
    exit();
}

include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    $query_encargado = "SELECT * FROM encargado WHERE matricula_encargado = ?";
    if ($stmt = $conn->prepare($query_encargado)) {
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $result_encargado = $stmt->get_result();
        if ($result_encargado->num_rows === 1) {
            $row = $result_encargado->fetch_assoc();
            if (password_verify($password, $row['contrasena_encargado'])) {
                $_SESSION['matricula'] = $row['matricula_encargado'];
                header("location: ../views/indexEncargado.php");
                exit();
            } else {
                header("location: ../index.php?error=incorrect");
                exit();
            }
        }
    }

    $query_alumno = "SELECT * FROM alumno WHERE matricula_alumno = ?";
    if ($stmt = $conn->prepare($query_alumno)) {
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $result_alumno = $stmt->get_result();
        if ($result_alumno->num_rows === 1) {
            $row = $result_alumno->fetch_assoc();
            if (password_verify($password, $row['contrasena_alumno'])) {
                $_SESSION['matricula'] = $row['matricula_alumno'];
                header("location: ../inicio_alumno.php");
                exit();
            } else {
                header("location: ../index.php?error=incorrect");
                exit();
            }
        }
    }

    $matricula_correcta = "33333333";
    $contrasena_correcta = "33333333";

    if ($matricula === $matricula_correcta && $password === $contrasena_correcta) {
        $_SESSION['matricula'] = $matricula_correcta;
        header("location: ../indexDirector.php");
        exit();
    } else {
        header("location: ../index.php?error=incorrect");
        exit();
    }

    header("location: ../index.php?error=notfound");
    exit();
} else {
    header("location: ../index.php");
    exit();
}
?>
