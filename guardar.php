<?php
include 'conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener los datos del formulario
$frase = $_POST['frase'];
$aux = $_POST['aux'];
$campo = $_POST['campo'];
$fechaPlanificada = $_POST['fechaPlanificada'];
$fechaLimite = $_POST['fechaLimite'];
$periodicidad = $_POST['periodicidad'];


print_r($_POST);
echo $frase;


// Preparar la sentencia SQL
$sql = "INSERT INTO frases (frase, aux, campo, fecha_planificada, fecha_limite, periodicidad) 
        VALUES ('$frase', '$aux', '$campo', '$fechaPlanificada', '$fechaLimite', '$periodicidad')";

// Ejecutar la sentencia
if ($conexion->query($sql) === TRUE) {
    echo "Frase guardada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
