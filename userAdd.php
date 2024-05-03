<?php
require_once('controlador-roles.php');

isSesionAdmin();
?>

<html>
    <php comprobar_admin(); ?>
<body>
    <form method="post" action="userAddPost.php">
        <p>
            <b>Username</b>
            <input type="text" name="username" />
        </p>
        <p>
        <p>
            <b>Password</b>
            <input type="password" name="password" />
        </p> 
            <b>Email</b>
            <input type="text" name="email" />
        </p>  
        <p>
            <b>DNI</b>
            <input type="text" name="dni" />
        </p>
        <p>
            <b>Rol</b>
            <select name="tipo">
                <option value="Administrador">Administrador</option>
                <option value="Gestor_de_proyectos">Gestor_de_proyectos</option>
                <option value="Participante">Participante</option>
            </select>
        </p>
        <p>
            <button type="submit">Enviar</button>
        </p>
    </form>                   
</body>
</html>