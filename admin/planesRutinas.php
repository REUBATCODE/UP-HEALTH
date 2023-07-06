<?php
    include '../helpers/funciones-ayuda.php';
    include '../includes/db.php';
?>
    <?php
        $con = connectDB();
        $mostrar ="";
        $query = "SELECT * FROM ejercicios;";
        $res = $con->query($query);                  
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Rutina</title>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="planesRutinas.html">

</head>
<body>

    <section id = "menu">
        <div class = "logo">
            <img src="../img/logo.png" alt="">
            <a href="./index.php"><h2>Menú</h2></a>
        </div>
    </div>
    <!-----crearemos el menu desplegable----->
        <div id = "sidebar" class ="items">
            <ul>
                <li><i class="fas fa-clipboard"></i><a href="./planesRutinas.php" > Ejercicios</a></li>
                <li><i class="fas fa-dumbbell"></i><a href="#"> Rutinas de Entrenamiento</a></li>
            </ul>
        </div>
    </div> 
    </section>

    <section id = "interface">
        <div class = "navegacion">
            <div class = "n1">
                <button id="menu-btn">
                    <i id = "menu-btn" class ="fas fa-bars"></i>
                </button>
                <div class = "search">
                    <i class ="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class = "profile">
                <i class ="far fa-bell"></i>
                <img src="../img/usuarioPerfil.jpg" alt="">
            </div>
        </div>

        <h3 class = "i-name">
            Lista de Ejercicios
        </h3>
        <form action = "./ejercicios_admin/crear_ejercicio_front.php" method = "post">
            <input type = "submit" value ="Agregar" name ="crearNuevoEjercicio">
        </form>
        <div class = "board-ejercicio">
            <table width = "100%">
                <thead>
                    <tr>
                        <td>Id Ejercicio</td>
                        <td>Nombre</td>
                        <td>Grupo Muscular</td>
                        <td>Descripción</td>
                        <td>Imagen</td>
                        <td class = "edit">Acción</td>
                        <td class = "delet">Acción</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php while($registro = $res->fetch_assoc()):?>
                        <td class ="idRutina"><?php echo $registro['id_ejercicio'];?></td>
                        <td class = "nombreRutina"><?php echo $registro['nombre_ejercicio'];?></td>
                        <td class = "grupoMuscular"><?php echo $registro['grupo_muscular'];?></td>
                        <td class = "descripcion"><?php echo $registro['descripcion'];?></td>
                        <td class = "imagen">
                        <img src="../img/ejercicios/<?php echo $registro['imagen'];?>" width = '200px' heigth = '75px'>
                        </td>
                        <td class ="edit"><a href="./ejercicios_admin/update_ejercicios.php?id_ejercicio=<?php echo $registro['id_ejercicio'];?>">Editar</a></td>
                        <td class ="delet"><a href="./ejercicios_admin/delete_ejercicios.php?id_ejercicio=<?php echo $registro['id_ejercicio'];?>&imagen=<?php echo $registro['imagen']?>">Eliminar</a></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </section> 
</body>
</html>