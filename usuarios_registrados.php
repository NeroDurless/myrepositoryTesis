<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios Registrados</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
<script src="js/live.js"></script>

</head>

<body>

<div align="center">
  <?php

	session_start();
	
	if(!isset($_SESSION["usuario"]))
	{
		header("location:login.php");
	}

?>
  
  
</div>
<h1 align="center"> --BIENVENIDO-- </h1>

<div align="center">

<?php /*?><?php

	echo "Hola: " . $_SESSION["usuario"] . "<br>";

?><?php */?>
  
</div>

<form class="login-form">

<div align="center">
  <table width="410" height="155" border="1">
    <tr>
      <td colspan="6" align="center">ZONA DE REGISTRO EXCLUSIVA PARA PACIENTES</td>
    </tr>
    <tr>
     
     
     
     <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="registro_pacientes.php" name="reg">AGREGAR</a> 
    </div>
   </td>
   
   <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="ver_personas.php" name="reg">VER</a> 
    </div>
   </td>
   
   <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="buscar_personas.php" name="reg">BÚSQUEDA</a> 
    </div>
   </td>
     
     
  <!--
  <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="registro_equipos.php" name="reg">PACIENTES</a> 
    </div>
    
   </td><td align="center" class="bot">
  <div align="center">
         <a class="bot" href="registro_tecnicos.php" name="reg">MÉDICOS</a> 
    </div>
   </td><td align="center" class="bot">
  <div align="center">
         <a class="bot" href="registro_personal.php" name="reg">CITAS</a> 
    </div>
     <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="registro_personal.php" name="reg">HISTORIAL</a> 
    </div>
     <td align="center"  class="bot">
     <div align="center">
         <a class="bot" href="registro_personal.php" name="reg">CONSULTAS</a> 
    </div>
     <td align="center"  class="bot">
  <div align="center">
         <a class="bot" href="permisos.php" name="reg">PERMISOS</a> 
    </div>
   </td>-->
   
    </tr> 
     
  </table>
  
</table>
  
  <p>&nbsp;</p>
  <table width="238" height="79" align="center" class="centrado">
  <td align="center" valign="middle" class="bot">
  <div align="center">
         <a class="bot" href="cierra_sesion.php" name="reg">CERRAR SESIÓN</a> 
    </div>
   </td> 
        
  </table>
</form>

</body>
</html>