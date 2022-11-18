<?php
include('conexion.php');

$correo = $_POST['correo'];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['password'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= "Tu contraseña es:".$enviarpass;
$tucorreo			= "From: jaimeelbot12@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviado');window.location= 'index.html' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.html' </script>";
}
?>