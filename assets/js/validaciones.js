function validarLetras(input) {
    // Expresión regular para letras y espacios
    const regex = /^[a-zA-Z\s]+$/;

    // Evento input para validar mientras se escribe
    input.addEventListener('input', function () {
        const valor = input.value;

        if (!regex.test(valor)) {
            // Si el valor no es válido, mostrar un mensaje de error
            input.setCustomValidity("Solo se permiten letras en este campo.");
            input.reportValidity();
        } else {
            // Si el valor es válido, limpiar el mensaje de error
            input.setCustomValidity("");
        }
    });
}



function validarMatricula(matriculaInput) {
    const matricula = matriculaInput.value;
    const correo = document.getElementById('correo_encargado');
    
    // Si el campo de matrícula está vacío, borrar el valor del campo de correo
    if (matricula === "") {
        correo.value = "";
        return false;
    }

    // Expresión regular para números y longitud entre 1 y 8 dígitos
    const matriculaRegex = /^\d{1,8}$/;
    
    // Validar el valor con la expresión regular
    if (!matriculaRegex.test(matricula)) {
        alert("La matrícula solo puede contener números y debe tener entre 1 y 8 dígitos.");
        matriculaInput.value = ""; // Borrar el valor del campo
        correo.value = ""; // Borrar el valor del campo de correo también
        matriculaInput.focus(); // Enfocar el campo de entrada
        return false; // Devolver false para indicar que la validación falló
    }
    
    // Actualizar el campo de correo con el valor de la matrícula
    correo.value = matricula + '@utcgg.edu.mx';

    // Si la validación es exitosa, devolver true
    return true;
}


function confirmarEliminacion() {
    return confirm("¿Estás seguro de que deseas eliminar este encargado?");
}
