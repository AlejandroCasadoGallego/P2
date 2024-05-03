<?php
    require_once("libdata.php");

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $rol = isset($_POST['tipo']) ? $_POST['tipo'] : null;

    $password = md5($password);

    if ($username == null || $dni == null || $password == null || $email == null || $rol == null) {
        header("Location: userEdit.php?error=validation&id=$id");
        exit;
    }

    $ultimaConexion = date("Y-m-d H:i:s");
    $activo = 1;
    $result = user_update($username, $password, $email, $dni, $telefono, $rol, $ultimaConexion, $activo);

    if (!$result) {
        header("Location: userEdit.php?error=data&id=$id");
        exit;
    }

    header("Location: paraAdmin.php");
    exit;    
