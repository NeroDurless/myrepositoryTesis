<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Página de logeo</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
form {
	color: #333;
	font-family: "Comic Sans MS", cursive;
	font-size: 20px;
}
</style>
<script src="js/live.js"></script>
</head>



<body>

  <div class="login-page">
  <div class="form">
 
  <form action="comprueba_registro.php" method="post" class="register-form">
      Sistema de Registro de Pacientes y Control de Citas
      <p></p>

 
      <input type="text" name="usu" id="usu" required placeholder="Usuario"/>
      <input type="password" name="contra" id="contra" required placeholder="Contraseña"/>
      
      <button>Crear</button>
      
      <p class="message">¿Registrado? <a href="#">¡Loguéate!</a></p>
      
  </form>


    <form action="comprueba_login.php" method="post" class="login-form">
    Sistema de Registro de Pacientes y Control de Citas
    <p></p>
      
        <input type="text" name="login" id="login" required placeholder="Usuario"/>
          <input type="password" name="password" id="password" required placeholder="Contraseña"/>
          
        
        <button>login</button>
      
      <p class="message">¿No te has registrado? <a href="#">Crea una cuenta</a></p>
        
    </form>
    
  </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src="index.js"></script>

</body>

</html>


