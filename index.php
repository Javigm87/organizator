<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Organizator</title>
    <style>
        @import url(style.css);
    </style>
</head>
<body>
    <form id="formulario">        
        <input type="text" id="tarea" name="tarea" maxlength="36" placeholder="Ingresa aquí la tarea" required >
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
        <input type="date" id="fechaPlanificada" name="fechaPlanificada" value=<?php $hoy=date("Y-m-d"); echo $hoy;?> min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required>
        <br>

        <label for="fechaLimite">Fecha límite:</label>
        <input type="date" id="fechaLimite" name="fechaLimite" value=<?php $hoy=date("Y-m-d"); echo $hoy;?> min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required>
        <br>

        <label for="periodicidad">Periodicidad:</label>
        <input type="text" id="periodicidad" name="periodicidad" maxlength="25" required>
        <br>

        <button type="button" onclick="guardarTarea()">Enviar</button>
    </form>
    <a href="tareas.php">Mostrar Lista de Tareas</a>
    <script src="guardar.js"></script>


</body>
</html>
