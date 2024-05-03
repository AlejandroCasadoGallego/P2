<?php
    require_once("libdata.php");
    require_once('controlador-roles.php');

    isSesionAdmin();

    if( !isset($_GET['username']) ) {
        header("Location: index.php?error=id");
        exit;
    }
    $result = user_delete($_GET['username']);
    if( !$result ) {
        header("Location: index.php?error=delete");
        exit;
    }

    header("Location: paraAdmin.php");
    exit; 