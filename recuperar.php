<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Recuperar contraseña</title>


<link rel="stylesheet" type="text/css" href="style.css">

<!--<link rel="stylesheet" href="btns.css" />
<link rel="stylesheet" href="circle.css" />
<link rel="stylesheet" href="circu.css" />-->

<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>

<script src="inton.js"></script>
<script src="live.js"></script>

<link rel="stylesheet" type="text/css" href="tooltips.css">

</head>

<?php

	include("conexion.php");
	
	$correo= ( empty($_POST['correo']) )   ? NULL : $_POST['correo'];
	//Dentro de la variable $registros tengo un Array de objetos
	

	
	if(isset($_POST["cr"]))
		{	
			$Cor=$_POST["recuperar"];
						
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":correo"=>$Cor));
			
			header("location:recuperar.php");
		 
	    }
	


?> 

  <div class="login-page">
  <div class="form">
 
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-form">
        Recupera tu contraseña
      <p></p>
   
      <input name="recuperar" id="recuperar" placeholder="Correo"/>
      
        <button>Enviar correo</button>
      
    <td class="button"><input type='submit' name='cr' id='cr' value='Enviar correo'></td>
     <p class="message"><a href="login.php">Regresar al Login</a></p>
    </form>

  </div>
</div>

<script src="sweetalert.min.js"></script>

<script  src="index.js"></script>

<script type="text/javascript">


	function validation()
				{
           var usu = $('#usu').val();  
           var contra = $('#contra').val();  
           if(usu == '' || contra == '')  
           {  
		   	swal("¡Error!", "¡Todos los campos son requeridos!", "error");
		   
           }  
           else  
           {  
		   swal("¡Genial!", "¡Usuario registrado satisfactoriamente!", "success");
         
            
 }
 }
 
 
 $(document).ready(function () {
    $('#usu').tooltip({'trigger':'focus', 'title': 'Ingrese solo su nombre'}); $('#contra').tooltip({'trigger':'focus', 'title': 'Ingrese una contraseña con solo números'});
	});
	
	
$(document).ready(function(){
        $("#usu").tooltip({
            placement:"right"
        });              
        $("#contra").tooltip({
            placement:"right"
        });              
        $(".col-sm-3").tooltip({
            selector: "input[rel=tooltip]",
            placement:"right"
        });              
        $("#address1").tooltip({
            placement:"right"
        }); 
        $("#remem").tooltip({
            placement:"right"
        });                                      
    });	
	
	
 
</script> 
 


</body>

</html>


