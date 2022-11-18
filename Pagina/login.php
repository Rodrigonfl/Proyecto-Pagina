<?php

include('conexion.php');

$usu = $_POST["usuario"];
$pass 	= $_POST["password"];


$queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario ='$usu' and password = md5('$pass')");
$nr 		= mysqli_num_rows($queryusuario);  

if ($nr == 1)  
	{ 
	echo	"<script> alert('Usuario logueado.');window.location= 'inicio.php' </script>";
	}
else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'index.html' </script>";
	}
?>