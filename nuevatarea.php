<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
</head>
<body>

    <h1>Listado de Tareas</h1>

    <ul>
        <?php
            // Incluir el archivo de conexión a la base de datos
            include 'conexion.php';

            // Verificar si se proporcionó una nueva tarea a través de la URL
            if (isset($_GET['nueva_tarea'])) {
                // Obtener la nueva tarea desde la URL
                $nueva_tarea = $_GET['nueva_tarea'];

                // Insertar la nueva tarea en la base de datos
                $sql_insert = "INSERT INTO frases (frase) VALUES ('$nueva_tarea')";
                if ($conexion->query($sql_insert) === TRUE) {
                    echo "<li>Nueva tarea agregada: $nueva_tarea</li>";
                } else {
                    echo "<li>Error al agregar la tarea: " . $conexion->error . "</li>";
                }
            }

            // Preparar la consulta SQL para obtener todas las tareas
            $sql_select = "SELECT * FROM frases";

            // Ejecutar la consulta
            $result = $conexion->query($sql_select);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y mostrar cada tarea
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["frase"] . "</li>";
                }
            } else {
                echo "<li>No hay tareas disponibles.</li>";
            }

            // Cerrar la conexión
            $conexion->close();
        ?>
    </ul>

</body>
</html>
