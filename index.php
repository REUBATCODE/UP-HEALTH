<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <title>UpHealth</title>
</head>
<body>
    <?php
    session_start();
    ?>

    <header class="header">
        <div class="contenedor contenido-header"> 
                <div class="barra">
                    <a href="./" class="logo">
                        <img src="./img/uphealth-logo-nobg.png" alt="logo de la pagina">
                    </a>
                    <nav class="nav">
                        <a href="./">HOME</a>
                        <a href="./login_usuarios/login.php">Iniciar Sesion</a>
                        <a href="./admin/login.php">Iniciar Sesion Admin</a>
                    </nav>
                    <p>Bienvenido <?php echo $_SESSION["usuario"]?> 
                    </p>
                </div>
        </div>
    </header>
    <main class="contenedor">
        <h1>Inicia tu entrenamiento</h1>
        <p>Desde La comodidad de tu casa</p>
        <section class="subscribete"> 
            <div class="subscribete-comprar">   
                <a href="./">
                    <p>¡Empieza Ya!</p>
                </a>
            </div>
        </section>
        <section class="info contenedor">
            <h3>Porque es bueno hacer ejercicio?...</h3>
            <div class="info-card">
                <img src="img/info-2a.jpg" alt="mujer-levantando-pesas">
                <p>Los ejercicios de fuerza mejoran la densidad ósea, disminuyendo así el posible riesgo de osteoporosis o fracturas y protegiendo a la vez nuestras articulaciones.</p>
            </div>
            <div class="info-card flex-direction-row-reverse">
                <img src="img/info-3a.jpg" alt="mujer-levantando-pesas">
                <p>Los ejercicios de fuerza mejoran la densidad ósea, disminuyendo así el posible riesgo de osteoporosis o fracturas y protegiendo a la vez nuestras articulaciones.</p>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-copyright">
            <p>Derechos reservados UpHealth</p>
        </div>
    </footer>
</body>
</html>