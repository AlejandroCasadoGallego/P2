$(document).ready(function () {
    var registrationForm = $('#registrationForm');
    var registerButton = $('#boton');

    registerButton.click(function (e) {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();
        var hayError = false;

        $('.error-message').hide();

        if (username === "") {
            mostrarError($('#usuario-error'), 'El nombre de usuario no puede estar vacío.');
            hayError = true;
        }

        if (email === "") {
            mostrarError($('#email-error'), 'El email no puede estar vacío.');
            hayError = true;
        }

        var formatoEmail = /^([a-zA-Z0-9+-.]+)@(([a-zA-Z0-9]+.)+)[a-zA-Z]+$/;
        if (!formatoEmail.test(email)) {
            mostrarError($('#email-error'), 'El email no tiene un formato valido.');
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

        if (confirmPassword === "") {
            mostrarError($('#confirmPassword-error'), 'La contraseña de confirmacion no puede estar vacía.');
            hayError = true;
        }

        if (password !== confirmPassword) {
            mostrarError($('#confirmPassword-error'), 'Las contraseñas no coinciden.');
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