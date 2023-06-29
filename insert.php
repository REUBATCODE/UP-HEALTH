<?php
    

    try {
        $queryinsert="INSERT INTO productos (codigo, nombre, precio) VALUES("."'".$_POST['codigo']."', "."'".$_POST['nombre']."'".", ".$_POST['precio'].");";
        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $comando= mysqli_query($conexion, $queryinsert);
    
        header("location: productos.php");    
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        echo "Se ha detectado un acceso no admitido. Se reportará a las autoridades locales.";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="productos.php">Productos</a> 
</body>
</html>