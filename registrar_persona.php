<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO personas (nombre, apellidos, identificacion, telefono, correo) 
            VALUES ('$nombre', '$apellidos', '$identificacion', '$telefono', '$correo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Persona registrada con éxito!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
