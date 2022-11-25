<?php
require 'functions.php';

$permisos = ['Administrador'];
permisos($permisos);
//consulta los usuarios para el listaddo de users
$usuarios = $conn->prepare("select a.id, a.num_lista, a.nombres, a.apellidos, a.genero, b.nombre as grado, c.nombre as seccion from alumnos as a inner join grados as b on a.id_grado = b.id inner join secciones as c on a.id_seccion = c.id order by a.apellidos");
$usuarios->execute();
$usuarios = $usuarios->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Eliminacion de Usuarios | Registro de Notas</title>
    <meta name="description" content="Registro de Notas Escuela Paul Groussac" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<div class="header">
        <h1>Registro de Notas - Escuela "Paul Groussac"</h1>
        <h3>Usuario:  <?php echo $_SESSION["username"] ?></h3>
</div>
<nav>
    <ul>
        <li><a href="inicio.view.php">Inicio</a> </li>
        <li><a href="alumnos.view.php">Registro de Alumnos</a> </li>
        <li><a href="listadoalumnos.view.php">Listado de Alumnos</a> </li>
        <li><a href="notas.view.php">Registro de Notas</a> </li>
        <li><a href="listadonotas.view.php">Consulta de Notas</a> </li>
        <li><a href="registro.view.php">Registro</a> </li>
		<li  class="active"><a href="eliminacion.view.php">Eliminación</a> </li>
        <li class="right"><a href="logout.php">Salir</a> </li>

    </ul>
</nav>

<div class="body">
    <div class="panel">
            <h4>Listado de Usuarios</h4>
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>Username</th>
					<th>Contraseña</th> 
					<th>Tag</th>
					<th>Rol</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($usuarios as $usuario) :?>
                <tr>
                    <td align="center"><?php echo $usuario['username'] ?></td>
					<td><?php echo $usuario['password'] ?></td>
					<td> <p><?php echo $usuario['tag'] ?></p> </td>
                    <td><?php echo $usuario['rol'] ?></td>					
                    <td><a href="alumnodelete.php?id=<?php echo $usuario['id'] ?>">Eliminar</a> </td>
                </tr>
                <?php endforeach;?>
            </table>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>
        </div>
</div>

<footer>
    <p>Derechos reservados &copy; 2022</p>
</footer>

</body>

</html>