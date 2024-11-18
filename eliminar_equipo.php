<?php
include('db.php');

$id = $_GET['id'];
$sql = "DELETE FROM equipos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Equipo eliminado con éxito!";
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
