<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Organizator</title>
</head>
<body>
    <form id="formulario">
        <label for="tarea">Ingresa una tarea nueva:</label>
        <input style="width: 90%;" type="text" id="tarea" name="tarea" maxlength="36" required>
        <br>

        <label for="aux">Aux:</label>
        <input type="text" id="aux" name="aux" maxlength="3" required>
        <br>        

        <label for="campo">Campo:</label>
        <select id="campo" name="campo" required>
            <option value="Profesor">Profesor</option>
            <option value="Cliente Misterioso">Cliente Misterioso</option>
            <option value="Personal">Personal</option>
            <option value="Organización">Organización</option>
            <option value="Otro">Otro</option>
        </select>
        <br>

        <label for="fechaPlanificada">Fecha planificada:</label>
        <input type="date" id="fechaPlanificada" name="fechaPlanificada" required>
        <br>

        <label for="fechaLimite">Fecha límite:</label>
        <input type="date" id="fechaLimite" name="fechaLimite" required>
        <br>

        <label for="periodicidad">Periodicidad:</label>
        <input type="text" id="periodicidad" name="periodicidad" maxlength="25" required>
        <br>

        <button type="button" onclick="guardarTarea()">Enviar</button>
    </form>
    <a href="tareas.php">Mostrar Lista de Tareas</a>
    <script src="guardar.js"></script>

    <script>
        // Obtener la fecha actual en el formato YYYY-MM-DD
        var fechaActual = new Date().toISOString().split('T')[0];

        // Establecer la fecha mínima para los elementos date
        document.getElementById('fechaPlanificada').min = fechaActual;
        document.getElementById('fechaLimite').min = fechaActual;
    </script>
</body>
</html>