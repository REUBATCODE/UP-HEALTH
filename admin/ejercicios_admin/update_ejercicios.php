<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/crud-admin.css">
    <title>Editar Rutina</title>
</head>
<body>
    <main>
        <a href="../planesRutinas.php">Volver</a>
        <?php
            include '../../helpers/funciones-ayuda.php';
            include '../../includes/db.php';
            $con = connectDB();
            $id = $_GET['id_ejercicio'];
            $sqlQuerySelect = "SELECT * FROM ejercicios WHERE id_ejercicio = '$id';";
            $comando = mysqli_query($con,$sqlQuerySelect);
            if($comando->num_rows>0){
                while($registro = $comando->fetch_assoc()){
                    $id_ejercicio = $registro['id_ejercicio'];
                    $nombre_ejercicio = $registro['nombre_ejercicio'];
                    $grupo_muscular = $registro['grupo_muscular'];
                    $descripcion = $registro['descripcion'];
                    $imagen = $registro['imagen'];
                }

            }

        ?>
        <form action="update_back_ejercicios.php" method="post" enctype="multipart/form-data">            
            <input type="hidden" name="id_ejercicio" value="<?= $id_ejercicio?>">
        <fieldset>
                <legend>Actualizar el Ejercicio</legend>
                <input type="text" placeholder="nombre_ejercicio" name="nombre_ejercicio" 
                value="<?=$nombre_ejercicio?>">
                <select name="grupo_muscular" id="grupo_muscular">
                    <option name="grupo_muscular" value="">Seleccione un Grupo</option>
                    <option name="grupo_muscular" value="pecho">PECHO</option>
                    <option name="grupo_muscular" value="espalda">ESPALDA</option>
                    <option name="grupo_muscular" value="gluteo">GLÚTEO</option>
                    <option name="grupo_muscular" value="cuadriceps">CUADRICEPS</option>
                    <option name="grupo_muscular" value="gemelos">GEMELOS</option>
                    <option name="grupo_muscular" value="femoral">FEMORAL</option>
                    <option name="grupo_muscular" value="hombro">HOMBRO</option>
                    <option name="grupo_muscular" value="biceps">BICEPS</option>
                    <option name="grupo_muscular" value="triceps">TRICEPS</option>
                    <option name="grupo_muscular" value="abdomen">ABDOMEN</option>
                </select>
                <input type="text" placeholder="descripcion" name="descripcion" value ="<?=$descripcion?>">
                <div>
                    <label for="profile_pic">Subir Imagen</label>
                    <input id="profile_pic" type="file" name="imagen_rutina"/>
                </div>
            </fieldset>
            <input type="submit" value="Actualizar">
        </form>
    </main>
</body>
</html>