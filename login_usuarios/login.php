<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesión</title>
  <link rel="stylesheet" type="text/css" href="styles\styles.css">
</head>
<body bgcolor="#CBF3F0">
  <div class="logo">
    <h1 id=titulo>UPHEALTH</h1>
    <img src="img\logo.png" alt="Logo">
  </div>
  
  <div class="login-form">
    <form action="validar.php" method="post">
      <input type="email" name=correo placeholder="Correo electrónico" required><br>
      <input type="password" name=contrasena placeholder="Contraseña" required><br>
      <input type="submit" value="Iniciar sesión">
    </form>
  </div>
</body>
</html>