<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <style>
        /* ... (tu estilo CSS) */
    </style>
</head>
<body>
    <a href="index.html"><<</a>
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
                    echo "<li><strong>Tarea:</strong> " . $row["tarea"] . "<br>";
                    echo "<strong>Aux:</strong> " . $row["aux"] . "<br>";
                    echo "<strong>Campo:</strong> " . $row["campo"] . "<br>";
                    echo "<strong>Fecha Planificada:</strong> " . $row["fplanificada"] . "<br>";
                    echo "<strong>Fecha Límite:</strong> " . $row["flimite"] . "<br>";
                    echo "<strong>Periodicidad:</strong> " . $row["periodicidad"] . "<br>";
                    echo "<button class='eliminar-btn' onclick='eliminarTarea(" . $row["id"] . ")'>Eliminar</button></li>";
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
            // Enviar el formulario con el ID de la tarea a eliminar
            document.getElementById('eliminar-form').querySelector('input[name="eliminar_tarea"]').value = idTarea;
            document.getElementById('eliminar-form').submit();
        }
    </script>

    <form id="eliminar-form" method="post" style="display: none;">
        <input type="hidden" name="eliminar_tarea" value="">
    </form>
</body>
</html