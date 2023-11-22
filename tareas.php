<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            padding: 0;
            margin: 20px;
            list-style-type: none; /* Eliminar la viñeta de la lista */
        }

        li {
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            position: relative;
        }

        li:hover {
            background-color: #f9f9f9;
        }

        .eliminar-btn {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            transition: background-color 0.3s ease;
        }

        .eliminar-btn:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>

    <h1>Listado de Tareas</h1>

    <ul>
        <?php
            // Incluir el archivo de conexión a la base de datos
            include 'conexion.php';

            // Verificar si se ha enviado el formulario (si se hizo clic en un botón eliminar)
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_frase'])) {
                // Obtener el ID de la frase a eliminar
                $id_frase_a_eliminar = $_POST['eliminar_frase'];

                // Preparar la consulta SQL para eliminar la frase
                $sql_eliminar = "DELETE FROM frases WHERE id = $id_frase_a_eliminar";   

                // Ejecutar la consulta
                if ($conexion->query($sql_eliminar) === TRUE) {
                    echo "<p>Frase eliminada correctamente.</p>";
                } else {
                    echo "<p>Error al eliminar la frase: " . $conexion->error . "</p>";
                }
            }

            // Preparar la consulta SQL para obtener todas las tareas
            $sql = "SELECT * FROM frases";

            // Ejecutar la consulta
            $result = $conexion->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y mostrar cada tarea
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["frase"] . " <button class='eliminar-btn' onclick='eliminarFrase(" . $row["id"] . ")'>Eliminar</button></li>";
                }
            } else {
                echo "<li>No hay tareas disponibles.</li>";
            }

            // Cerrar la conexión
            $conexion->close();
        ?>
    </ul>

    <script>
        function eliminarFrase(idFrase) {
            // Enviar el formulario con el ID de la frase a eliminar
            document.getElementById('eliminar-form').querySelector('input[name="eliminar_frase"]').value = idFrase;
            document.getElementById('eliminar-form').submit();
        }
    </script>

    <form id="eliminar-form" method="post" style="display: none;">
        <input type="hidden" name="eliminar_frase" value="">
    </form>

</body>
</html>
