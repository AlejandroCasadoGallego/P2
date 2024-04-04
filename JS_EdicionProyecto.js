$(document).ready(function () {
    var editProjectForm = $('#editProjectForm');

    editProjectForm.submit(function (e) {
        var huboError = false;

        $('.error-message').hide();

        var projectName = $('#projectName').val();
        var description = $('#description').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var projectLead = $('#projectLead').val();

        if (projectName === "") {
            mostrarError($('#nombre-error'), 'El nombre del proyecto no puede estar vacío.');
            huboError = true;
        }

        if (description === "") {
            mostrarError($('#descripcion-error'), 'La descripción no puede estar vacía.');
            huboError = true;
        }

        if (startDate === "") {
            mostrarError($('#fechaIni-error'), 'La fecha de inicio no puede estar vacía.');
            huboError = true;
        }

        if (endDate === "") {
            mostrarError($('#fechaFin-error'), 'La fecha de finalización no puede estar vacía.');
            huboError = true;
        }

        if (projectLead === "") {
            mostrarError($('#lider-error'), 'El líder del proyecto no puede estar vacío.');
            huboError = true;
        }

        if (huboError) {
            e.preventDefault();
        }else {
            e.preventDefault();
            window.location.href = "ListadoProyectos.php";
        }
    });
});

function mostrarError(elemento, mensaje) {
    elemento.text(mensaje);
    elemento.show();
}