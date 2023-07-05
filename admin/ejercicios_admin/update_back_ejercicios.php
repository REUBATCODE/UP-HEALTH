<?php
include '../../helpers/funciones-ayuda.php';
include '../../includes/db.php';
$con = connectDB();
//$id = $_GET['id_ejercicio'];
echo "eso eso esotodoamigos";
//print_r($_POST);
print_r($_FILES);
echo "solo <br><br>";
print $_FILES['imagen_rutina']['name'];

try{
    if(!empty($_FILES['imagen_rutina']['name'])){
        $folderPath = "../../img/ejercicios/";
        $imgPath = "";
        $imgName = "";
        if (!is_dir($folderPath)) {
            mkdir($folderPath);
        }
            // guarda img
    if ($_FILES['imagen_rutina']['name']) {
        // crea un path
        $imgPath = md5(uniqid(rand(), true)) . $_FILES['imagen_rutina']['name'];
        mkdir(dirname($imgPath));
        // mueve de el servidor al path del proyecto
        move_uploaded_file($_FILES['imagen_rutina']['tmp_name'], $folderPath . $imgPath);

        $imgName = str_replace($folderPath, '', $imgPath);
    }
    $sqlUpdateEjercicios = "UPDATE ejercicios SET nombre_ejercicio = '{$_POST['nombre_ejercicio']}',grupo_muscular = '{$_POST['grupo_muscular']}', descripcion = '{$_POST['descripcion']}', imagen = '{$imgName}' WHERE id_ejercicio = '{$_POST['id_ejercicio']}';";    
    echo $sqlUpdateEjercicios;
    $comando = mysqli_query($con,$sqlUpdateEjercicios);
        header('location: ../planesRutinas.php');
    }else{
        
        $sqlUpdateEjercicios = "UPDATE ejercicios SET nombre_ejercicio = '{$_POST['nombre_ejercicio']}',grupo_muscular = '{$_POST['grupo_muscular']}', descripcion = '{$_POST['descripcion']}' WHERE id_ejercicio = '{$_POST['id_ejercicio']}';";    
        echo $sqlUpdateEjercicios;
        $comando = mysqli_query($con,$sqlUpdateEjercicios);
        header('location: ../planesRutinas.php'); 
    }
}catch(Exception $e){
    echo 'Se ha detectado un acceso no permitido. : ',  $e->getMessage(), "\n";
}
?>