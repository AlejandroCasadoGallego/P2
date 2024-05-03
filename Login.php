<?php
session_start();
session_unset();
session_destroy();

require_once('libdata.php');

$users = user_get_all(['preferencias'=>true]);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Gestión de Proyectos</title>
    <link rel="stylesheet" href="Login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS_Login.js"></script>
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
        <h1>Iniciar Sesión</h1>
        <form id="loginForm" method="post" action="practica-controller.php/login">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
                <span class="error-message" style="display:none;" id="usuario-error"></span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message" style="display:none;" id="password-error"></span>
            </div>

            <input type="submit" id="boton" value="Inicia Sesión">
        </form>
        <p>¿No tienes cuenta? <a href="Registro.php" class="vinculo">Regístrate aquí</a>.</p>
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
<?php if (isset($_GET['error'])): ?>

    <?php if ($_GET['error'] == 'void') {
        echo "<script>
    try {
        mostrarError($('#usuario-error'), 'Campo/s vacíos.');
    } catch { }
    </script>";
    } ?>
    <?php if ($_GET['error'] == 'username') {
        echo "<script>
    try {
        mostrarError($('#usuario-error'), 'No existe el usuario.');
    } catch { }
    </script>";
    } ?>
    <?php if ($_GET['error'] == 'password') {
        echo "<script>
    try {
        mostrarError($('#password-error'), 'Contraseña incorrecta.');
    } catch { }
    </script>";
    } ?>

<?php endif; ?>

</html>