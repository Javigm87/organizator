<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-size: 18px;
            margin-bottom: 10px;
            display: inline-block;
        }

        h1 {
            color: #007BFF;
            font-size: 28px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .eliminar-btn {
            margin-left: auto;
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .eliminar-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <a href="index.html">Volver a Inicio</a>
    <h1>Listado de Tareas</h1>

    <ul>
    <?php
            // Incluir el archivo de conexión a la base de datos
            include 'conexion.php';

            // Verificar si se ha enviado el formulario (si se hizo clic en un botón eliminar)
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_tarea'])) {
                // Obtener el ID de la tarea a eliminar
                $id_tarea_a_eliminar = $_POST['eliminar_tarea'];

                // Preparar la consulta SQL para eliminar la tarea
                $sql_eliminar = "DELETE FROM tareas WHERE id = $id_tarea_a_eliminar";   

                // Ejecutar la consulta
                if ($conexion->query($sql_eliminar) === TRUE) {
                    echo "<p>Tarea eliminada correctamente.</p>";
                } else {
                    echo "<p>Error al eliminar la tarea: " . $conexion->error . "</p>";
                }
            }

            // Preparar la consulta SQL para obtener todas las tareas
            $sql = "SELECT * FROM tareas";

            // Ejecutar la consulta
            $result = $conexion->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y mostrar cada tarea
                while($row = $result->fetch_assoc()) {
                    echo "<li>";
                    echo "<div>";
                    echo $row["tarea"] . " ";
                    echo $row["aux"] . " ";
                    echo $row["campo"] . " ";
                    echo $row["fplanificada"] . " ";
                    echo $row["flimite"] . " ";
                    echo $row["periodicidad"] . " ";
                    echo "</div>";
                    echo "<button class='eliminar-btn' onclick='eliminarTarea(" . $row["id"] . ")'>Eliminar</button>";
                    echo "</li>";
                }
            } else {
                echo "<li>No hay tareas disponibles.</li>";
            }

            // Cerrar la conexión
            $conexion->close();
        ?>
    </ul>

    <script>
        function eliminarTarea(idTarea) {
            document.getElementById('eliminar-form').querySelector('input[name="eliminar_tarea"]').value = idTarea;
            document.getElementById('eliminar-form').submit();
        }
    </script>

    <form id="eliminar-form" method="post" style="display: none;">
        <input type="hidden" name="eliminar_tarea" value="">
    </form>
</body>
</html>
