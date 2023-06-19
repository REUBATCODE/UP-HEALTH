<?php
    include '../../helpers/funciones-ayuda.php';
    $con = mysqli_connect('localhost', 'jban', '', 'up', '3306');
    if(!$con){
        echo "no conecto a base de datos";
    }
    $query = "SELECT * FROM admin";
    $res = $con->query($query);
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id_admin = $_POST["id_admin"];
        verinfo_var($id_admin);
        $id_admin = filter_var($id_admin, FILTER_VALIDATE_INT);
        if($id){
            $query = "DELETE FROM admin WHERE id_admin = $id_admin";
            $res = $con->query($query);
            if($res){
                header('Location: /admin/users-admin');
            }
        }
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
                    <img src="../../img/img-user-admin/<?php echo $adminRow['imagen']?>" alt="">
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
                        <input type="hidden" name="id_eliminar" value="<?php echo $adminRow['id_admin']?>">
                        <input type="submit" value="Eliminar">
                    </form>
                    <a href="./modificar.php?id=<?php echo $adminRow["id_admin"]; ?>">Modificar></a>
                </td>
            </tr>
            <?php endwhile;?>

        </tbody>
        
    </table>

</main>

