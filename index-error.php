<?php

?>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <title>Sistema Nissan 2019</title>
  
  
  
      <link rel="stylesheet" href="css/login.css">

  
</head>

<body>

  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Ingresar </h2>
   

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img-login/logo.png" id="icon" alt="User Icon" />
      <h3>El usuario y la contraseña son incorrectos.</h3>
      <h5>intentalo de nuevo....</h5>
    </div>

    <!-- Login Form -->
    <form role="form" name="login"  action="check-login.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="nombre_usuario" placeholder="Nombre de usuario" required>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Contrase&ntilde;a" required>
      <input type="submit" class="fadeIn fourth" value="Log In" >
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">He olvidado mi contraseña</a>
    </div>

  </div>
</div>
  
  

</body>

</html>