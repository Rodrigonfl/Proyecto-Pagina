<?php
include('conexion.php');

$correo = $_POST["correo"];
$pass 	= $_POST["password"];
$usu 	= $_POST["usuario"];
$confirpass 	= $_POST["confirpassword"];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 0)
{
	$queryregistrar = "INSERT INTO usuarios (id, usuario, correo, password) values (null,'$usu','$correo',md5('$pass'))";
	

if(mysqli_query($conn,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $usu');window.location= 'index.html' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysqli_error($conn);
}

}
else
{
		echo "<script> alert('No puedes registrar este correo: $correo');window.location= 'index.html' </script>";
}
?>