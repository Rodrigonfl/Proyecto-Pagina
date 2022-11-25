<?php
try{
$conn = new PDO('mysql:host=localhost; dbname=escuelapagr', 'root', '');
} catch(PDOException $e){
   echo "Error: ". $e->getMessage();
   die();
}
?>