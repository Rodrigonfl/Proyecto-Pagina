<?php
require 'functions.php';
if($_SESSION['rol'] =='Administrador') 
	{
		if (isset($_POST['users']))
		{
				$user = $_POST['username'];
				$password = $_POST['password'];
				$user_type = $_POST['rol'];
				$query = "INSERT INTO users(username, password, rol) VALUES ($user, $password, $user_type)");
				$result = mysqli_query($conn, $query);
		
		if (!$result) 
			{
				die('Ha ocurrido un error');
			}
		}
		
	}
		else	
		{
		header('location:inicio.view.php?err=1');
		}
?>