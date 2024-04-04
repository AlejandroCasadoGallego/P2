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
    <title>Gestión de Proyectos - Inicio</title>
    <link rel="stylesheet" href="Inicio.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                <img src="Logo.png" alt="Logo de Gestión de Proyectos">
            </div>
            <nav>
                <ul>
                    <li><a href="#proyectos">Catálogo de Proyectos</a></li>
                    <li><a href="#informacion">Información General</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="Login.php">Iniciar Sesión</a></li>
                    <li><a href="Registro.php">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="bienvenida" class="hero">
            <div class="hero-content">
                <h1>Bienvenidos a Gestión de Proyectos</h1>
                <p>La plataforma líder para administrar tus proyectos de manera eficiente y colaborativa.</p>
                <a href="Registro.php" class="btn btn-primary">Únete Ahora</a>
            </div>
        </section>

        <section id="proyectos">
            <div class="container">
                <h2>Proyectos Destacados</h2>
                <div class="proyecto-grid">
                    <article class="proyecto">
                        <img src="proyecto1.jpg" alt="Proyecto 1">
                        <div class="proyecto-info">
                            <h3>Rediseño Web Corporativo</h3>
                            <p>Autor: Ana Martínez</p>
                            <a href="#" class="btn" onclick="alert('Primero debes registrarte/Iniciar sesion'); return false;">Ver Proyecto</a>
                        </div>
                    </article>
                    <article class="proyecto">
                        <img src="proyecto2.jpg" alt="Proyecto 2">
                        <div class="proyecto-info">
                            <h3>Aplicación Móvil Educativa</h3>
                            <p>Autor: Carlos López</p>
                            <a href="#" class="btn" onclick="alert('Primero debes registrarte/Iniciar sesion'); return false;">Ver Proyecto</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="informacion">
            <div class="container">
                <h2>¿Por Qué Elegir Nuestra Plataforma?</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Colaboración en Tiempo Real</h3>
                        <p>Facilita la colaboración entre equipos, estén donde estén.</p>
                    </div>
                    <div class="info-item">
                        <h3>Seguridad de Datos</h3>
                        <p>Tus proyectos están seguros gracias a nuestras avanzadas medidas de seguridad.</p>
                    </div>
                    <div class="info-item">
                        <h3>Integraciones Flexibles</h3>
                        <p>Integra herramientas que ya usas, como GitHub, Slack y más.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
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
