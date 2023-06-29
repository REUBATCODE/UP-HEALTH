<?php
    try {
        $queryupdate="UPDATE usuarios SET 
        apellido1='".$_POST['apellido1'].
        "', apellido2='".$_POST['apellido2'].
        "', nombres='".$_POST['nombres'].
        "',email='".$_POST['email'].
        "'password='".$_POST['password'].
        "'rfc='".$_POST['rfc'].
        "curp='".$_POST['curp'].
        "'' WHERE email='".$_POST['email']."';";
        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $comando= mysqli_query($conexion, $queryupdate);
    
        header("location: usuarios.php");    
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        echo "Se ha detectado un acceso no admitido. Se reportará a las autoridades locales.";
    }
?>