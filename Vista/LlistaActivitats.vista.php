<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir alumnes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/estils.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="../public/js/validacions.js"></script>
</head>

<body>
    <?php include 'AdminHeader.vista.php'; ?>
    <br>
    <div class="container btn-warning text-center">
        <a href="afegirActivitat.php" class="btn btn-secondary">Afegir Activitat</a>
    </div>
    <br>
    <br>
    <br>

    <!-- Mostrar error si existeix algun i esborrar-lo -->
    <?php if (isset($_SESSION['error'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php
        unset($_SESSION['error']);
    }
    ?>
    <?php if (empty($activitats)) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>No hi ha activitats</h1>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Descripcio</th>
                                <th>Prof. Puntuador</th>
                                <th>Prof. Assistencia</th>
                                <th>Localitzacio Text</th>
                                <th>Localitzacio Coord</th>
                                <th>Accions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activitats as $activitat) : ?>
                                <tr>
                                    <td><?= $activitat["nom"] ?></td>
                                    <td><?= $activitat["descripcio"] ?></td>
                                    <td><?= $activitat["professor_puntuador"] ?></td>
                                    <td><?= $activitat["professor_assistencia"] ?></td>
                                    <td><?= $activitat["localitzacio"] ?></td>
                                    <td><?= $activitat["latitud"] . ", " . $activitat["longitud"] ?></td>
                                    <td>
                                        <a href="modificarActivitat.php?id=<?= $activitat['id'] ?>" class="btn btn-primary">Modificar</a>
                                        <a href="eliminarActivitat.php?id=<?= $activitat['id'] ?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>