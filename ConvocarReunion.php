<?php
require_once "controlador-roles.php";
isSesionGestor()
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Convocar Reunión - Gestión de Proyectos</title>
        <link rel="stylesheet" href="ConvocarReunion.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="JS_ConvocarReunion.js"></script>
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
                        <?php impresionConPermiso('<li><a href="CrearTarea.php">Crear Tarea</a></li>', 'gestor')?>
                        <?php impresionConPermiso('<li><a href="CreacionProyectos.php">Crear Proyectos</a></li>', 'gestor')?>
                        <li><a href="EdicionPerfil.php">Editar Perfil</a></li>
                        <?php impresionConPermiso('<li><a href="EditarTarea.php">Editar Tareas</a></li>', 'gestor')?>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="form-container">
            <h1>Convocar Nueva Reunión</h1>
            <form id="scheduleMeetingForm">
                <div class="form-group escribir">
                    <label for="meetingTitle">Título de la Reunión:</label>
                    <input type="text" id="meetingTitle" name="meetingTitle">
                    <span class="error-message" style="display:none;" id="titulo-error"></span>
                </div>

                <div class="form-group escribir">
                    <label for="meetingDate">Fecha de la Reunión:</label>
                    <input type="datetime-local" id="meetingDate" name="meetingDate">
                    <span class="error-message" style="display:none;" id="fecha-error"></span>
                </div>

                <div class="form-group escribir">
                    <label for="meetingDescription">Descripción:</label>
                    <textarea id="meetingDescription" name="meetingDescription" rows="4"></textarea>
                    <span class="error-message" style="display:none;" id="descripcion-error"></span>
                </div>

                <div class="form-group">
                    <label for="attendees">Participantes:</label>
                    <select id="attendees" name="attendees" multiple>
                        <option value="usuario1">Usuario 1</option>
                        <option value="usuario2">Usuario 2</option>
                    </select>
                    <small>Usa Ctrl para seleccionar múltiples participantes</small>
                    <span class="error-message" style="display:none;" id="desplegable-error"></span>
                </div>

                <div class="form-group escribir">
                    <label for="meetingLocation">Ubicación (Opcional):</label>
                    <input type="text" id="meetingLocation" name="meetingLocation">
                    <span class="error-message" style="display:none;" id="ubicacion-error"></span>
                </div>

                <button type="submit" class="btn">Convocar Reunión</button>
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
