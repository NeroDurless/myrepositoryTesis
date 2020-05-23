<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Página de logeo</title>


<link rel="stylesheet" type="text/css" href="style.css">
<!--<link rel="stylesheet" href="btns.css" />
<link rel="stylesheet" href="circle.css" />
<link rel="stylesheet" href="circu.css" />-->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<script src="inton.js"></script>
<script src="live.js"></script>


</head>

<body>

  <div class="login-page">
  <div class="form">
  
  <form action="comprueba_registro.php" method="post" class="register-form">
      Sistema de Registro de Pacientes y Control de Citas
      <p></p>

      <input type="text" name="usu" id="usu" class="form-control" required placeholder="Usuario"/>      
      
      
      <input type="password" name="contra" id="contra" class="form-control" required placeholder="Contraseña"/>
      
      <button onclick="validation();">Crear</button>
      
      <p class="message">¿Registrado? <a href="#">¡Loguéate!</a></p>
      
  </form>


    <form action="comprueba_login.php" method="post" class="login-form">
    Sistema de Registro de Pacientes y Control de Citas
    <p></p>
      
        <input type="text" name="login" id="login" class="form-control" required placeholder="Usuario"/>
          <input type="password" name="password" id="password" class="form-control" required placeholder="Contraseña"/>
          
        
        <button>login</button>
      
      <p class="message">¿No te has registrado? <a href="#">Crea una cuenta</a></p>
        
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
 
</script> 
 


</body>

</html>


