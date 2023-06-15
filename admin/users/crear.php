<?php 
    include '../../helpers/funciones-ayuda.php';
    $con = mysqli_connect('localhost', 'jban', '', 'uphealth', '3306');
    if(!$con){
        exit;
    }
    verinfo_var($_POST);

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/crud-admin.css">
    <title>crear administrador</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="./crear.php" method="post">
            <fieldset>
                <legend>Agregar Administrador</legend>
                <input type="text" placeholder="nombre" name="nombre">
                <input type="text" placeholder="apellidos" name="apellidos">
                <input type="date" name="date">
                <input type="tel" placeholder="celular" name="cel">
                <input type="email" placeholder="correo" name="email">
                <input type="password" placeholder="contraseña" name="pass">
                <input type="text" placeholder="numero de empleado" name="numero_empleado">
                <div>
                    <label for="profile_pic">Subir Imagen</label>
                    <input id="profile_pic" type="file" id="" name="avatar" accept="image/.jpg, image/.jpeg, image/.png"/>
                </div>
                
                <select name="rol" id="rol-admin">
                    <option value="" selected disabled>Seleccione un Rol</option>
                    <option name="admin-rol" value="admin">ADMIN</option>
                    <option name="admin-rol" value="super">SUPER ADMIN</option>
                </select>
            </fieldset>
            <input type="submit" value="Registrar">
        </form>
        <button>Atras</button>
    </main>
    <footer>

    </footer>
</body>
</html>