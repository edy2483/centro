<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $persona_id = $_POST['persona_id'];
    $equipo_nombre = $_POST['equipo_nombre'];
    $tipo_electrodomestico = $_POST['tipo_electrodomestico'] ?: null; // Si no se llena, se considera nulo
    $color = $_POST['color'] ?: null; // Si no se llena, se considera nulo
    $descripcion = $_POST['descripcion'];

    // Actualizar la información del equipo
    $sql = "UPDATE equipos SET 
                persona_id = '$persona_id', 
                equipo_nombre = '$equipo_nombre', 
                tipo_electrodomestico = '$tipo_electrodomestico', 
                color = '$color', 
                descripcion = '$descripcion' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Equipo actualizado con éxito!";
        header("Location: ver_registros.php"); // Redirige a la página de registros
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<form method="POST" action="editar_equipo.php">
    <input type="hidden" name="id" value="<?php echo $equipo['id']; ?>">
    <input type="text" name="equipo_nombre" value="<?php echo $equipo['equipo_nombre']; ?>" required>
    <textarea name="descripcion" required><?php echo $equipo['descripcion']; ?></textarea>
    <button type="submit">Actualizar Equipo</button>
</form>
