<?php
require_once ('practica.inc.php');
require_once ('practica-lib.php');
require_once ('Participante.class.php');
require_once('Gestor.class.php');
require_once('Administrador.class.php');

$PATH = $_SERVER['PATH_INFO'];

if ($PATH == '/login') {
    // Procesar datos
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Validación
    if ($username == '' || $password == '') {
        header("Location: $SITE/Login.php?error=void");
        exit;
    }
    // Control logic
    $user = user_get($username);
    if ($user == null) {
        // Usuario no existe. Reenviamos al formulario de login
        header("Location: $SITE/Login.php?error=username");
        exit;
    } else {
        if ($user->password != md5($password)) {
            // Contraseña incorrecta. Reenviamos al formulario de login
            header("Location: $SITE/Login.php?error=password");
            exit;
        } else {
            session_start();
            $_SESSION['auth'] = true;
            // unset($user->password);
            if ($user->rol == 'Administrador') {
                $_SESSION['user'] = new Administrador($username, $user->email, $user->password, $user->rol, $user->DNI, $user->telefono, $user->despacho, $user->skills);
            } elseif ($user->rol == 'Gestor_de_proyectos') {
                $_SESSION['user'] = new Gestor($username, $user->email, $user->password, $user->rol, $user->DNI, $user->telefono, $user->despacho, $user->skills);
            } else {
                $_SESSION['user'] = new Participante($user, $user->email, $user->password, $user->rol, $user->DNI, $user->telefono, $user->despacho, $user->skills);
            }
            // Exito de login. Redirigimos a una pagina interna de la aplicacion
            header("Location: $SITE/InicioTrasRegistro.php");
            exit;
        }
    }
} else if ($PATH == '/registro') {
    // Procesar datos
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $username = $_POST['username'];
    // Validación
    if ($email == '' || $password == '' || $username == '') {
        header("Location: $SITE/Registro.php?error=void");
        exit;
    }
    if ($password != $confirmPassword) {
        header("Location: $SITE/Registro.php?error=password");
        exit;
    }

    // Control logic
    $res = user_add([
        'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'rol' => 'Participante',
        'DNI' => '',
        'telefono' => '',
        'skills' => [],
        'despacho' => ''
    ]);

    if ($res !== true) {
        // Usuario no existe. Reenviamos al formulario de login
        header("Location: $SITE/Registro.php?error=registro");
        exit;
    }

    header("Location: $SITE/Login.php");
    exit;

}

session_start();
if (!isset($_SESSION['auth'])) {
    // No autentificado
    header('Location: Login.php');
    exit;
}

if ($PATH == '/profile') {

} else if ($PATH == '/edit') {
    // Procesar datos
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    // Validación
    if ($email == '') {
        header('Location: e14-edit.php?id=' . $email . 'error=void');
        exit;
    }
    if ($password != '' && ($password != $password1)) {
        header('Location: e14-edit.php?id=' . $email . 'error=password');
        exit;
    }

    // Control logic
    $res = user_edit($email, [
        'email' => $email,
        'password' => $password,
        'nombre' => $nombre,
        'apellidos' => $apellidos
    ]);
    if ($res !== true) {
        // Usuario no existe. Reenviamos al formulario de login
        header('Location: e14-panel.php');
        exit;
    } else {
        header('Location: e14-panel.php?error=edit');
        exit;
    }
} else if ($PATH == '/delete') {
    $user = user_get($_GET['id']);
    if (!$user) {
        header("Location: e14-panel.php?error=delete");
        exit;
    }

    user_delete($_GET['id']);
    header("Location: e14-panel.php");
    exit;
} else {
    echo "Action not allowed";
    exit;
}