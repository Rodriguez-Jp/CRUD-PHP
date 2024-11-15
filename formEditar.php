<?php 
include("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM notes WHERE ID='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar Nota</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Nota</h2>
        <form action="editarNota.php" method="POST" id="editarNotaForm" class="needs-validation" aria-labelledby="editar-nota">
            <input type="hidden" name="ID" value="<?= $row['ID']?>">

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" value="<?= htmlspecialchars($row['Nombre']) ?>" required aria-required="true" aria-describedby="nombreHelp">
                <div id="nombreHelp" class="invalid-feedback">Por favor, ingrese un nombre.</div>
            </div>

            <div class="mb-3">
                <label for="UserName" class="form-label">Username</label>
                <input type="text" name="UserName" id="UserName" class="form-control" placeholder="UserName" value="<?= htmlspecialchars($row['UserName']) ?>" required aria-required="true" aria-describedby="usernameHelp">
                <div id="usernameHelp" class="invalid-feedback">Por favor, ingrese un nombre de usuario.</div>
            </div>

            <div class="mb-3">
                <label for="Nota" class="form-label">Nota</label>
                <textarea name="Nota" id="Nota" class="form-control" placeholder="Nota" rows="4" required aria-required="true" aria-describedby="notaHelp"><?= htmlspecialchars($row['Nota']) ?></textarea>
                <div id="notaHelp" class="invalid-feedback">Por favor, ingrese una nota.</div>
            </div>

            <button type="submit" class="btn btn-primary" aria-label="Actualizar nota">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>

