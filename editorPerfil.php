<?php
require_once ('practica.inc.php');
require_once ('Participante.class.php');
require_once ('Gestor.class.php');
require_once ('Administrador.class.php');
require_once ('practica-lib.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$dni = $_POST['dni'];
$phone = $_POST['phone'];
$skills = $_POST['skills'];
$office = $_POST['office'];

session_start();

    if($_SESSION['user']->isGestor()){
        $rol = 'Gestor_de_proyectos';
        $users = user_get_all();
        foreach($users as &$u) {
            if( $u->username==$username ) {
                $u->username = $username;
                $u->email = $email;
                if( $password!='' ) {
                    $u->password = md5($password);
                }
                $u->rol = $rol;
                $u->DNI = $dni;
                $u->telefono = $phone;
                $u->skills = $skills;
                $u->despacho = $office;
            }
        }
    // Guardar los datos
    user_save($users);
    }
    else if($_SESSION['user']->isAdmin()){
        if($_SESSION['user']->isGestor()){
            $rol = 'Administrador';
            $users = user_get_all();
            foreach($users as &$u) {
                if( $u->username==$username ) {
                    $u->username = $username;
                    $u->email = $email;
                    if( $password!='' ) {
                        $u->password = md5($password);
                    }
                    $u->rol = $rol;
                    $u->DNI = $dni;
                    $u->telefono = $phone;
                    $u->skills = $skills;
                    $u->despacho = $office;
                }
            }
        // Guardar los datos
        user_save($users);
        }
    }
    else{
        $rol = 'Participante';
        $users = user_get_all();
        foreach($users as &$u) {
            if( $u->username==$username ) {
                $u->username = $username;
                $u->email = $email;
                if( $password!='' ) {
                    $u->password = md5($password);
                }
                $u->rol = $rol;
                $u->DNI = $dni;
                $u->telefono = $phone;
                $u->skills = $skills;
                $u->despacho = $office;
                }
            }
        // Guardar los datos
        user_save($users);
    }
    header("Location: $SITE/InicioTrasRegistro.php");
    exit;
