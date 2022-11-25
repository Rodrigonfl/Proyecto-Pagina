<!DOCTYPE html>
<?php
require 'functions.php';

$permisos = ['Administrador'];
permisos($permisos);

//selección tipo usuario
$users = $conn->prepare("select * from users");
$users->execute();
$users = $users->fetchAll();

?>
<html>
<head>
    <title>Registro de Usuarios | Registro de Notas</title>
    <meta name="description" content="Registro de Notas Escuela Paul Groussac"/>
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
        <li class="active"><a href="registro.view.php">Registro</a> </li>
		<li><a href="eliminacion.view.php">Eliminacion</a> </li>
        <li class="right"><a href="logout.php">Salir</a> </li>

    </ul>
</nav>

<div class="body">
    <div class="panel">
        <form id="form" class="form" method="post" action="registrouser.php">
        
				<label> Usuario</label> <br>
        <input type="text" class="cajaentradatexto" required name="usuario"><br>
				
				<label>Contraseña</label><br>
        <input type="password" class="cajaentradatexto" required name="password"><br>
							
				<label>Tipo de Usuario</label><br>
        <select name="tipo" required>
                    <?php foreach ($users as $user):?>
                        <option value="<?php echo $user['id'] ?>">
						<?php echo $user['username'] ?></option>
                    <?php endforeach;?>
                </select>
        
		<button type="submit" class="botonenviar" name="btnregistrarx">Registrar</button>
        </form>
    </div>
</div>

<footer>
    <p>Derechos reservados &copy; 2022</p>
</footer>

</body>
</html>