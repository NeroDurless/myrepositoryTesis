<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprobación de registro</title>
</head>

<body>

<?php

//include('login.php');

	$usuario= ( empty($_POST['usu']) )   ? NULL : $_POST['usu'];
	$contraseña= ( empty($_POST['contra']) ? NULL : $_POST['contra']);
	
/*	$pass_cifrado=password_hash($contraseña, PASSWORD_DEFAULT, array("cost"=>12));*/
	
	

	try{
		
		$base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
		//Datos de la conexión con la BD
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Propiedades de la conexión con la BD

		$sql = "INSERT INTO USUARIOS_PASS (USUARIO, PASSWORD) VALUES (:usu, :contra)"; 
		//Instrucción SQL que se encarga de mirar en la BD si el usuario existe o no existe//
		//Tanto :login y :password son MARCADORES.
		
		$resultado=$base->prepare($sql);


		//Prepare es una función que se encargará de preparar nuestra sentencia SQL
		
		$resultado->execute(array(":usu"=>$usuario, ":contra"=>$contraseña));
		
		header("location:login.php");
		
		
		
	}catch(Exception $e)
	
	{
		die("Error: " . $e->getMessage());
					header("location:login.php");
	}

?>
</body>
</html>