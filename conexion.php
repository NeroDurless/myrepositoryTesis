<?php

	/*session_start();
	
	if(!isset($_SESSION["usuario"]))
	{
		header("location:login.php");
	}*/


	try{
		$base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET UTF8");
		
		}catch(Exception $e){
			
			die('Error: ' . $e->getMessage());
			echo "Línea del error: " . $e->getLine();
			error_reporting(E_ALL ^ E_NOTICE);
			
			
}

?>