<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="container pt-5">
        <h1>LISTA DE ENCARGADOS</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroModal">Registrar Nuevo Encargado</button>
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Matrícula</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php include '../controllers/verEncargado.php';?>
        </tbody>
    </table>
        </div>
    </div>
</div>
    </div>
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroModalLabel">Registrar Encargado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registroForm" action="../controllers/registrarEncargado.php" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre_encargado" class="form-label">Nombre(s)</label>
                            <input type="name" class="form-control" id="nombre_encargado" name="nombre_encargado" required onkeyup="validarLetras(this)">
                        </div>
                        <div class="col-md-6">
                            <label for="matricula_encargado" class="form-label">Matricula</label>
                            <input type="number" class="form-control" id="matricula_encargado" name="matricula_encargado" required maxlength="8" oninput="validarMatricula(this)">
                        </div>
                        <div class="col-md-6">
                            <label for="correo_encargado" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo_encargado" name="correo_encargado" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="contrasena_encargado" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" id="contrasena_encargado" name="contrasena_encargado" required value="12345678" readonly>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    const campoNombre = document.getElementById('nombre');
    validarLetras(campoNombre);
    </script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src= "../assets/js/validaciones.js"></script>
<?php include '../includes/footer.php';?>
