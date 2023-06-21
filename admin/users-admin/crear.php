<?php 
    include '../../helpers/funciones-ayuda.php';
    $con = mysqli_connect('localhost', 'jban', '', 'up', '3306');
    if(!$con){
        echo "no conecto a base de datos";
    }
    $validaciones = [];
    

    if($_SERVER["REQUEST_METHOD"] === 'POST') {

        $nombre =  $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $cel = $_POST["cel"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $numero_empleado = $_POST["numero_empleado"];
        $rol = $_POST["rol"] ?? null;
        $date = $_POST["date"];
        $imgPerfil = $_FILES['imagen'] ?? null;
        
        // escapa caracteres especiales 
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $apellidos = mysqli_real_escape_string($con, $_POST['apellidos']);
        $cel = mysqli_real_escape_string($con, $_POST['cel']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $numero_empleado = mysqli_real_escape_string($con, $_POST['numero_empleado']);

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
        if(!(strlen($cel) === 10)) {
            $validaciones[] = "Introduce un numero de celular Valido " . strlen($cel);
        }
        if(!$rol) {
            $validaciones[] = "Te falto capturar el rol";
        }
        if(!$date) {
            $validaciones[] = "Te falto capturar la fecha de nacimiento";

        }
        verinfo_var($imgPerfil);
        verinfo_var($_POST);

        if(!$imgPerfil || !str_contains($imgPerfil['type'],  'image')) {
            $validaciones[] = "Imagen no valida";
        }
        $imgSize = 2*1000*1000;       

        if($imgPerfil['size'] > $imgSize) {
            $validaciones[] = "Imagen de perfil muy grande";
        }
        // valida si errores este vacio
        if(empty($validaciones)) {
            
            $folderPath= "../../img/img-user-admin/";
            $imgPath = "";
            $imgName = "";
            // crea folder si no existe
            if(!is_dir($folderPath)){
                mkdir($folderPath);
            }
            // guarda img
            if($imgPerfil){
                // crea un path
                $imgPath = $folderPath . md5(uniqid(rand(), true)) . '/' . $imgPerfil['name'];
                mkdir(dirname($imgPath));
                // mueve de el servidor al path del proyecto
                move_uploaded_file($imgPerfil['tmp_name'], $imgPath);
                
                $imgName = str_replace($folderPath, '', $imgPath);
            }
            // insertar en bd
            $query = "INSERT INTO admin(
                nombre,
                apellido,
                num_empleado,
                imagen,
                correo,
                password,
                numero_celular,
                fecha_nacimiento,
                rol
            ) VALUES(
                '$nombre',
                '$apellidos',
                '$numero_empleado',
                '$imgName',
                '$email',
                '$passwordEncrypted',
                '$cel',
                '$date',
                '$rol'
            )";
            $res = mysqli_query($con, $query);
            if($res){
                header('location: /index.php?mensaje=1');
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
        <a href="../index.php">Volver</a>
        <?php foreach($validaciones as $valido): ?>
            <div>
                <?php echo $valido; ?>
            </div>
        <?php endforeach; ?>

        <form action="./crear.php" method="POST" enctype="multipart/form-data">
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
    <footer>

    </footer>
</body>
</html>
<?php 
    mysqli_close($con);
?>