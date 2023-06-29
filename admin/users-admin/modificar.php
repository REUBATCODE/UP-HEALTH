<?php 
    include '../../helpers/funciones-ayuda.php';
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: ./index.php');
    }
    $con = mysqli_connect('localhost', 'jban', '', 'up', '3306');
    if(!$con){
        echo "no conecto a base de datos";
    }
    $query = "SELECT * FROM admin WHERE id_admin=$id";
    $res = mysqli_query($con,$query);
    $admin = mysqli_fetch_assoc($res);
    $validaciones = [];
    
    $nombre =  $admin["nombre"];
    $apellidos = $admin["apellido"];
    $cel = $admin["numero_celular"];
    $email = $admin["correo"];
    $password = $admin["password"];
    $numero_empleado = $admin["num_empleado"];
    $rol = $admin["rol"];
    $date = $admin["fecha_nacimiento"];
    $status = $admin['status'];


    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        
        // asigna from files global var a una variable
        $imgPerfil = $_FILES['imagen'];

        // escapa caracteres especiales 
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $apellidos = mysqli_real_escape_string($con, $_POST['apellidos']);
        $cel = mysqli_real_escape_string($con, $_POST['cel']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $date = $_POST['date'] ?? null;
        $rol = $_POST['rol'] ?? null;
        $status = $_POST['status'] ?? null;
        $numero_empleado = mysqli_real_escape_string($con, $_POST['numero_empleado']);
        // Validaciones de nulos o vacios
        if(!$nombre) {
            $validaciones[] = "Te falto capturar un nombre";
        }
        if(!$apellidos) {
            $validaciones[] = "Te falto capturar apellidos";
        }
        if(!$email) {
            $validaciones[] = "Te falto capturar un email";
        }
        if(!$password) {
            $validaciones[] = "Te falto capturar una contraseña";
        }
        if(!$numero_empleado) {
            $validaciones[] = "Te falto capturar el numero de empleado";

        }
        if(!$cel) {
            $validaciones[] = "Te falto capturar el numero de celular";

        }
        
        if(!$rol) {
            $validaciones[] = "Te falto capturar el rol";
        }
        if(!$date) {
            $validaciones[] = "Te falto capturar la fecha de nacimiento";

        }
        if(!$status) {
            $validaciones[] = "Te falto capturar la fecha el status";

        }
        

        // tamaño maximo de la imagen        
        $imgSize = 2*1000*1000;       

        
        
        // valida si errores este vacio
        if(empty($validaciones)) {
            
            
            $folderPath= "../../img/img-user-admin/";
            

            $imgPath = "";
            // crea folder si no existe
            if(!is_dir($folderPath)){
                mkdir($folderPath);
            }
            // Renplaza por una una  img 
            if($imgPerfil['name']) {
                // Borra img anterior y crea una nueva
                unlink($folderPath . $admin["imagen"]);
                // crea un path
                $imgPath = md5(uniqid(rand(), true)) . $imgPerfil['name'];
                mkdir(dirname($imgPath));
                // mueve de el servidor al path del proyecto
                move_uploaded_file($imgPerfil['tmp_name'], $folderPath.$imgPath); 
            }else{
                $imgPath = $admin["imagen"];
            }
            str_replace($folderPath, '', $imgPath);
            // insertar en bd
            $query = "UPDATE admin SET nombre='$nombre', apellido='$apellidos', correo='$email', imagen='$imgPath', password='$password', numero_celular='$cel', rol='$rol', fecha_nacimiento='$date' , status='$status' WHERE id_admin = $id";
            echo $query;
            $res = mysqli_query($con, $query);
            if($res){
                header('location: ./index.php?mensaje=2');
            }
        } 

    }
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
        <a href="index.php">Volver</a>
        <?php foreach($validaciones as $valido): ?>
            <div>
                <?php echo $valido; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>MODIFICAR Administrador</legend>
                <input type="text" placeholder="nombre" name="nombre" value="<?php echo $nombre?>">
                <input type="text" placeholder="apellidos" name="apellidos" value="<?php echo $apellidos?>">
                <input type="date" name="date" value="<?php echo $date?>">
                <input type="tel" placeholder="celular" name="cel" value="<?php echo $cel?>">
                <input type="email" placeholder="correo" name="email" value="<?php echo $email?>">
                <input type="password" placeholder="contraseña" name="pass" value="<?php echo $admin["password"]?>">
                <input type="text" placeholder="numero de empleado" name="numero_empleado"value="<?php echo $numero_empleado?>">
                <img src="../../img/img-user-admin/<?php echo $admin["imagen"]?>" alt="">

                <div>
                    <label for="profile_pic">Cambiar Imagen</label>

                    <input id="profile_pic" type="file" name="imagen">/>
                </div>
                
                <select name="rol" id="rol-admin">
                    <option name="rol" value="<?php echo $rol ?>" selected disabled><?php echo $rol ?></option>
                    <option name="rol" value="admin">ADMIN</option>
                    <option name="rol" value="super">SUPER ADMIN</option>
                </select>

                <select name="status">
                    <option value="<?php echo $status?>"  name = "status" selected disabled><?php echo $status?></option>
                    <option value="baja" name = "status">baja</option>
                    <option value="activo" name = "status">activo</option>
                </select>
            </fieldset>
            <input type="submit" value="Registrar">
        </form>
        
    </main>
    <footer>

    </footer>
</body>
</html>
<?php 
    mysqli_close($con);
?>