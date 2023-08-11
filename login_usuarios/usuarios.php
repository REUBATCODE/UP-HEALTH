<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Abarrotes Ruben</title>
</head>
<body bgcolor="#94d2bd">
    <?php
        /* PARA MOSTRAR ERRORES EN MAC */
        ini_set('display_errors', 1);       
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "uphealth") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $queryselect = "SELECT * FROM usuarios";
        $comando= mysqli_query($conexion, $queryselect);
        /* UNA TABLA A FORMA DE GRID*/
        if($comando->num_rows>0)
        {
            echo "Usuarios: ".$comando->num_rows;
            echo "<table border='1' bgcolor='#ee9b00'><tr><th colspan='5'>USUARIOS</th><tr><th>Código</th><th>Correo</th></th><th>Contraseña</th><th>Usuario</th></tr>";
            while($registro=$comando->fetch_assoc())
            {
                echo "\n\t<tr bgcolor='#e9d8a6'>
                <td>".$registro["id_usuario"]."</td>\n\t
                <td>".$registro["Correo"]."</td>\n\t
                <td>".$registro["Password"]."</td>\n\t
                <td>".$registro["nombre_usuario"]."</td>\n\t
                ";
            }
            echo "</table>";
        }
        else{
            echo "No se encontraron registros en la DB.";
        }
  
    ?>
    <button>Agregar Usuario</button>
</body>
</html>