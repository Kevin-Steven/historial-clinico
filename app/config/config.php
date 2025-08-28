<?php
    $host = 'localhost';
    $usuario = 'root';
    $clave = 'root12345';
    $baseDeDatos = 'historialClinico';
    $puerto = '3306';

    $conn = new mysqli($host, $usuario ,$clave, $baseDeDatos, $puerto);

    if($conn -> connect_error){
        die("Error de conexión: " . $conn -> connect_error);
    }
?>