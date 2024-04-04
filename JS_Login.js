$(document).ready(function () {
    var registrationForm = $('#registrationForm');
    var loginButton = $('#boton');

    loginButton.click(function (e) {
        var username = $('#username').val();
        var password = $('#password').val();
        var hayError = false;

        $('.error-message').hide();

        if (username === "") {
            mostrarError($('#usuario-error'), 'El nombre de usuario no puede estar vacío.');
            hayError = true;
        }

        if (password === "") {
            mostrarError($('#password-error'), 'La contraseña no puede estar vacía.');
            hayError = true;
        }

        var formatoContraseña = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!formatoContraseña.test(password)) {
            mostrarError($('#password-error'), 'La contraseña no tiene un formato valido.');
            hayError = true;
        }

        if (hayError) {
            e.preventDefault();
        }
    });
});

function mostrarError(elemento, mensaje) {
    elemento.text(mensaje);
    elemento.show();
}