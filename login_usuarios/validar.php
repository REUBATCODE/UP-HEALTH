<?php
    /* ESTABLECEMOS LA CONEXIÓN*/
    $conexion = new mysqli("localhost", "root", "", "uphealth") or die("Por alguna razón, no se pudo conectar al servidor.");
    /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
    $queryselect="SELECT Correo FROM usuarios WHERE Correo='".$_POST['correo']."' AND Password= '".$_POST['contrasena']."';";
    echo $queryselect;
    
    $comando= mysqli_query($conexion, $queryselect);

    if($comando->num_rows==1)
        {
            //INICIAMOS SESION
            session_start();
            $_SESSION['usuario']=$_POST['correo'];
            header('location: menu.php');
            
        }
        else
        {
            header('location: index.php?error=100');
        }
?>