<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="PINK">
    <div class="header-nav">
    <h1>Inicio de Sesion</h1>
    </div>
    <form action="validar.php" method="post">
        <input type="email" name="correo" placeholder="Correo electrónico" value="cheno@weth.com"  required> <br>
        <input type="password" name="contrasena" placeholder="Contraseña" value="asd" required> <br>
        <input type="submit" value="Iniciar Sesion">
    </form>
    <?php
        if($_GET['error']==100){
            echo "Se detecto usuario y/o contrasena incorrectos. Favor de intentar de nuevo.";
        }
    ?>
</body>
</html>