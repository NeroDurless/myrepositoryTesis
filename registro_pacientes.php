<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar Pacientes</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
<script src="js/live.js"></script>
</head>

<body>   

<?php

	include("conexion.php");
	
	session_start();
	
	if(!isset($_SESSION["usuario"]))
	{
		header("location:login.php");
	}
	
	$registros=$base->query("SELECT * FROM DATOS_PERSONAS")->fetchAll(PDO::FETCH_OBJ);
	//Dentro de la variable $registros tengo un Array de objetos
	
	if(isset($_POST["cr"]))
		{	
			$Nom=$_POST["Nom"];
			$Ape=$_POST["Ape"];
			$Dir=$_POST["Dir"];
			$Eda=$_POST["Eda"];
			$Sex=$_POST["Sex"];
			
			$sql="INSERT INTO DATOS_PERSONAS (NOMBRE, APELLIDO, DIRECCIÓN, EDAD, SEXO) VALUES (:nom, :ape, :dir, :eda, :sex)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":nom"=>$Nom, ":ape"=>$Ape, ":dir"=>$Dir, ":eda"=>$Eda, ":sex"=>$Sex));
			
			header("location:registro_pacientes.php");
		 
	    }		



?> 

<h1>Agregar Personas</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table width="50%" border="0" align="center">
     <tr >
    	<td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="primera_fila">Edad</td>
        <td class="primera_fila">Sexo</td>
       
       
 
  <?php
 
   if(isset($_POST['submit']))  {
	   
	   
			
			echo "<td class=bot>Paciente almacenado correctamente. <br /></td>";
			
		}
?>
    

    
<!---------------------------------------------------------------------------------------------------------------->
         
      <tr>
            <td></td>
            <td><input type='text' name='Nom' size='10' class='centrado'></td>
            <td><input type='text' name='Ape' size='10' class='centrado'></td>
            <td><input type='text' name='Dir' size='10' class='centrado'></td>
            <td><input type='text' name='Eda' size='10' class='centrado'></td>
            <td><input type='text' name='Sex' size='10' class='centrado'></td>

            <td class="bot"><input type='submit' name='cr' id='cr' value='Insertar'></a></td>
      </tr> 
       
  </table>
  
        
  </table>
  
  <table width="36" align="center" class="centrado">
  <td align="center" valign="middle" class="bot">
  <div align="center">
         <a class="bot" href="usuarios_registrados.php" name="reg">Regresar</a> 
    </div>
   </td> 
        
  </table>

</form>

</body>
</html>