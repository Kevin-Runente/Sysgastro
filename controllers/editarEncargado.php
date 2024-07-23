

<?php
include '../includes/header.php';
include 'config.php';

// 1. Recibir la información del encargado a editar
if (isset($_POST['matricula'])) {
    $matriculaEncargado = $_POST['matricula'];

    // 2. Recuperar los datos completos del registro usando una consulta preparada
    $stmt = $conn->prepare("SELECT * FROM encargado WHERE matricula_encargado = ?");
    $stmt->bind_param("s", $matriculaEncargado);
    $stmt->execute();
    $result = $stmt->get_result();

    $datosEncargado = array();
    if ($result->num_rows > 0) {
        $datosEncargado = $result->fetch_assoc();
    } else {
        echo "<p>¡Error! El encargado no existe.</p>";
        exit;
    }

    $stmt->close();

    // Mostrar el formulario de edición
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Encargado</title>
    </head>
    <body>
        <h1>Editar Encargado</h1>
        <form id="registroForm" action="editarEncargado.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="nombre_encargado" class="form-label">Nombre(s)</label>
                <input value="<?php echo htmlspecialchars($datosEncargado['nombre_encargado'], ENT_QUOTES, 'UTF-8'); ?>" type="text" class="form-control" id="nombre_encargado" name="nombre_encargado" required onkeyup="validarLetras(this)">
            </div>
            <div class="col-md-6">
                <label for="matricula_encargado" class="form-label">Matricula</label>
                <input value="<?php echo htmlspecialchars($datosEncargado['matricula_encargado'], ENT_QUOTES, 'UTF-8'); ?>" type="number" class="form-control" id="matricula_encargado" name="matricula_encargado" required maxlength="8" oninput="validarMatricula(this)">
            </div>
            <div class="col-md-6">
                <label for="correo_encargado" class="form-label">Correo</label>
                <input value="<?php echo htmlspecialchars($datosEncargado['correo_encargado'], ENT_QUOTES, 'UTF-8'); ?>" type="email" class="form-control" id="correo_encargado" name="correo_encargado" required readonly>
            </div>
            <div class="col-md-6">
                <label for="contrasena_actual_encargado" class="form-label">Contraseña Actual</label>
                <input value="<?php echo htmlspecialchars($datosEncargado['contrasena_encargado'], ENT_QUOTES, 'UTF-8'); ?>" type="password" class="form-control" id="contrasena_actual_encargado" name="contrasena_actual_encargado" required readonly>
            </div>
            <div class="col-md-6">
                <label for="contrasena_nueva_encargado" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                <input type="password" class="form-control" id="contrasena_nueva_encargado" name="contrasena_nueva_encargado">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </body>
    </html>
    <?php
} elseif (isset($_POST['matricula_encargado'], $_POST['nombre_encargado'])) {
    // Procesar la actualización del encargado
    $matriculaEncargado = $_POST['matricula_encargado'];
    $nombreEncargado = $_POST['nombre_encargado'];
    $contrasenaNuevaEncargado = isset($_POST['contrasena_nueva_encargado']) ? $_POST['contrasena_nueva_encargado'] : null;

    // Verificar si se proporcionó una nueva contraseña
    if ($contrasenaNuevaEncargado !== null && $contrasenaNuevaEncargado !== '') {
        // 2. Preparar la consulta de actualización con la nueva contraseña
        $stmt = $conn->prepare("UPDATE encargado SET nombre_encargado = ?, contrasena_encargado = ? WHERE matricula_encargado = ?");
        $stmt->bind_param("sss", $nombreEncargado, $contrasenaNuevaEncargado, $matriculaEncargado);
    } else {
        // 2. Preparar la consulta de actualización sin cambiar la contraseña
        $stmt = $conn->prepare("UPDATE encargado SET nombre_encargado = ? WHERE matricula_encargado = ?");
        $stmt->bind_param("ss", $nombreEncargado, $matriculaEncargado);
    }

    // 3. Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<p>¡Encargado actualizado exitosamente!</p>";
    } else {
        echo "<p>¡Error al actualizar el encargado: " . $stmt->error . "</p>";
    }

    // 4. Cerrar la declaración y la conexión
    $stmt->close();
} else {
    echo "<p>¡Error! No se proporcionaron los datos necesarios.</p>";
}
?>
