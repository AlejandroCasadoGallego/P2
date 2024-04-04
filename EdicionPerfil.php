<?php
require_once "controlador-roles.php";
isSesionIniciada()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Gestión de Proyectos</title>
    <link rel="stylesheet" href="EditarPerfil.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS_EditarPerfil.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                <img src="Logo.png" alt="Logo de Gestión de Proyectos">
            </div>
            <nav>
                <ul>
                    <li><a href="InicioTrasRegistro.php">Inicio</a></li>
                    <li><a href="ListadoProyectos.php">Listado Proyectos</a></li>
                    <?php impresionConPermiso('<li><a href="EdicionProyectos.php">Editar Proyectos</a></li>', 'gestor')?>
                    <li><a href="ConvocarReunion.php">Convocar Reunión</a></li>
                    <?php impresionConPermiso('<li><a href="CreacionProyectos.php">Crear Proyectos</a></li>', 'gestor')?>
                    <?php impresionConPermiso('<li><a href="CrearTarea.php">Crear Tarea</a></li>', 'gestor')?>
                    <?php impresionConPermiso('<li><a href="EditarTarea.php">Editar Tareas</a></li>', 'gestor')?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="form-container">
        <h1>Editar Perfil de Usuario</h1>
        <form id="editProfileForm" method="post" action="editorPerfil.php">
            <div class="form-group escribir">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username">
                <span class="error-message" style="display:none;" id="nombre-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email">
                <span class="error-message" style="display:none;" id="correo-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="password">
                <span class="error-message" style="display:none;" id="contraseña-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni">
                <span class="error-message" style="display:none;" id="dni-error"></span>    
            </div>

            <div class="form-group escribir">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone">
                <span class="error-message" style="display:none;" id="telefono-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="skills">Habilidades:</label>
                <input type="text" id="skills" name="skills">
                <span class="error-message" style="display:none;" id="habilidades-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="office">Despacho:</label>
                <input type="text" id="office" name="office">
                <span class="error-message" style="display:none;" id="despacho-error"></span>
            </div>

            <input type="submit" class="btn" value="Actualizar Perfil">
        </form>
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
</html>
