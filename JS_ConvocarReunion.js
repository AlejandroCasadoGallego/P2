$(document).ready(function () {
    var scheduleMeetingForm = $('#scheduleMeetingForm');

    scheduleMeetingForm.submit(function (e) {
        var huboError = false;

        $('.error-message').hide();

        var meetingTitle = $('#meetingTitle').val();
        var meetingDate = $('#meetingDate').val();
        var meetingDescription = $('#meetingDescription').val();
        var attendees = $('#attendees').val();
        var meetingLocation = $('#meetingLocation').val();

        if (meetingTitle === "") {
            mostrarError($('#titulo-error'), 'El título de la reunión no puede estar vacío.');
            huboError = true;
        }

        if (meetingDate === "") {
            mostrarError($('#fecha-error'), 'La fecha de la reunión no puede estar vacía.');
            huboError = true;
        }

        if (meetingDescription === "") {
            mostrarError($('#descripcion-error'), 'La descripción no puede estar vacía.');
            huboError = true;
        }

        if (attendees.length === 0) {
            mostrarError($('#desplegable-error'), 'Debes seleccionar al menos un participante.');
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