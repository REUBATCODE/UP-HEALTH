<?php
    try {
        $queryupdate="UPDATE productos SET nombre='".$_POST['nombre']."', precio='".$_POST['precio']."' WHERE codigo='".$_POST['codigo']."';";
        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $comando= mysqli_query($conexion, $queryupdate);
    
        header("location: productos.php");    
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        echo "Se ha detectado un acceso no admitido. Se reportará a las autoridades locales.";
    }
?>