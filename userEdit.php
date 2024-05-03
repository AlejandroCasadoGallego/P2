<?php
    require_once('controlador-roles.php');
    require_once("libdata.php");
    isSesionAdmin();
    if (!isset($_GET['username'])) {
        header("Location: index.php?error=id");
        exit;
    }

    $username = $_GET['username'];
    $user = user_get($username);
?>
<html>
<body>
    <form method="post" action="userEditPost.php?id=<?php echo $id ?>">
        <p>
            <b>Username</b>
            <input type="text" name="username" value="<?php echo $user['username'] ?>" />
        </p>
        <p>
            <b>Password</b>
            <input type="password" name="password"/>
        </p> 
        <p>
            <b>Email</b>
            <input type="text" name="email" value="<?php echo $user['email'] ?>" />
        </p>  
        <p>
            <b>DNI</b>
            <input type="text" name="dni" value="<?php echo $user['dni'] ?>" />
        </p>  
        
        <p>
            <b>Tipo</b>
            <select name="tipo">
                <option value="administrador" <?php echo ($user['tipo'] == 'administrador') ? 'selected' : ''; ?>>Administrador</option>
                <option value="gestor" <?php echo ($user['tipo'] == 'gestor') ? 'selected' : ''; ?>>Gestor</option>
                <option value="participante" <?php echo ($user['tipo'] == 'participante') ? 'selected' : ''; ?>>Participante</option>
            </select>
        </p>  
        <p>
            <button type="submit">Enviar</button>
        </p>
    </form>                   
</body>
</html>