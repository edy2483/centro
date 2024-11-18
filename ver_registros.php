<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Registros de Equipos</title>
    <!-- Enlace a Bootstrap 4.5 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center">Registros de Equipos</h1>

        <!-- Botón de Regreso -->
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </div>

        <!-- Formulario de Búsqueda por Persona -->
        <h2>Buscar Persona</h2>
        <form action="ver_registros.php" method="GET">
            <div class="form-group">
                <input type="text" name="buscar_persona" class="form-control" placeholder="Buscar por nombre o apellidos" value="<?php echo isset($_GET['buscar_persona']) ? $_GET['buscar_persona'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <!-- Tabla de Equipos Registrados -->
        <h2 class="mt-4">Equipos Registrados</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Persona</th>
                    <th>Equipo</th>
                    <th>Tipo de Electrodoméstico</th>
                    <th>Color</th>
                    <th>Descripción</th>
                    <th>Fecha de Ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db.php');
                
                // Obtener el término de búsqueda
                $buscar_persona = isset($_GET['buscar_persona']) ? $_GET['buscar_persona'] : '';
                
                // Consulta SQL básica
                $sql = "SELECT equipos.id, personas.nombre, personas.apellidos, equipos.equipo_nombre, equipos.tipo_electrodomestico, 
                        equipos.color, equipos.descripcion, equipos.fecha_ingreso 
                        FROM equipos 
                        JOIN personas ON equipos.persona_id = personas.id";
                
                // Si se proporciona un término de búsqueda, agregarlo a la consulta
                if ($buscar_persona) {
                    $sql .= " WHERE personas.nombre LIKE '%$buscar_persona%' OR personas.apellidos LIKE '%$buscar_persona%'";
                }

                // Ejecutar la consulta
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['nombre'] . " " . $row['apellidos'] . "</td>
                            <td>" . $row['equipo_nombre'] . "</td>
                            <td>" . $row['tipo_electrodomestico'] . "</td>
                            <td>" . $row['color'] . "</td>
                            <td>" . $row['descripcion'] . "</td>
                            <td>" . $row['fecha_ingreso'] . "</td>
                            <td>
                                <form action='editar_equipo.php' method='GET'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-warning'>Editar</button>
                                </form>
                                <form action='eliminar_equipo.php' method='GET' onsubmit='return confirm(\"¿Seguro que desea eliminar este equipo?\");'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-danger'>Eliminar</button>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
