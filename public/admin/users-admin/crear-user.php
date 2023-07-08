<?php
include '../../helpers/funciones-ayuda.php';
include '../../includes/db.php';
// conexion bd
$con = connectDB();
$validaciones = [];
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

if (!$nombre) {
    $validaciones[] = "Te falto capturar un nombre";
}
if (!$apellidos) {
    $validaciones[] = "Te falto capturar apellidos";
}
if (!$email) {
    $validaciones[] = "Te falto capturar un email";
}
if (!$password) {
    $validaciones[] = "Te falto capturar una contraseña";
}
if (!$numero_empleado) {
    $validaciones[] = "Te falto capturar el numero de empleado";
}
if (!$cel) {
    $validaciones[] = "Te falto capturar el numero de celular";
}
if (!(strlen($cel) === 10)) {
    $validaciones[] = "Introduce un numero de celular Valido " . strlen($cel);
}
if (!$rol) {
    $validaciones[] = "Te falto capturar el rol";
}
if (!$date) {
    $validaciones[] = "Te falto capturar la fecha de nacimiento";
}

if (!$imgPerfil || !str_contains($imgPerfil['type'],  'image')) {
    $validaciones[] = "Imagen no valida";
}
$imgSize = 2 * 1000 * 1000;

if ($imgPerfil['size'] > $imgSize) {
    $validaciones[] = "Imagen de perfil muy grande";
}
// valida si errores este vacio
if (empty($validaciones)) {

    $folderPath = "../../img/img-user-admin/";
    $imgPath = "";
    $imgName = "";
    // crea folder si no existe
    if (!is_dir($folderPath)) {
        mkdir($folderPath);
    }
    // guarda img
    if ($imgPerfil) {
        // crea un path
        $imgPath = md5(uniqid(rand(), true)) . $imgPerfil['name'];
        mkdir(dirname($imgPath));
        // mueve de el servidor al path del proyecto
        move_uploaded_file($imgPerfil['tmp_name'], $folderPath . $imgPath);

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
    if ($res) {
        header('location: ./index.php?mensaje=1');
    }
}else{
    header('Location: ./crear.php?err=1');
}

mysqli_close($con);
