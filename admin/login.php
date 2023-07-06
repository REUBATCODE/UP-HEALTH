<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/loginstyle.css">
</head>
<body>
    <div class = "formulario">
        <h1>Inicio de Sesión</h1>
        <form action = "" method="post">
        <?php
                include("conexion_bd.php");
                include("controlador.php");
            ?>
            <div class = "username">
                <input type="text" name = "usuario" required>               
                <label>Ingresa tu nombre</label>
            </div>
            <div class = "username">
                <input type="password" name ="password" required>
                <label>Ingresa tu contraseña</label>
            </div>
            <div class = "recordar">¿Olvidó su contraseña?</div>
                <input type="submit" value="Iniciar" name="btningresar">
            <div class = "registrarse">Quiero hacer el 
                <a href="#">registro</a>
            </div>
        </form>
    </div>
</body>
</html>