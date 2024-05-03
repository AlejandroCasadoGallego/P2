<?php
require_once ('practica.inc.php');

function connect() {
    try {
        $DSN = "mysql:dbname=Practica_Desarrollo;host=127.0.0.1;port=3344;charset=utf8";
        $conn = new PDO($DSN, "root", "");
        return $conn;
    } 
    catch(PDOException $ex) {
        // Escribir al log $ex->getMessage()
        echo $ex->getMessage(); exit;
        return NULL;
    }
}

function user_get_all($options=[])
{
    $conn = connect();      // PDO object

    $SQL = "SELECT * FROM usuarios";

    $stmt = $conn->query($SQL);     // PDOStatement    

    $allUsers = [];
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        // Modificamos la estructura de fecha para que sea consistente con la base de datos
        // No hay necesidad de formatear las fechas en este caso, ya que la tabla no incluye una fecha de creación
        $allUsers[] = $row;
    }
    

    return $allUsers;
}

function user_get($username)
{
    $conn = connect();

    $SQL = "SELECT * FROM usuarios WHERE username = :username";

    $stmt = $conn->prepare($SQL);       // PDOStatement
    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 128);
    $stmt->execute();
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        return $row;
    }
    return NULL;
}

function obtenerPassword($username)
{
    $conn = connect();

    $SQL = "SELECT password FROM usuarios WHERE username = :username";

    $stmt = $conn->prepare($SQL);       // PDOStatement
    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 128);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['password'];
}

function user_insert($data) 
{

    $pdo = connect();
    $stmt = $pdo->prepare('INSERT INTO usuarios (username, password, email, DNI, rol, activo) VALUES (?, ?, ?, ?, ?, ?,)');
    $stmt->execute([$data['username'], md5($data['password']), $data['email'], $data['DNI'], $data['rol'], $data['activo']]);

    return $stmt->rowCount() > 0;

}
function user_update($username, $password, $email, $dni, $telefono, $rol, $ultimaConexion, $activo) 
{
    $conn = connect();

    $SQL = "UPDATE usuarios SET
                ,password = '$password'
                ,email = '$email'
                ,dni = '$dni'
                ,telefono = '$telefono'
                ,rol = '$rol'
                ,ultimaConexion = '$ultimaConexion'
                ,activo = '$activo'
            WHERE username = '$username'
    ";
    $nrows = $conn->exec($SQL);
    if( $nrows==1 ) {
        return true;
    }
    else {
        return false;
    }    
}

function user_delete($username) 
{
    $conn = connect();

    $SQL = "DELETE FROM usuarios WHERE username = '$username'";
    $nrows = $conn->exec($SQL);
    if( $nrows == 1 ) {
        return true;
    }
    else {
        return false;
    }
}


function preferencias_get_all()
{
    $conn = connect();      // PDO object

    $SQL = "SELECT * FROM preferencias";

    $stmt = $conn->query($SQL);     // PDOStatement    

    $all = [];
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        $row['date_created'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_created']))->format('d/m/Y H:i');
        $row['date_modified'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_modified']))->format('d/m/Y H:i');
        $all[] = $row;
    }

    return $all;
}

// Metodo 1
function preferencias_user1($id)
{
    $result =  [];
    $preferencias = preferencias_get_all();
    foreach($preferencias as $p) {
        if( $p['usuarios_id']==$id ) {
            $result[] = $p;
        }
    }
    return $result;
}

// Metodo 2
function preferencias_user2($id)
{
    $conn = connect();      // PDO object

    $SQL = "SELECT * FROM preferencias WHERE usuarios_id = ".$id;

    $stmt = $conn->query($SQL);     // PDOStatement    

    $result = [];
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        $row['date_created'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_created']))->format('d/m/Y H:i');
        $row['date_modified'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_modified']))->format('d/m/Y H:i');
        $result[] = $row;
    }

    return $result;
}

function groups_user($id)
{
    $conn = connect();      // PDO object

    $SQL = "SELECT g.* FROM grupos g left join grupos_has_usuarios gu on gu.grupos_id = g.id WHERE gu.usuarios_id = ".$id;

    $stmt = $conn->query($SQL);     // PDOStatement    

    $result = [];
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        $row['date_created'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_created']))->format('d/m/Y H:i');
        $row['date_modified'] = (DateTime::createFromFormat('Y-m-d H:i:s', $row['date_modified']))->format('d/m/Y H:i');
        $result[] = $row;
    }

    return $result;
}

function user_email($email)
{
    $conn = connect();

    $SQL = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $conn->prepare($SQL);       // PDOStatement
    $stmt->bindParam(':email', $email, PDO::PARAM_STR, 128);
    $stmt->execute();
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        return $row;
    }
    return NULL;
}

function preferencias_delete($id) 
{
    $conn = connect();

    $SQL = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($SQL);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $nrows = $conn->execute();
    if( $nrows == 1 ) {
        return true;
    }
    else {
        return false;
    }
}