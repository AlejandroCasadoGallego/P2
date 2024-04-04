<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gestión de Proyectos</title>
    <link rel="stylesheet" href="Registro.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS_Registro.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                <img src="Logo.png" alt="Logo de Gestión de Proyectos">
            </div>
        </div>
    </header>

    <div class="form-container">
        <h1>Registro de Usuario</h1>
        <form id="registrationForm" method="post" action="practica-controller.php/registro">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
                <span class="error-message" style="display:none;" id="usuario-error"></span>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message" style="display:none;" id="email-error"></span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message" style="display:none;" id="password-error"></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirmar Contraseña:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span class="error-message" style="display:none;" id="confirmPassword-error"></span>
            </div>

            <input type="submit" id="boton" value="Registrarse">
        </form>
        <p>¿Ya tienes cuenta? <a href="Login.php" class="vinculo">Inicia sesión aquí</a>.</p>
    </div>

    <footer>
        <div class="container" id="footer">
            <section id="contacto">
                <h2>Contacta Con Nosotros</h2>
                <p>¿Tienes preguntas? Estamos aquí para ayudarte.</p>
                <p>Email: contacto@gestionproyectos.com</p>
            </section>
            <div class="footer-nav">
                <ul>
                    <li><a href="#">Política de Privacidad</a></li>
                    <li><a href="#">Términos de Uso</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <p class="copy">&copy; 2024 Gestión de Proyectos. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

<?php if( isset($_GET['error']) ) :?>
    <p style="color: red">
        <?php if( $_GET['error']=='void' ) { echo "<script>
    try {
        mostrarError($('#usuario-error'), 'Campo/s vacíos.');
    } catch { }
    </script>";
    } ?>
        <?php if( $_GET['error']=='password' ) { echo "<script>
    try {
        mostrarError($('#password-error'), 'Contraseña incorrecta.');
    } catch { }
    </script>";
    } ?>
        <?php if( $_GET['error']=='registro' ) { echo "<script>
    try {
        mostrarError($('#usuario-error'), 'Error en el registro.');
    } catch { }
    </script>";
    } ?>
    </p>
<?php endif; ?>

</html>
