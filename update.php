<?php
include('./inc/functions');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body bgcolor="#7F9183">
    <?php
    menu();
    $codigo=$_GET['codigo'];
    $conexion = new mysqli("localhost", "root", "", "pos") or die("Sin conexion al servidor. Favor de revisar");
    $selectquery = "SELECT * FROM productos WHERE codigo='".$codigo."';";
    $com = mysqli_query($conexion, $selectquery);
    if($com->num_rows > 0 ){
        while($registro=$com->fetch_assoc())
        { 
            ?>
            <form action="update_back.php" method="post">
            <fieldset style="width: 0px">
            <legend>Modificar producto</legend>
                Codigo: <input type="text" name="codigo" value="<?= $registro['codigo']?>"><br>
                Nombre: <input type="text" name="nombre" value="<?= $registro['nombre']?>"><br>
                Precio: <input type="text" name="precio" value="<?= $registro['precio']?>">
            <input type="submit" value="Modificar">
            </fieldset>
            </form>
    <?php 
    }
    } footer();
    ?>

</body> 
</html>