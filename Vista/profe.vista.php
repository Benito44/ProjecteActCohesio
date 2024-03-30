<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../public/css/alumnes.css">
    <script src="../public/js/redireccio.js"></script>


    <title>Profesors</title>
</head>

<body>

    <div class="custom-container container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../Controlador/professor.php">
                    <img src="../public/img/logo-institut-sapalomera.png" width="140" height="80" class="d-inline-block align-top" alt="">
                </a>
            </nav>

        </header>
    </div>
    <div class="custom-container container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <h1 class="mt-4">Grup
                    <?php echo $primerGrup ?>
                </h1>
                <form method="POST" action="professor.php">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Cognoms</th>
                                <th>Assisteix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumnesPrimerGrup as $componente) : ?>
                                <tr>
                                    <td>
                                        <?php echo $componente['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $componente['cognoms']; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="alumno_id[]" value="<?php echo $componente['id']; ?>">
                                        <input type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]" value="Si">
                                        <label for="asistencia">Si</label>
                                        <input class="ml-4" type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]" value="No">
                                        <label for="asistencia_no">No</label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h1 class="mt-4">Grup
                    <?php echo $segonGrup ?>
                </h1>
                <form method="POST" action="professor.php">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Cognoms</th>
                                <th>Assisteix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumnesSegonGrup as $componente) : ?>
                                <tr>
                                    <td>
                                        <?php echo $componente['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $componente['cognoms']; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="alumno_id[]" value="<?php echo $componente['id']; ?>">
                                        <input type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]" value="Si">
                                        <label for="asistencia">Si</label>
                                        <input class="ml-4" type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]" value="No">
                                        <label for="asistencia_no">No</label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
        <div class="container">
            <h1 class="mt-5">Puntuacions</h1>
        </div>
        <div class="<?= (isset($rondaFinal) && $rondaFinal) ? "" : "d-none"; ?>">
            <h1>Foto grupal</h1>
            <?php if (isset($_SESSION["fotoGrupalError"])) { ?>
                <div class="alert alert-danger " role="alert">
                    <?= $_SESSION["fotoGrupalError"] ?>
                </div>
            <?php
            };
            unset($_SESSION["fotoGrupalError"]);
            ?>
            <form method="POST" action="emmagatzemament-foto-grupal.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto del grup <?= $primerGrup ?></label>
                    <input class="form-control" type="file" id="formFile" name="primerGrupFoto">
                    <input type="hidden" name="primerGrup" value="<?= $primerGrup ?>">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto del grup <?= $segonGrup ?></label>
                    <input class="form-control" type="file" id="formFile" name="segonGrupFoto">
                    <input type="hidden" name="segonGrup" value="<?= $segonGrup ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>