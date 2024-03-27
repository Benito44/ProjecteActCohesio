<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($modificantActivitat) ? "Editar" : "Afegir" ?> Activitat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Public/css/estils.css">
</head>

<body>
    <?php include 'AdminHeader.vista.php'; ?>
    <div class="container">
        <h1><?= isset($modificantActivitat) ? "Editar" : "Afegir" ?> Activitat</h1>
        <?php
        if ($llistaProfessorsAsistencia == "" || $llistaProfessorsPuntuador == "") {
        ?>
            <div class="alert alert-danger" role="alert">
                No hi ha professors a la base de dades. Afegiu-ne un abans d'afegir una activitat.
            </div>
        <?php
        } else {
        ?>
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
            <form method="POST">
                <div class="mb-3">
                    <label for="descripcio_material" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="descripcio_material" name="descripcio_material" value="<?= isset($activitat) ? $activitat["descripcio_material"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label for="obtenir_material" class="form-label">Descripcio</label>
                    <textarea class="form-control" id="obtenir_material" name="obtenir_material" rows="3"><?= isset($activitat) ? $activitat["obtenir_material"] : "" ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary"><?= isset($activitat) ? "Modificar" : "Guardar" ?></button>
                <?php if (isset($modificantActivitat)) {
                ?>
                    <input type="text" hidden name="id" value="<?= $activitat["id"] ?>">
                    <a href="eliminarActivitat.php?id=<?= $activitat['id'] ?>" class="btn btn-danger">Eliminar</a>
                <?php
                } ?>
            </form>
        <?php
        }; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>