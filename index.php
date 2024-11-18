<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Reparación</title>
    <!-- Incluir Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center">Centro de Reparación de Electrodomésticos</h1>

        <!-- Botón para desplegar el formulario de Registro de Persona -->
        <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#formPersona" aria-expanded="false" aria-controls="formPersona">
            Registrar Persona
        </button>

        <!-- Formulario de Registro de Persona (oculto inicialmente) -->
        <div class="collapse" id="formPersona">
            <form action="registrar_persona.php" method="POST" class="mt-3">
                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="identificacion" class="form-control" placeholder="Identificación" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="correo" class="form-control" placeholder="Correo" required>
                </div>
                <button type="submit" class="btn btn-success">Registrar Persona</button>
            </form>
        </div>

        <!-- Botón para desplegar el formulario de Registro de Equipo -->
        <button class="btn btn-info mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#formEquipo" aria-expanded="false" aria-controls="formEquipo">
            Registrar Equipo
        </button>

        <!-- Formulario de Registro de Equipo (oculto inicialmente) -->
        <div class="collapse" id="formEquipo">
            <form action="registrar_equipo.php" method="POST" class="mt-3">
                <div class="mb-3">
                    <select name="persona_id" class="form-select" required>
                        <option value="">Seleccionar Persona</option>
                        <?php
                        include('db.php');
                        $result = $conn->query("SELECT * FROM personas");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . " " . $row['apellidos'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" name="equipo_nombre" class="form-control" placeholder="Nombre del Equipo" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="tipo_electrodomestico" class="form-control" placeholder="Tipo de Equipo">
                </div>
                <div class="mb-3">
                    <input type="text" name="color" class="form-control" placeholder="Color del Equipo">
                </div>
                <div class="mb-3">
                    <textarea name="descripcion" class="form-control" placeholder="Descripción del Problema" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Registrar Equipo</button>
            </form>
        </div>

        <!-- Botón para Ver Registros de Equipos -->
        <a href="ver_registros.php" class="btn btn-warning mt-3">Ver Registros de Equipos</a>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
