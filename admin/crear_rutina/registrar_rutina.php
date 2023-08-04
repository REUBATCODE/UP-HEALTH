<?php
include '../../includes/db.php';
$con = connectDB();
$mostrar = "";
$id = "";
$nombre_rutina = $_POST['nombre_rutina'];
try {
    // Obtener el valor de $id_rutina desde alguna fuente (formulario, variable, etc.)
    foreach ($_POST['registros'] as $registro) {
        $id_ejercicio = $registro['id_ejercicio'];
        $nombre_ejercicio = $registro['nombre_ejercicio'];
        $grupo_muscular = $registro['grupo_muscular'];
        $descripcion = $registro['descripcion'];
        $imagen = $registro['imagen'];

        // Escapamos los datos para evitar inyección SQL (mejor aún, usar consultas preparadas)
        $nombre_rutina = mysqli_real_escape_string($con, $nombre_rutina);
        $id_ejercicio = mysqli_real_escape_string($con, $id_ejercicio);

        // Preparar la consulta preparada
        $query = "INSERT INTO detallerutina (id_rutina, id_ejercicio, nombre) VALUES (?,?, ?)";
        $stmt = $con->prepare($query);

        // Asociar los parámetros
        // Aquí, asumiré que el valor de id_rutina debe ser un número entero, por lo que uso 'i' en bind_param.
        // Asegúrate de ajustar el tipo de dato si es diferente.
        $id_rutina = "1";
        $stmt->bind_param("iis",$id_rutina, $id_ejercicio, $nombre_rutina);

        // Ejecutar la consulta preparada
        $stmt->execute();
    }

    header('location: ./crear_rutina.php');
} catch (Exception $error) {
    echo 'No se ha podido ejercer la query: ' . $query;
}
?>
