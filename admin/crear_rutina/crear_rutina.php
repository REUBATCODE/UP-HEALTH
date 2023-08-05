<?php 
    $mensaje = $_GET['mensaje'] ?? null;
?>
<?php
    include '../../helpers/funciones-ayuda.php';
    include '../../includes/db.php';
?>
    <?php
        $con = connectDB();
        $mostrar ="";
        $query = "SELECT * FROM ejercicios;";
        $res = $con->query($query);   
               
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../planesRutinas.php">
</head>
<body>
    <section id = "menu">
        <div class = "logo">
            <img src="../../img/logo.png" alt="">
            <a href="../../admin/index.php"><h2>Menú</h2></a>
        </div>
        </div>
        <!-----crearemos el menu desplegable test ----->
            <div id = "sidebar" class ="items">
                    <li><i class="fas fa-clipboard"></i><a href="../planesRutinas.php"> Ejercicios</a></li>
                    <li><i class="fas fa-dumbbell"></i><a href="#"> Rutinas de Entrenamiento</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id = "interface">
        <div class = "navegacion">
            <div class = "n1">
                <div>
                    <i id = "menu-btn" class ="fas fa-bars"></i>
                </div>
                <div class = "search">
                    <i class ="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class = "profile">
                <i class ="far fa-bell"></i>
                <img src="../../img/usuarioPerfil.jpg" alt="">
            </div>
        </div>

        <h3 class = "i-name">
            Rutinas de Entrenamiento
        </h3>

        <div class ="values">
            <a href="../users-admin/">
                <div class ="val-box">
                    <i class = "fas fa-users"></i>
                    <div>
                        <h3> Usuarios</h3>
                        <span> Nuevos Usuarios</span>
                    </div>
                </div>
            </a>
            
            <div class ="val-box">
                <i class = "fas fa-heart"></i>
                <div>
                    <h3> Ejercicios</h3>
                    <span> Lista de Ejercicios</span>
                </div>
            </div>
            <div class ="val-box">
                <i class = "fas fa-dollar-sign"></i>
                <div>
                    <h3> Producto Vendido </h3>
                    <span> Esta Semana </span>
                </div>
            </div>
        </div>
        <div>
            <div>
            <form method="post" action="#">
            <select name="nombre_ejercicio" id="selecEjercicio">
                <option value="seleccionar">Selecciona el Grupo Muscular</option>
                <?php while ($registro = $res->fetch_assoc()): ?>
                    <optgroup class="grupo_muscular" label="<?php echo $registro['grupo_muscular']; ?>">
                        <option class="nombre_ejercicio"><?php echo $registro['nombre_ejercicio']; ?></option>
                        <?php $seleccionado = $registro['nombre_ejercicio'] ?>
                <?php endwhile; ?>
                    </optgroup>
            </select>
                <input type="submit" name="limpiar" value="Limpiar">
                <input type="submit" value="Añadir">
            </form>
                 <?php
                    session_start();
                    $con = connectDB();

                    // Inicializa la variable de sesión si aún no está definida
                    if (!isset($_SESSION['seleccionados'])) {
                        $_SESSION['seleccionados'] = array();
                    }

                    // Asegúrate de verificar si se envió el formulario antes de acceder a $_POST['nombre_ejercicio']
                    if (isset($_POST['nombre_ejercicio'])) {
                        $nombre_ejercicio = $_POST['nombre_ejercicio'];

                        // Utiliza consultas preparadas para evitar inyecciones SQL
                        $query = "SELECT * FROM ejercicios WHERE nombre_ejercicio = ?";
                        // Prepara la consulta
                        $stmt = $con->prepare($query);
                        // Asocia el valor del nombre del ejercicio al marcador de posición
                        $stmt->bind_param("s", $nombre_ejercicio);
                        // Ejecuta la consulta
                        $stmt->execute();
                        // Obtiene el resultado de la consulta
                        $res = $stmt->get_result();

                        // Crea un arreglo para almacenar los datos del SELECT actual
                        $datos_actual = array();
                        while ($registro = $res->fetch_assoc()) {
                            $datos_actual[] = $registro;
                        }

                        // Almacena los datos del SELECT actual en la variable de sesión
                        $_SESSION['seleccionados'][] = $datos_actual;
                    }

                    // Acción para limpiar los datos
                    if (isset($_POST['limpiar'])) {
                        $_SESSION['seleccionados'] = array(); // Limpiar el arreglo de selecciones
                    }

                    // Si la página se ha cargado por primera vez (sin una solicitud POST), limpiar los datos
                    if (!isset($_POST['nombre_ejercicio']) && !isset($_POST['limpiar'])) {
                        $_SESSION['seleccionados'] = array();
                    }

                    // Aquí puedes hacer lo que desees con los datos almacenados en la variable de sesión, por ejemplo, imprimirlos en la tabla
                   
                    echo "<form method='post' action='./registrar_rutina.php'>";
                    echo "<table border='10' width='30%' id='resultadoTabla'>";
                    echo "<tr>
                            <th>id_ejercicio</th>
                            <th>nombre_ejercicio</th>
                            <th>grupo_muscular</th>
                            <th>descripcion</th>
                            <th>imagen</th>
                          </tr>";
                    
                    $filasTabla = array();
                    $registros = array();
                    foreach ($_SESSION['seleccionados'] as $datos_select) {
                        foreach ($datos_select as $registro) {
                            $fila = "<tr>";
                            $fila .= "<td>" . $registro['id_ejercicio'] . "</td>";
                            $fila .= "<td>" . $registro['nombre_ejercicio'] . "</td>";
                            $fila .= "<td>" . $registro['grupo_muscular'] . "</td>";
                            $fila .= "<td>" . $registro['descripcion'] . "</td>";
                            $fila .= "<td><img src='../../img/ejercicios/" . $registro['imagen'] . "' width='65px' height='55px'></td>";
                            $fila .= "</tr>";
                            $registros[] = $registro;
                            $filasTabla[] = $fila;
                        }
                    }
                    
                    // Mostrar la tabla fuera del bucle
                    foreach ($filasTabla as $fila) {
                        echo $fila;
                    }
                    
                    echo "</table>";
                    
                    // Campo oculto para el nombre de la rutina
                    echo "<input type='text' name='nombre_rutina' placeholder='SOLO NUMEROS'>";
                    
                    // Campos ocultos para los datos de las filas
                    foreach ($registros as $indice => $registro) {
                        echo "<input type='hidden' name='registros[$indice][id_ejercicio]' value='" . htmlspecialchars($registro['id_ejercicio']) . "'>";
                        echo "<input type='hidden' name='registros[$indice][nombre_ejercicio]' value='" . htmlspecialchars($registro['nombre_ejercicio']) . "'>";
                        echo "<input type='hidden' name='registros[$indice][grupo_muscular]' value='" . htmlspecialchars($registro['grupo_muscular']) . "'>";
                        echo "<input type='hidden' name='registros[$indice][descripcion]' value='" . htmlspecialchars($registro['descripcion']) . "'>";
                        echo "<input type='hidden' name='registros[$indice][imagen]' value='" . htmlspecialchars($registro['imagen']) . "'>";
                    }
                    
                    // Botones para enviar el formulario
                    echo "<input type='submit' name='registrar' value='Registrar Rutina'>";
                    
                    echo "</form>";
                    
                ?>
            </div>
        </div>
    </section>
    </body>
</html>