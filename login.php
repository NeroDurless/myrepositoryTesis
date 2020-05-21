<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina de logeo</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/live.js"></script>
</head>

<body>

  <div class="login-page">
  <div class="form">
 
  <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>

    <form action="comprueba_login.php" method="post" class="login-form">
      <input type="text" name="login" id="login" placeholder="Usuario"/>
      <input type="password" name="password" id="password" placeholder="Contraseña"/>
      <button>login</button>
      <!--/*<p class="message">¿No te has registrado? <a href="register.php">Crea una cuenta</a></p>*/-->

    </form>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <script  src="index.js"></script>

</body>

</html>


