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


        <!-- <label for="fechaPlanificada">Fecha planificada:</label> -->
        <input type="date" id="fechaPlanificada" name="fechaPlanificada" value=<?php $hoy=date("Y-m-d"); echo $hoy;?> min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required>
        <!-- <label for="fechaLimite">Fecha límite:</label> -->
        <input type="date" id="fechaLimite" name="fechaLimite" value=<?php $hoy=date("Y-m-d"); echo $hoy;?> min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required>
        <br>

        <!-- <label for="aux">Aux:</label>
        <input type="text" id="aux" name="aux" maxlength="3" required>
        <br>  -->       

        <select id="campo" name="campo" required>
            <option value="Profesor">Profesor</option>
            <option value="Cliente Misterioso">Cliente Misterioso</option>
            <option value="Personal">Personal</option>
            <option value="Organización">Organización</option>
            <option value="Otro">Otro</option>
        </select>
        <span class="periodo">
        Cada
        <input type="number" id="periodicidad" name="periodicidad" required>
        días
        </span>
        <br>

        <button type="button" onclick="guardarTarea()">Enviar</button>
    </form>
    <a href="tareas.php">Mostrar Lista de Tareas</a>
    <script src="guardar.js"></script>


</body>
</html>
