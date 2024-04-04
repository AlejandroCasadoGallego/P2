<?php
define('FICHERO_DATOS', __DIR__. DIRECTORY_SEPARATOR ."usuarios.json");

/**
 * Devuelve los usuarios en el fichero como un array de datos hash
 */
function user_get_all() 
{
    if( !file_exists(FICHERO_DATOS) ) {
        user_save([]);
    }
    $users = json_decode(file_get_contents(FICHERO_DATOS), false);
    // Post processsing
    
    return $users;
}

function user_get($username) 
{
    $users = user_get_all();
    foreach($users as $u) {
        if( $u->username==$username ) {
            return $u;
        }
    }
    return null;
}

function user_edit($username, $data) 
{
    $success = false;
    $users = user_get_all();
    foreach($users as &$u) {
        if( $u->username==$username ) {
            $u->dni = $data['dni'];
            $u->nombre = $data['nombre'];
            $u->email = $data['email'];
            if( $data['password']!='' ) {
                $u->password = md5($data['password']);
            }
            $success = true;
        }
    }
    // Guardar los datos
    user_save($users);
    return $success;
}

function user_delete($username) 
{
    $success = false;
    $users = user_get_all();
    foreach($users as $key => &$u) {
        if( $u->username==$username ) {
            unset($users[$key]);
            // ...
            $success = true;
        }
    }
    // Guardar los datos
    user_save($users);
    return $success;
}

function user_add($data) 
{
    $users = user_get_all();
    
    // Verificar si el usuario ya existe
    foreach ($users as $user) {
        if ($user->username == $data['username']) {
            return false; // Usuario ya existe
        }
    }
    
    // Agregar el nuevo usuario al array de usuarios
    $users[] = $data;    
    
    // Guardar los datos
    user_save($users);
    
    return $users;
}

function user_save($users)
{
    file_put_contents(FICHERO_DATOS, json_encode($users, JSON_PRETTY_PRINT));
}
