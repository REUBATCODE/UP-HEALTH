<?php
    

    try {
        $queryinsert="INSERT INTO usuarios (
            apellido1, apellido2, nombres, email, password, rfc, curp) 
            VALUES("
            ."'".$_POST['apellido1']."', "."'".$_POST['apellido2']."', "."'".$_POST['nombres']."', "."'".$_POST['email']."', "."'".$_POST['password']."', "."'".$_POST['rfc']."', "."'".$_POST['curp']."'".");";
            
        /* ESTABLECEMOS LA CONEXIÓN*/
        print_r($queryinsert);
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $comando= mysqli_query($conexion, $queryinsert);
    
        header("location: usuarios.php");    
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
    <a href="usuarios.php">Usuarios</a> 
</body>
</html>