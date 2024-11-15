<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM notes";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <title>Notas CRUD</title>
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Gestionar Notas</h1>

        <!-- Formulario Agregar Nota -->
        <div class="card mb-5" role="form">
            <div class="card-header bg-primary text-white">
                <h2 class="h4 mb-0">Agregar Nota</h2>
            </div>
            <div class="card-body">
                <form action="agregarNota.php" method="POST" id="agregarnota" class="row g-3" aria-label="Formulario para agregar una nueva nota">
                    <div class="col-md-6">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduce el nombre" required aria-required="true">
                    </div>
                    <div class="col-md-6">
                        <label for="UserName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Introduce el username" required aria-required="true">
                    </div>
                    <div class="col-12">
                        <label for="Nota" class="form-label">Nota</label>
                        <textarea class="form-control" id="Nota" name="Nota" form="agregarnota" rows="3" placeholder="Escribe tu nota aquí..." required aria-required="true"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success" aria-label="Agregar nota">Agregar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de Notas Guardadas -->
        <div class="card" aria-labelledby="notas-guardadas">
            <div class="card-header bg-secondary text-white">
                <h2 class="h4 mb-0" id="notas-guardadas">Notas Guardadas</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" aria-live="polite">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <td><?= $row['ID'] ?></td>
                                <td><?= htmlspecialchars($row['Nombre']) ?></td>
                                <td><?= htmlspecialchars($row['UserName']) ?></td>
                                <td>
                                    <span class="nota-corta"><?= htmlspecialchars(substr($row['Nota'], 0, 50)) ?>...</span>
                                    <span class="nota-larga d-none"><?= htmlspecialchars($row['Nota']) ?></span>
                                    <button class="btn btn-link p-0 toggle-nota" aria-expanded="false" aria-controls="nota-<?= $row['ID'] ?>">Leer más</button>
                                </td>
                                <td>
                                    <a href="formEditar.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm" aria-label="Editar nota ID <?= $row['ID'] ?>">Editar</a>
                                    <a href="eliminarNota.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" aria-label="Eliminar nota ID <?= $row['ID'] ?>" onclick="return confirm('¿Estás seguro de eliminar esta nota?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
