<?php 
    $err = $_GET['err'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/createAdmin.css">
    <title>Crear Rutina</title>
</head>
<body>
    <main>
        <a href="../planesRutinas.php">Volver</a>
        <?php
            if($err=='1'){
                echo '<div><p>Te Hacen falta llenar campos</p></div>';
            }
        ?>
        <form action="crear_ejercicio.php" method="post" enctype="multipart/form-data">            
            <fieldset>
                <legend>Agregar una Rutina</legend>
                <input type="text" placeholder="nombre_ejercicio" name="nombre_ejercicio">
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
                <input type="text" placeholder="descripcion" name="descripcion">
                <div>
                    <label for="profile_pic">Subir Imagen</label>
                    <input id="profile_pic" type="file" name="imagen_rutina"/>
                </div>
            </fieldset>
            <input type="submit" value="Registrar">
        </form>
    </main>
</body>
</html>