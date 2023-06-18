<?php
    include '../../helpers/funciones-ayuda.php';
    $con = mysqli_connect('localhost', 'jban', '', 'up', '3306');
    if(!$con){
        echo "no conecto a base de datos";
    }
    $query = "SELECT * FROM admin";
    if($res = $con->query($query)){
    }    
?>
<main>
    <table>
        <thead>
            <tr>
            <th></th>
            <th># Empleado</th>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Status</th>
            <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php while($adminRow = $res->fetch_assoc()):?>
            <tr>
                <td>
                    <img src="<?php echo $adminRow['imagen']?>" alt="">
                </td>
                <td>
                    <?php echo $adminRow['num_empleado'];?>
                </td>
                <td>
                    <?php echo $adminRow['nombre'] . " " . $adminRow['apellido'];?>

                </td>
                <td>
                    <?php echo $adminRow['numero_celular'];?>

                </td>
                <td>
                    <?php echo $adminRow['status'];?>

                </td>
                <td>
                    <?php echo $adminRow['rol'];?>

                </td>
                <td>
                    <form action="">
                        <input type="hidden">
                        <input type="submit" value="borrar">
                    </form>
                    <form action="">
                        <a href="">Modificar</a>
                    </form>
                </td>
            </tr>
            <?php endwhile;?>

        </tbody>
        
    </table>
</main>

