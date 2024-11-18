<?php
$host = "localhost";
$user = "root"; // usuario de tu base de datos
$pass = ""; // contraseña de tu base de datos
$dbname = "reparacion_centro";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
