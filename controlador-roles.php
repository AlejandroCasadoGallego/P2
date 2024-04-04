<?php
require_once ('Gestor.class.php');
require_once ('Participante.class.php');
require_once ('Administrador.class.php');

function impresionConPermiso($html, $rolRequerido)
{

    // Imprime contenido para el rol de admin
    if ($rolRequerido == 'admin' && $_SESSION['user']->isAdmin()) {
        echo $html;
    }
    // Imprime contenido para el rol de gestor
    else if ($rolRequerido == 'gestor' && $_SESSION['user']->isGestor()) {
        echo $html;
    }

}

function isSesionIniciada()
{
    session_start(); // Iniciar la sesión
    if (!isset($_SESSION['user'])) {
        header('Location: ./login.php'); // Redirigir al inicio de sesión si la sesión no está activa
        exit();
    }
}

function isSesionGestor(){
    isSesionIniciada();
    if(!$_SESSION['user']->isGestor()){
        header('Location: ./InicioTrasRegistro.php');
        exit();
    }
}