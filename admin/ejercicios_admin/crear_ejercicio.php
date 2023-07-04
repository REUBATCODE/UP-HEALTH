<?php
include '../../helpers/funciones-ayuda.php';
include '../../includes/db.php';
// conexion bd
$con = connectDB();
$validaciones = [];
$nombre =  $_POST['nombre_ejercicio'];
$grupo_muscular = $_POST['grupo_muscular'] ?? null;
$descripcion = $_POST['descripcion'];
$imgPerfil = $_FILES['imagen_rutina'] ?? null;

// escapa caracteres especiales 
$nombre = mysqli_real_escape_string($con, $_POST['nombre_ejercicio']);
$descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
if (!$nombre) {
    $validaciones[] = "Te falta capturar un nombre";
}
if (!$grupo_muscular) {
    $validaciones[] = "Te falta capturar el grupo muscular";
}
if (!$descripcion) {
    $validaciones[] = "Te falta capturar una descripción";
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

    $folderPath = "../../img/ejercicios/";
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
    $query = "INSERT INTO rutina (id_ejercicio, nombre_ejercicio, grupo_muscular, descripcion, imagen)
    VALUES (null, '$nombre', '$grupo_muscular', '$descripcion', '$imgName')
    ";
    echo $query; 
    $res = mysqli_query($con, $query);
    if ($res) 
    {
        header('location: ../planesRutinas.php');
    }
}else{
    header('Location: crear_ejercicio_front.php?err=1');
}
mysqli_close($con);
