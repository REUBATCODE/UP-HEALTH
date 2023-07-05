<?php
include '../../helpers/funciones-ayuda.php';
include '../../includes/db.php';
// conexion bd
$con = connectDB();
try{
    $id = $_GET['id_ejercicio'];
    $nombreImg = $_GET['imagen'];
    $carpetaImagen = '../../img/ejercicios/';
    $rutaArchivo = $carpetaImagen . $nombreImg;
    if(file_exists($rutaArchivo)){
        unlink($rutaArchivo);
    }
    $queryDeleteEjercicios = "DELETE FROM ejercicios WHERE id_ejercicio = '$id';";
    echo $queryDeleteEjercicios;
    $comando = mysqli_query($con,$queryDeleteEjercicios);
    if($comando){
        header('location: ../planesRutinas.php');
    }else{
        echo 'Error al eliminar';
    }
} catch (Exception $e) {
    echo 'Se ha detectado un acceso no permitido. : ',  $e->getMessage(), "\n";
}
?>