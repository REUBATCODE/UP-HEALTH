<?php
    if(!empty($_POST["btningresar"])){
        if(empty($_POST["usuario"]) and empty($_POST["password"]))
        {
            echo "campos vacios";
        }
        else
        {
            $usuario = $_POST["usuario"];
            $contra = $_POST["password"];
            $sqlquery = "SELECT * FROM admin WHERE nombre = '$usuario' AND password = '$contra';";
            $comando = mysqli_query($con,$sqlquery);
            if($datos = $comando->fetch_object())
            {
                header("location:index.php");
            }
            else
            {
                echo '<div class = "alert alert-danger">ACCESO DENEGADO USUARIO INEXISTENTE</div>';
            }
        }

    }


?>