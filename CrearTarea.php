<?php
require_once "controlador-roles.php";
isSesionGestor()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea - Gestión de Proyectos</title>
    <link rel="stylesheet" href="CrearTarea.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS_CrearTarea.js"></script>
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
                    <li><a href="EdicionPerfil.php">Editar Perfil</a></li>
                    <?php impresionConPermiso('<li><a href="EditarTarea.php">Editar Tareas</a></li>', 'gestor')?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="form-container">
        <h1>Crear Nueva Tarea</h1>
        <form id="createTaskForm">
            <div class="form-group escribir">
                <label for="taskName">Nombre de la Tarea:</label>
                <input type="text" id="taskName" name="taskName">
                <span class="error-message" style="display:none;" id="nombre-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" rows="4"></textarea>
                <span class="error-message" style="display:none;" id="descripcion-error"></span>
            </div>

            <div class="form-group">
                <label for="assignedTo">Asignar a:</label>
                <select id="assignedTo" name="assignedTo">
                    <option value="">Selecciona un miembro del equipo</option>
                    <option value="usuario1">Usuario 1</option>
                    <option value="usuario2">Usuario 2</option>
                </select>
                <span class="error-message" style="display:none;" id="desplegable-error"></span>
            </div>

            <div class="form-group escribir">
                <label for="dueDate">Fecha de Vencimiento:</label>
                <input type="date" id="dueDate" name="dueDate">
                <span class="error-message" style="display:none;" id="fecha-error"></span>
            </div>

            <div class="form-group">
                <label for="priority">Prioridad:</label>
                <select id="priority" name="priority">
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
                <span class="error-message" style="display:none;" id="desplegable2-error"></span>
            </div>

            <button type="submit" class="btn">Crear Tarea</button>
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
