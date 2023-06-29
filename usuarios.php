<?php
    include('inc/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes Ruben</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body bgcolor="#7F9183">
    <?php
        menu();
        /* PARA MOSTRAR ERRORES EN MAC */
        ini_set('display_errors', 1);       
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $queryselect = "SELECT * FROM usuarios";
        $comando= mysqli_query($conexion, $queryselect);
        /* UNA TABLA A FORMA DE GRID*/
        if($comando->num_rows>0)
        {
            echo "Usuarios totales: ".$comando->num_rows;
            echo "<table border='1' bgcolor='#B8B8AA'><tr><th colspan='9'>PERSONAL DE ABARROTES RUBÉN</th><tr><th>Primer apellido</th><th>Segundo apellido</th></th><th>Nombres</th><th>Email</th><th>Password</th><th>RFC</th><th>CURP</th><th>Eliminar</th><th>Modificar</th></tr>";
            while($registro=$comando->fetch_assoc())
            {
                echo "\n\t<tr bgcolor='#B8B8AA'>
                <td>".$registro["apellido1"]."</td>\n\t
                <td>".$registro["apellido2"]."</td>\n\t
                <td>".$registro["nombres"]."</td>\n\t
                <td>".$registro["email"]."</td>\n\t
                <td>".$registro["password"]."</td>\n\t
                <td>".$registro["rfc"]."</td>\n\t
                <td>".$registro["curp"]."</td>\n\t
                <td> <a href='delete_usuarios.php?email=".$registro['email']."'> <img src='./img/icon_delete.png'> </a> </td> 
                <td> <a href='update_usuarios.php?email=".$registro['email']."'> <img src='./img/icon_update.png'> </a> </td> </tr>\n";
            }
            echo "</table>";
        }
        else{
            echo "No se encontraron registros en la DB.";
        }
  
    ?>
    <form action="insert_usuarios.php" method="post">
        <fieldset style="width: 0px">
            <legend>Agregar usuario</legend>
                Primer apellido: <input name="apellido1" type="text" value=''><br>
                Segundo apellido: <input name="apellido2" type="text" value=''><br>
                Nombres: <input name="nombres" type="text" value=''><br>
                Email: <input name="email" type="text" value=''><br>
                Contraseña: <input name="password" type="text" value=''><br>
                RFC: <input name="rfc" type="text" value=''><br>
                CURP: <input name="curp" type="text" value=''><br>
            <input type="submit" value='Agregar usuario'>       
        </fieldset>
    </form>
    <?php
    footer();
    ?>
</body>
</html>