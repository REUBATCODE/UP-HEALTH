<?php
    $codigo=$_GET['codigo'];
    
    try {
        $querydelete = "DELETE FROM productos WHERE codigo="."'".$codigo."'";
        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $comando= mysqli_query($conexion, $querydelete);
    
        header("location: productos.php");    
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        echo "Se ha detectado un acceso no admitido. Se reportará a las autoridades locales.";
    }

?>