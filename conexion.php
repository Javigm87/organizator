<?php
include '/etc/apache2/config.php';

// Crear conexión
$conexion = new mysqli($config['servidor'], $config['usuario'], $config['contrasena'], $config['bd']);


// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
