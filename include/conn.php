<?php
// Conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "test";
$db = "mysql:host=$servidor;dbname=$basededatos";

try{
   $coneccion = new PDO($db,$usuario, $password);
}catch(PDOException $error){
		echo $error->getMessage();

}


?>