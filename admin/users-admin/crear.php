<?php 
    $err = $_GET['err'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/createAdmin.css">
    <title>Crear Administrador</title>
</head>
<body>
    <main>
        <a href="../index.php">Volver</a>
        <?php
            if($err=='1'){
                echo '<div><p>Te Hacen falta llenar campos</p></div>';
            }
        ?>
        <form action="./crear-user.php" method="POST" enctype="multipart/form-data">            <fieldset>
                <legend>Agregar Administrador</legend>
                <input type="text" placeholder="nombre" name="nombre" require>
                <input type="text" placeholder="apellidos" name="apellidos" require>
                <input type="date" name="date">
                <input type="tel" placeholder="celular" name="cel" maxlength="10" require>
                <input type="email" placeholder="correo" name="email">
                <input type="password" placeholder="contraseña" name="pass">
                <input type="text" placeholder="numero de empleado" name="numero_empleado" require>
                <div>
                    <label for="profile_pic">Subir Imagen</label>
                    <input id="profile_pic" type="file" name="imagen"/>
                </div>
                
                <select name="rol" id="rol-admin">
                    <option name="rol" value="" selected disabled>Seleccione un Rol</option>
                    <option name="rol" value="admin">ADMIN</option>
                    <option name="rol" value="super">SUPER ADMIN</option>
                </select>
            </fieldset>
            <input type="submit" value="Registrar">
        </form>
        
    </main>
</body>
</html>