<?php
require_once "controlador-roles.php";
isSesionIniciada()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proyectos - Gestión de Proyectos</title>
    <link rel="stylesheet" href="ListadoProyectos.css">
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
                    <?php impresionConPermiso('<li><a href="CreacionProyectos.php">Crear Proyectos</a></li>', 'gestor')?>
                    <li><a href="ConvocarReunion.php">Convocar Reunión</a></li>
                    <?php impresionConPermiso('<li><a href="CrearTarea.php">Crear Tarea</a></li>', 'gestor')?>
                    <li><a href="EdicionPerfil.php">Editar Perfil</a></li>
                    <?php impresionConPermiso('<li><a href="EdicionProyectos.php">Editar Proyectos</a></li>', 'gestor')?>
                    <?php impresionConPermiso('<li><a href="EditarTarea.php">Editar Tareas</a></li>', 'gestor')?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="projects-container">
        <h1>Listado de Proyectos</h1>
        <table id="projectsTable">
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Líder</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rediseño de Sitio Web</td>
                    <td>Ana Martínez</td>
                    <td>2024-01-15</td>
                    <td>2024-06-30</td>
                    <td>
                        <a href="EdicionProyectos.php?id=1">Editar</a> |
                        <?php impresionConPermiso('<a href="#">Eliminar</a>', 'admin')?>
                    </td>
                </tr>
                <tr>
                    <td>Aplicación Móvil Educativa</td>
                    <td>Carlos López</td>
                    <td>2024-01-15</td>
                    <td>2024-06-30</td>
                    <td>
                        <a href="EdicionProyectos.php?id=1">Editar</a> |
                        <?php impresionConPermiso('<a href="#">Eliminar</a>', 'admin')?>
                    </td>
                </tr>
            </tbody>
        </table>
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
