<?php 

    $mensaje = $_GET['mensaje'] ?? null;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="..//css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="planesRutinas.php">
</head>
<body>
    <section id = "menu">
        <div class = "logo">
            <img src="..//img/logo.png" alt="">
            <a href="../admin/index.php"><h2>Menú</h2></a>
        </div>
        </div>
        <!-----crearemos el menu desplegable test ----->
            <div id = "sidebar" class ="items">
                    <li><i class="fas fa-clipboard"></i><a href="./planesRutinas.php"> Planes de Rutinas</a></li>
                    <li><i class="fas fa-dumbbell"></i><a href="#"> Ejercicios</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id = "interface">
        <div class = "navegacion">
            <div class = "n1">
                <div>
                    <i id = "menu-btn" class ="fas fa-bars"></i>
                </div>
                <div class = "search">
                    <i class ="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class = "profile">
                <i class ="far fa-bell"></i>
                <img src="..//img/usuarioPerfil.jpg" alt="">
            </div>
        </div>

        <h3 class = "i-name">
            Resumen
        </h3>

        <div class ="values">
            <a href="./users-admin">
                <div class ="val-box">
                    <i class = "fas fa-users"></i>
                    <div>
                        <h3> Usuarios</h3>
                        <span> Nuevos Usuarios</span>
                    </div>
                </div>
            </a>
            
            <div class ="val-box">
                <i class = "fas fa-heart"></i>
                <div>
                    <h3> Ejercicios</h3>
                    <span> Lista de Ejercicios</span>
                </div>
            </div>
            <div class ="val-box">
                <i class = "fas fa-dollar-sign"></i>
                <div>
                    <h3> Producto Vendido </h3>
                    <span> Esta Semana </span>
                </div>
            </div>
        </div>
        <div class = "board">
            <table width = "100%">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Correo de Contacto</td>
                        <td>Rol</td>
                        <td>Status</td>
                        <td>Acción</td>
                    </tr>
                </thead>
                <tbody>
                    <!----de aquí es donde se agregan usuarios en la tabla----->
                    <tr>
                        <td class ="people">
                            <img src="..//img/usuarioPerfil.jpg" alt="">
                            <div class ="people-descrip">
                                <h5>Alguien</h5>
                            </div>
                        </td>
                        <td class = "people-correo">
                            <p>alguien@gmail.com</p>
                        </td>
                        <td class = "usuario">
                            <p>Admin</p>
                        </td>
                        <td class = "status">
                            <p>Activo</p>
                        </td>

                        <td class ="edit"><a href="#"> Edit</a></td>

                    </tr>
                    <!---aqui termina-->
                </tbody>
            </table>
        </div>

    </section>


    </body>
</html>