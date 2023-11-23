<?php
include 'conexion.php';

// Obtener la frase del formulario
$frase = $_POST['frase'];

// Preparar la sentencia SQL
$sql = "INSERT INTO frases (frase) VALUES ('$frase')";

// Ejecutar la sentencia
if ($conexion->query($sql) === TRUE) {
    echo "Frase guardada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
