<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar Personas</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
<script src="js/live.js"></script>
</head>

<body>   

<?php

	@$busqueda=$_GET["buscar"];

	include("conexion.php");
	
	session_start();
	
	if(!isset($_SESSION["usuario"]))
	{
		header("location:login.php");
	}
	
	$registros=$base->query("SELECT * FROM DATOS_PERSONAS WHERE NOMBRE='$busqueda'")->fetchAll(PDO::FETCH_OBJ);
	//Dentro de la variable $registros tengo un Array de objetos
	
?> 



<h1>Buscar Personas</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
  <table width="50%" border="0" align="center">
    <tr >
    	<td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Cédula</td>
        <td class="primera_fila">Correo</td>
        <td class="primera_fila">Dirección</td>
        <td class="primera_fila">Edad</td>
        <td class="primera_fila">Sexo</td>
        
        
       <label><input type="text" name="buscar"></label>

<input type="submit" name="enviado" value="Buscar">
       
 <?php
 
 	foreach($registros as $personas):
?>
	
   	<tr>
      <td><?php echo $personas->Id?> </td>
      <td><?php echo $personas->Nombre?> </td>
      <td><?php echo $personas->Apellido?> </td>
      <td><?php echo $personas->Cedula?> </td>
      <td><?php echo $personas->Correo?> </td>
      <td><?php echo $personas->Direccion?> </td>
      <td><?php echo $personas->Edad?> </td>
      <td><?php echo $personas->Sexo?> </td>

 <?php /*?>
      <td class="bot"><a href="borrar_personal.php?Id=<?php echo $personal->Id ?>">
      <input type='button' name='del' id='del' value='Borrar'></a></td>
      
      
      <td class='bot'><a href="editar_personal.php?Id=<?php echo $personal->Id ?>
      & Nom=<?php echo $personal->Nombre ?> 
      & Ape=<?php echo $personal->Apellido ?>  
      & CoU=<?php echo $personal->CodigoU ?>">
      <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr><?php */?>   
    
<?php

	endforeach;

?> 
    

    
<!---------------------------------------------------------------------------------------------------------------->
         
  <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

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