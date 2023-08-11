<?php
    /* ESTABLECEMOS LA CONEXIÓN*/
    
    $conexion = new mysqli("localhost", "root", "", "uphealth") or die("Por alguna razón, no se pudo conectar al servidor.");
    /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
    $queryselect="SELECT nombre_usuario FROM usuarios WHERE Correo='".$_POST['correo']."' AND Password= '".$_POST['contrasena']."';";
    
    $comando= mysqli_query($conexion, $queryselect);

    if($comando->num_rows==1)
        {
            //INICIAMOS SESION
            session_start();
            while($row=mysqli_fetch_assoc($comando))
            {
                $_SESSION["usuario"] = $row["nombre_usuario"];
            }
            header('location: ../index.php');
           
        }
        else
        {
            //header('location: index.php?error=100');
        }
?>