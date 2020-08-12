<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD para Personal</title>
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
	
	$registros=$base->query("SELECT * FROM DATOS_PERSONAL")->fetchAll(PDO::FETCH_OBJ);
	//Dentro de la variable $registros tengo un Array de objetos
	
	if(isset($_POST["cr"]))
		{	
			$Nom=$_POST["Nom"];
			$Ape=$_POST["Ape"];
			$CoU=$_POST["CoU"];
			
			$sql="INSERT INTO DATOS_PERSONAL (NOMBRE, APELLIDO, CODIGOU) VALUES (:nom, :ape, :cou)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":nom"=>$Nom, ":ape"=>$Ape, ":cou"=>$CoU));
			
			header("location:registro_personal.php");
		 
	    }		



?> 

<h1>Personal</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table width="50%" border="0" align="center">
    <tr >
    	<td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">CodigoU</td>
       
       
 <?php
 
 	foreach($registros as $personal):
?>
		
   	<tr>
      <td><?php echo $personal->Id?> </td>
      <td><?php echo $personal->Nombre?> </td>
      <td><?php echo $personal->Apellido?> </td>
      <td><?php echo $personal->CodigoU?> </td>
 
      <td class="bot"><a href="borrar_personal.php?Id=<?php echo $personal->Id ?>">
      <input type='button' name='del' id='del' value='Borrar'></a></td>
      
      
      <td class='bot'><a href="editar_personal.php?Id=<?php echo $personal->Id ?>
      & Nom=<?php echo $personal->Nombre ?> 
      & Ape=<?php echo $personal->Apellido ?>  
      & CoU=<?php echo $personal->CodigoU ?>">
      <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>   
    
<?php

	endforeach;

?> 
    

    
<!---------------------------------------------------------------------------------------------------------------->
         
      <tr>
            <td></td>
            <td><input type='text' name='Nom' size='10' class='centrado'></td>
            <td><input type='text' name='Ape' size='10' class='centrado'></td>
            <td><input type='text' name='CoU' size='10' class='centrado'></td>
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