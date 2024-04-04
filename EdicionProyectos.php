<?php
require_once "controlador-roles.php";
isSesionGestor()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto - Gestión de Proyectos</title>
    <link rel="stylesheet" href="EdicionProyectos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS_EdicionProyecto.js"></script>
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
                    <?php impresionConPermiso('<li><a href="CreacionProyectos.php">Crear Proyectos</a></li>', 'gestor')?>
                    <li><a href="ConvocarReunion.php">Convocar Reunión</a></li>
                    <?php impresionConPermiso('<li><a href="CrearTarea.php">Crear Tarea</a></li>', 'gestor')?>
                    <li><a href="EdicionPerfil.php">Editar Perfil</a></li>
                    <?php impresionConPermiso('<li><a href="EditarTarea.php">Editar Tareas</a></li>', 'gestor')?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form-container">
        <h1>Editar Proyecto</h1>
        <form id="editProjectForm">
            <input type="hidden" id="projectId" name="projectId">

            <div class="form-group">
                <label for="projectName">Nombre del Proyecto:</label>
                <input type="text" id="projectName" name="projectName">
                <span class="error-message" style="display:none;" id="nombre-error"></span>
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" rows="4"></textarea>
                <span class="error-message" style="display:none;" id="descripcion-error"></span>
            </div>

            <div class="form-group">
                <label for="startDate">Fecha de Inicio:</label>
                <input type="date" id="startDate" name="startDate">
                <span class="error-message" style="display:none;" id="fechaIni-error"></span>
            </div>

            <div class="form-group">
                <label for="endDate">Fecha de Finalización:</label>
                <input type="date" id="endDate" name="endDate">
                <span class="error-message" style="display:none;" id="fechaFin-error"></span>
            </div>

            <div class="form-group">
                <label for="projectLead">Líder del Proyecto:</label>
                <input type="text" id="projectLead" name="projectLead">
                <span class="error-message" style="display:none;" id="lider-error"></span>
            </div>

            <button type="submit" class="btn">Actualizar Proyecto</button>
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
