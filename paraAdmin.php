<?php
require_once('libdata.php');
require_once('controlador-roles.php');

// Obtener todos los usuarios con sus preferencias
$users = user_get_all();
isSesionAdmin();

?>

<html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Usuarios</h2>
    <a href="userAdd.php">Añadir</a>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Email</th>
            <th>Dni</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach($users as $u): ?>
            <tr>
                <td><?php echo $u['username'];?></td>
                <td><?php echo $u['email'];?></td>
                <td><?php echo $u['dni'];?></td>
                <td><?php echo $u['telefono'];?></td>
                <td><?php echo $u['rol'];?></td>
                <td>
                    <a href="userEdit.php?id=<?php echo $u['id']?>">Editar</a>
                    <a href="userDelete.php?id=<?php echo $u['id']?>" onclick="">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Proyectos</h2>
    <a href="informe_proyectos.php">Ver informe de proyectos</a>
</body>
</html>