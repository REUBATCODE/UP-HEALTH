<?php
    /* ESTABLECEMOS LA CONEXIÓN*/
    $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
    /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
    $queryselect="SELECT email FROM usuarios WHERE email='".$_POST['correo']."' AND password =md5(sha(sha1('".$_POST['contrasena']."')));";
    echo $queryselect;
    
    $comando= mysqli_query($conexion, $queryselect);

    if($comando->num_rows==1)
        {
            header('location: menu.php');
        }
        else
        {
            header('location: index.php?error=100');
        }
?>