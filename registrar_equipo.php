<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $persona_id = $_POST['persona_id'];
    $equipo_nombre = $_POST['equipo_nombre'];
    $tipo_electrodomestico = $_POST['tipo_electrodomestico'] ?: null;
    $color = $_POST['color'] ?: null;
    $descripcion = $_POST['descripcion'];

    $fecha_ingreso = date('Y-m-d');
    
    $sql = "INSERT INTO equipos (persona_id, equipo_nombre, tipo_electrodomestico, color, descripcion, fecha_ingreso) 
            VALUES ('$persona_id', '$equipo_nombre', '$tipo_electrodomestico', '$color', '$descripcion', '$fecha_ingreso')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Equipo registrado con éxito!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

