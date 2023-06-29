<?php
    include('inc/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Abarrotes Ruben</title>
</head>
<body bgcolor="#DA627D">
    <?php
        menu();
        /* PARA MOSTRAR ERRORES EN MAC */
        ini_set('display_errors', 1);       
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        /* ESTABLECEMOS LA CONEXIÓN*/
        $conexion = new mysqli("localhost", "root", "", "pos") or die("Por alguna razón, no se pudo conectar al servidor.");
        /* ESTABLECEMOS LAS VARIABLES DE COMANDO*/
        $queryselect = "SELECT * FROM productos";
        $comando= mysqli_query($conexion, $queryselect);
        /* UNA TABLA A FORMA DE GRID*/
        if($comando->num_rows>0)
        {
            echo "Productos totales: ".$comando->num_rows;
            echo "<table border='1' bgcolor='#FFA5AB'><tr><th colspan='5'>INVENTARIO DE ABARROTES RUBÉN</th><tr><th>Código</th><th>Producto</th></th><th>Precio</th><th>Eliminar</th><th>Modificar</th></tr>";
            while($registro=$comando->fetch_assoc())
            {
                echo "\n\t<tr bgcolor='#FFA5AB'><td>".$registro["codigo"].
                "</td>\n\t<td>".$registro["nombre"]."</td>\n\t<td>". $registro["precio"]."</td> 
                <td> <a href='delete.php?codigo=".$registro['codigo']."'> <img src='./img/icon_delete.png'> </a> </td> 
                <td> <a href='update.php?codigo=".$registro['codigo']."'> <img src='./img/icon_update.png'> </a> </td> </tr>\n";
            }
            echo "</table>";
        }
        else{
            echo "No se encontraron registros en la DB.";
        }
  
    ?>
    <form action="insert.php" method="post">
        <fieldset style="width: 0px">
            <legend>Agregar nuevo producto</legend>
                Codigo del producto: <input name="codigo" type="text" value=''><br>
                Nombre del producto: <input name="nombre" type="text" value=''><br>
                Precio del producto: <input name="precio" type="text" value=''><br>
            <input type="submit" value='Agregar producto'>       
        </fieldset>
    </form>
</body>
</html>