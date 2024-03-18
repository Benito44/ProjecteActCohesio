<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($modificantActivitat) ? "Editar" : "Afegir" ?> Activitat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estils/estils.css">
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
                    <label for="nomActivitat" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nomActivitat" name="nomActivitat" value="<?= isset($activitat) ? $activitat["nom"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcioActivitat" class="form-label">Descripcio</label>
                    <textarea class="form-control" id="descripcioActivitat" name="descripcioActivitat" rows="3"><?= isset($activitat) ? $activitat["descripcio"] : "" ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="profPuntuador" class="form-label">Prof. Puntuador</label>
                    <select class="form-select" id="profPuntuador" name="profPuntuador">
                        <option value="">Seleccionar professor puntuador...</option>
                        <?= $llistaProfessorsPuntuador; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="profAssistencia" class="form-label">Prof. Assistencia</label>
                    <select class="form-select" id="profAssistencia" name="profAssistencia">
                        <option value="">Seleccionar professor de asistencia...</option>
                        <?= $llistaProfessorsAsistencia; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="locText" class="form-label">Localitzacio Text</label>
                    <input type="text" class="form-control" id="locText" name="locText" value="<?= isset($activitat) ? $activitat["localitzacio"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label for="locCoord" class="form-label">Localitzacio Coord (Latitud, Longitud)</label>
                    <input type="text" class="form-control" id="locCoord" name="locCoord" placeholder="Ej. 40.7128, -74.0060" value="<?= isset($modificantActivitat) ? $activitat["latitud"] . ", " . $activitat["longitud"] : (isset($activitat) ? $activitat["coordenades"] : "") ?>">
                    <div class="form-text">Introdueix la latitud i longitud separades per una coma.</div>
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