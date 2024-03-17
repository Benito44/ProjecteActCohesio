<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($activitat) ? "Editar" : "Afegir" ?> Activitat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estils/estils.css">
</head>

<body>
    <?php include 'AdminHeader.vista.php'; ?>
    <div class="container mt-5">
        <h1>Estàs segur que vols eliminar aquesta activitat?</h1>
        <h2>Informacio de l'activitat</h2>
        <p>Nom: <?= $activitat["nom"] ?></p>
        <p>Descripcio: <?= $activitat["descripcio"] ?></p>
        <p>Prof. Assistencia: <?= $professorAssistencia["nom"] . " " . $professorAssistencia["cognoms"] ?></p>
        <p>Prof. Puntuador: <?= $professorPuntuador["nom"] . " " . $professorPuntuador["cognoms"] ?> </p>
        <p>Localitzacio: <?= $activitat["localitzacio"] ?></p>
        <p>Coordenades: <?= $activitat["latitud"] . ", " . $activitat["longitud"] ?></p>
        <form method="POST">
            <input type="text" hidden name="activitat_id" value="<?= $activitat["id"] ?>">
            <button type="submit" class="btn btn-danger mr-2">Eliminar</button>
            <a href="llistaActivitats.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>