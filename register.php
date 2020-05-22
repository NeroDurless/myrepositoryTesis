<!DOCTYPE html>
<html lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina de registro</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-page">
  <div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-form">
    <p>
        <input type="text" name="login" id="login" placeholder="Usuario"/>
        <input type="password" name="password" id="password" placeholder="Contraseña"/>
      </p>
      
      <td class="crea-button"><input name='cr' type='submit' class="crea-button" id='cr' value='Crear'></td>
      
      <p class="message">¿Registrado? <a href="login.php">Loguéate</a></p>
    </form>
  </div>
</div>

<?php

	include("conexion.php");
	
	$registros=$base->query("SELECT * FROM USUARIOS_PASS")->fetchAll(PDO::FETCH_OBJ);
	//Dentro de la variable $registros tengo un Array de objetos
	
	if(isset($_POST["cr"]))
		{	
			$Log=$_POST["login"];
			$Pas=$_POST["password"];
			
			$sql="INSERT INTO USUARIOS_PASS (USUARIO, PASSWORD) VALUES (:usu, :pas)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":usu"=>$Log, ":pas"=>$Pas));
			
			header("location:register.php");
		 
	    }
?>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <script  src="index.js"></script>

</body>

</html>

