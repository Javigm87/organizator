<?php
include 'conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener los datos del formulario
$tarea = $_POST['tarea'];
//$aux = $_POST['aux'];
$campo = $_POST['campo'];
$fechaPlanificada = $_POST['fechaPlanificada'];
$fechaLimite = $_POST['fechaLimite'];
$periodicidad = $_POST['periodicidad'];



// Preparar la sentencia SQL
$sql = "INSERT INTO tareas (tarea, campo, fplanificada, flimite, periodicidad) 
        VALUES ('$tarea', '$campo', '$fechaPlanificada', '$fechaLimite', '$periodicidad')";

// Si queremos incluir el AUX
//$sql = "INSERT INTO tareas (tarea, aux, campo, fplanificada, flimite, periodicidad) 
//        VALUES ('$tarea', '$aux', '$campo', '$fechaPlanificada', '$fechaLimite', '$periodicidad')";

// Ejecutar la sentencia
if ($conexion->query($sql) === TRUE) {
    echo "Tarea guardada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
