$(document).ready(function () {
    var editProfileForm = $('#editProfileForm');

    editProfileForm.submit(function (e) {
        var huboError = false;

        $('.error-message').hide();

        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var dni = $('#dni').val();
        var phone = $('#phone').val();
        var habilidades = $('#skills').val();
        var office = $('#office').val();

        if (username === "") {
            mostrarError($('#nombre-error'), 'El nombre de usuario no puede estar vacío.');
            huboError = true;
        }

        if (email === "") {
            mostrarError($('#correo-error'), 'El email no puede estar vacío.');
            huboError = true;
        }

        var formatoEmail = /^([a-zA-Z0-9+-.]+)@(([a-zA-Z0-9]+.)+)[a-zA-Z]+$/;
        if (!formatoEmail.test(email)) {
            mostrarError($('#correo-error'), 'El email no tiene un formato valido.');
            hayError = true;
        }

        if (password === "") {
            mostrarError($('#contraseña-error'), 'La contraseña no puede estar vacía.');
            huboError = true;
        }

        if (password && !validarPassword(password)) {
            mostrarError($('#contraseña-error'), 'La contraseña no cumple con los requisitos.');
            huboError = true;
        }

        var formatoDNI = /^\d{8}[A-Z]$/;
        if (!formatoDNI.test(dni)) {
            mostrarError($('#dni-error'), 'El DNI no tiene un formato válido.');
            hayError = true;
        }

        var formatoTelf = /^([0-9]{9})+$/;
        if (!formatoTelf.test(phone)) {
            mostrarError($('#telefono-error'), 'El telefono no tiene un formato valido.');
            hayError = true;
        }

        if (phone === "") {
            mostrarError($('#telefono-error'), 'El telefono no debe de estar vacio.');
            huboError = true;
        }

        var habilidadesArray = habilidades.split(',');
        for (var i = 0; i < habilidadesArray.length; i++) {
            if (habilidadesArray[i].trim() === "") {
                mostrarError($('#habilidades-error'), 'Las habilidades no pueden estar vacías y deben ir separadas por ,');
                huboError = true;
                break;
            }
        }

        if (huboError) {
            e.preventDefault();
        } else {
            e.preventDefault();
        }
    });
});

function mostrarError(elemento, mensaje) {
    elemento.text(mensaje);
    elemento.show();
}

function validarPassword(password) {
    var formatoContraseña = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return formatoContraseña.test(password);
}
