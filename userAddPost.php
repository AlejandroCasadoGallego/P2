<?php
require_once("libdata.php");
require_once('controlador-roles.php');

isSesionAdmin();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$rol = isset($_POST['tipo']) ? $_POST['tipo'] : null;

$password = md5($password);

// Verificar si algún campo requerido está vacío
if ($email == null || $password == null || $username == null || $dni == null || $rol == null) {
    header("Location: userAdd.php?error=validation");
    exit;
}


// Llamar a la función user_insert() con los datos del formulario
$user = user_insert([
    'username' => $username,
    'password' => md5($password),
    'email' => $email,
    'DNI' => $dni,
    'rol' => $rol,
    'activo' => '1'
]) ;

// Verificar si la inserción fue exitosa
if ($user !== true) {
    header("Location: userAdd.php?error=data".$rol);
    exit;
}

// Redirigir al usuario a la página de inicio después de la inserción exitosa
header("Location: paraAdmin.php");
exit;
