<?php
    include '../../helpers/funciones-ayuda.php';
    include '../../includes/db.php';
    $mostrar ="";
    $con = connectDB();
    $query = "SELECT * FROM admin WHERE status='activo';";
    $res = $con->query($query);
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id_admin = $_POST["id_eliminar"] ?? null;
        $activos = $_POST["mostrar_activos"] ?? null;
        $bajas = $_POST["mostrar_bajas"] ?? null;
        $id_admin = filter_var($id_admin, FILTER_VALIDATE_INT);
        if($id_admin){
            $query = "UPDATE admin SET status='baja' WHERE id_admin = $id_admin";
            echo $query;
            $res = $con->query($query);
            if($res){
                header('Location: ./index.php?delete=1');
            }
        }
        if($activos){
            $query = "SELECT * FROM admin WHERE status='$activos';";
            $res = $con->query($query);
        }
        if($bajas){
            $query = "SELECT * FROM admin WHERE status='$bajas';";
            $res = $con->query($query);
        }
        if($activos && $bajas) {
            $query = "SELECT * FROM admin;";
            $res = $con->query($query);
        }
        
    }  
?>
<main>
    <div>
        <form  method="post">
        <label for="todos">
            Baja       
            <input type="checkbox" name="mostrar_bajas" id="todos" value="baja">
        </label>
        <label for="todos">
            Activos       
            <input type="checkbox" name="mostrar_activos" id="todos" value="activos">
        </label>
        <input type="submit" value="Aplicar Filtros">
        </form>
    </div>
    <div>
    <table>
        <thead>
            <tr>
            <th></th>
            <th># Empleado</th>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Status</th>
            <th>Rol</th>
            <th>Acción</th>
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
                    <?php echo $adminRow['correo'];?>
                </td>
                <td>
                    <?php echo $adminRow['status'];?>

                </td>
                <td>
                    <?php echo $adminRow['rol'];?>

                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_eliminar" value="<?php echo $adminRow['id_admin']?>">
                        <input type="submit" value="Eliminar">
                    </form>
                    <a href="./modificar.php?id=<?php echo $adminRow["id_admin"]; ?>">Modificar></a>
                </td>
            </tr>
            <?php endwhile;?>

        </tbody>
        
    </table>
    </div>


</main>

