$(document).ready(function () {
    var editTaskForm = $('#editTaskForm');

    editTaskForm.submit(function (e) {
        var huboError = false;

        $('.error-message').hide();

        var taskName = $('#taskName').val();
        var description = $('#description').val();
        var assignedTo = $('#assignedTo').val();
        var dueDate = $('#dueDate').val();
        var priority = $('#priority').val();
        var status = $('#status').val();

        if (taskName === "") {
            mostrarError($('#nombre-error'), 'El nombre de la tarea no puede estar vacío.');
            huboError = true;
        }

        if (description === "") {
            mostrarError($('#descripcion-error'), 'La descripción no puede estar vacía.');
            huboError = true;
        }

        if (assignedTo === "") {
            mostrarError($('#desplegable-error'), 'Debes asignar la tarea a un miembro del equipo.');
            huboError = true;
        }

        if (dueDate === "") {
            mostrarError($('#fecha-error'), 'La fecha de vencimiento no puede estar vacía.');
            huboError = true;
        }

        if (priority === "") {
            mostrarError($('#prioridad-error'), 'Debes seleccionar una prioridad para la tarea.');
            huboError = true;
        }

        if (status === "") {
            mostrarError($('#estado-error'), 'Debes seleccionar una prioridad para la tarea.');
            huboError = true;
        }

        if (huboError) {
            e.preventDefault();
        } else {
            e.preventDefault();
            window.location.href = "InicioTrasRegistro.php";
        }
    });
});

function mostrarError(elemento, mensaje) {
    elemento.text(mensaje);
    elemento.show();
}
