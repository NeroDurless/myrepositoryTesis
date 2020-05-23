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
 
   <form action="comprueba_registro.php" method="post" class="login-form">
   
     <input type="text" name="usu" id="usu" required placeholder="Usuario"/>      
      
      
      <input type="password" name="contra" id="contra" required placeholder="Contraseña"/>
      
      <button onclick="validation();">Crear</button>
      
      <p class="message">¿Registrado? <a href="login.php">¡Loguéate!</a></p>
    </form>

  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

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
 
</script> 
 


</body>

</html>


