<?php
include 'config.php';

$sql = "SELECT nombre_alumno, matricula_alumno, correo_alumno FROM alumno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   //s header("location: ../views/registrarEncargado.php");
    // Generar filas de la tabla dinámicamente
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["nombre_alumno"]) . "</td>
                <td>" . htmlspecialchars($row["matricula_alumno"]) . "</td>
                <td>" . htmlspecialchars($row["correo_alumno"]) . "</td>
                <td>
                    <form method='POST' action='../controllers/eliminarAlumno.php' style='display:inline-block;'>
                        <input type='hidden' name='matricula' value='" . htmlspecialchars($row["matricula_alumno"]) . "'>
                        <button type='submit' class='btn btn-danger btn-sm'></i> Eliminar</button>
                    </form>
                    <form method='POST' action='../controllers/editarAlumno.php' style='display:inline-block;'>
                        <input type='hidden' name='matricula' value='" . htmlspecialchars($row["matricula_alumno"]) . "'>
                        <button type='submit' class='btn btn-primary btn-sm'><i class='fi fi-rs-user-pen'></i> Editar</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
}