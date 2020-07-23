<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprobación de registro</title>
</head>

<body>

<?php

//include('login.php');

	$contador=0;

	try{
		
		$base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
		//Datos de la conexión con la BD
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Propiedades de la conexión con la BD

		$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIO = :login";
		$adm = "SELECT * FROM USUARIOS_ADM WHERE USUARIO = :usu1 AND PASSWORD = :pas1";
		$tec = "SELECT * FROM USUARIOS_TEC WHERE USUARIO = :usu2 AND PASSWORD = :pas2";
		$per = "SELECT * FROM USUARIOS_PER WHERE USUARIO = :usu3 AND PASSWORD = :pas3";
		//Instrucción SQL que se encarga de mirar en la BD si el usuario existe o no existe//
		//Tanto :login y :password son MARCADORES.
		
		$resultado=$base->prepare($sql);
		$resultado2=$base->prepare($adm);
		$resultado3=$base->prepare($tec);
		$resultado4=$base->prepare($per);

		//Prepare es una función que se encargará de preparar nuestra sentencia SQL
		
		
		$login=htmlentities(addslashes($_POST["login"]));
		$password=htmlentities(addslashes($_POST["password"]));
		
		$usuario=htmlentities(addslashes($_POST["login"]));
		$pas1=htmlentities(addslashes($_POST["password"]));
		
		$nombre1=htmlentities(addslashes($_POST["login"]));
		$pas2=htmlentities(addslashes($_POST["password"]));
		
		$nombre2=htmlentities(addslashes($_POST["login"]));
		$pas3=htmlentities(addslashes($_POST["password"]));
		
		//Ahora tomamos lo que el usuario introduce en el formulario
		//htmlenteties convierte cualquier símbolo en HTML. EJ: Comillas, guiones, etc
		//addslashes se encarga de obviar o "escapar" los caraceteres de este tipo para no tenerlos en cuenta...
		//...así cuando el usuario introduzca cualquier símbolo "extraño", no lo tomará en cuenta
		
		$resultado->bindValue (":login", $login);
		$resultado->bindValue (":password", $password);
		
		$resultado2->bindValue (":usu1", $usuario);
		$resultado2->bindValue (":pas1", $pas1);
		
		$resultado3->bindValue (":usu2", $nombre1);
		$resultado3->bindValue (":pas2", $pas2);
		
		$resultado4->bindValue (":usu3", $nombre2);
		$resultado4->bindValue (":pas3", $pas3);
		//bindValue es una función que realiza la equivalencia entre mis marcadores :login y :password
		//con lo que se encuentra almmacenado en mis varviables del mismo nombre
		
		$resultado->execute(array(":login"=>$login));
		$resultado2->execute();
		$resultado3->execute();
		$resultado4->execute();
		//Ejecutamos nuestra sentencia SQL
		
		$numero_registro=$resultado->rowCount();
		$numero_registro2=$resultado2->rowCount();
		$numero_registro3=$resultado3->rowCount();
		$numero_registro4=$resultado4->rowCount();

		//rowCount() me dice el número de registros que devuelve una consulta
		
		
		while ($numero_registro=$resultado->fetch(PDO::FETCH_ASSOC))
		{


			if(password_verify($password, $numero_registro['PASSWORD']))
				{
					$contador++;
				}
			
		}
			
			if($contador>0)
				{
					header("location:login.php");
				}

		
		if($numero_registro != 0) 
	{
		session_start();
	 
		$_SESSION['usuario'] = $_POST["login"];
		header("location:inicio.php");
		exit(); 
	}
	
		else 
	{
		header("location:login.php");
	}
		
		if($numero_registro2 != 0) 
	{
		session_start();
	 
		$_SESSION['adm'] = $_POST["login"];
		header("location:inicio.php");
		exit(); 
	}
	
	 	else 
	{
		header("location:login.php");
	}
	 
	 if($numero_registro3 != 0)
	{
		session_start();
		
		$_SESSION['tec'] = $_POST["login"];
		header("location:inicio.php");
		exit(); 
	}
	
		else 
	{
		header("location:login.php");
	}
	 
	if($numero_registro4 != 0)
	{
		session_start();
		
		$_SESSION['per'] = $_POST["login"];
		header("location:inicio.php");
	}
	
		else 
	{
		
		header("location:login.php");
	}
								
	}catch(Exception $e)
	
	{
		die("Error: " . $e->getMessage());
	}

?>
</body>
</html>