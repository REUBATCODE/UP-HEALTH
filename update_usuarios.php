<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body bgcolor="#7F9183">
    <?php
    $codigo=$_GET['email'];
    $conexion = new mysqli("localhost", "root", "", "pos") or die("Sin conexion al servidor. Favor de revisar");
    $selectquery = "SELECT * FROM usuarios WHERE email='".$codigo."';";
    $com = mysqli_query($conexion, $selectquery);
    if($com->num_rows > 0 ){
        while($registro=$com->fetch_assoc())
        { 
            ?>
            <form action="update_back_usuarios.php" method="post">
                <fieldset style="width: 0px">
                    <legend>Agregar usuario</legend>
                    apellido1: <input type="text" name="apellido1" value="<?= $registro['apellido1']?>"><br>
                    apellido2: <input type="text" name="apellido2" value="<?= $registro['apellido2']?>"><br>
                    nombres: <input type="text" name="nombres" value="<?= $registro['nombres']?>"><br>
                    email: <input type="text" name="email" value="<?= $registro['email']?>"><br>
                    password: <input type="text" name="password" value="<?= $registro['password']?>"><br>
                    rfc: <input type="text" name="rfc" value="<?= $registro['rfc']?>"><br>
                    curp: <input type="text" name="curp" value="<?= $registro['curp']?>"><br>
                    <input type="submit" value="Modificar">
                </fieldset>
            </form>
            <?php 
        }
    }
    ?>
</body> 
</html>