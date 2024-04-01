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
                    <img src="../public/img/logo-institut-sapalomera.png" width="140" height="80"
                        class="d-inline-block align-top" alt="">
                </a>
            </nav>

        </header>
    </div>
    <div class="custom-container container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <h3 class="mt-4">Llista del grup
                    <?php echo $primerGrup ?>
                </h3>
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
                            <?php foreach ($alumnesPrimerGrup as $componente): ?>
                                <tr>
                                    <td>
                                        <?php echo $componente['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $componente['cognoms']; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="alumno_id[]" value="<?php echo $componente['id']; ?>">
                                        <input type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]"
                                            value="Si">
                                        Si
                                        <input class="ml-4" type="checkbox"
                                            name="asistencia[<?php echo $componente['id']; ?>]" value="No">
                                        No
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="mt-4">Llista del grup
                    <?php echo $segonGrup ?>
                </h3>
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
                            <?php foreach ($alumnesSegonGrup as $componente): ?>
                                <tr>
                                    <td>
                                        <?php echo $componente['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $componente['cognoms']; ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="alumno_id[]" value="<?php echo $componente['id']; ?>">
                                        <input type="checkbox" name="asistencia[<?php echo $componente['id']; ?>]"
                                            value="Si">
                                        Si
                                        <input class="ml-4" type="checkbox"
                                            name="asistencia[<?php echo $componente['id']; ?>]" value="No">
                                        No
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
        <div class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mt-4">Punts actuals del grup
                        <?php echo $primerGrup ?>
                    </h3>
                    <div class="mb-3">
                        <div class="input-group">
                            <button type="button" name="grup1decr" class="btn btn-secondary">-</button>
                            <input type="text" class="form-control" id="punts1" name="punts1" value="0">
                            <button type="button" name="grup1incr" class="btn btn-secondary">+</button>
                        </div>
                        <input type="hidden" name="grup" value="<?= $primerGrup ?>">
                    </div>

                </div>
                <div class="col-lg-6">
                    <h3 class="mt-4">Punts actuals del grup</h3>
                    <?php echo $segonGrup ?>
                    <div class="mb-3">
                        <div class="input-group">
                            <button type="button" name="grup2decr" id="grup2decr" class="btn btn-secondary">-</button>
                            <input type="text" class="form-control" id="punts2" name="punts2" value="0">
                            <button type="button" name="grup2incr" id="grup2incr" class="btn btn-secondary">+</button>
                        </div>
                        <input type="hidden" name="grup" value="<?= $primerGrup ?>">
                    </div>


                </div>
            </div>
            <div class="<?= (isset($rondaFinal) && $rondaFinal) ? "" : "d-none"; ?>">
                <h1>Foto grupal</h1>
                <?php if (isset($_SESSION["fotoGrupalError"])) { ?>
                    <div class="alert alert-danger " role="alert">
                        <?= $_SESSION["fotoGrupalError"] ?>
                    </div>
                    <?php
                }
                ;
                unset($_SESSION["fotoGrupalError"]);
                ?>
                <form method="POST" action="emmagatzemament-foto-grupal.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto del grup
                            <?= $primerGrup ?>
                        </label>
                        <input class="form-control" type="file" id="formFile" name="primerGrupFoto">
                        <input type="hidden" name="primerGrup" value="<?= $primerGrup ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto del grup
                            <?= $segonGrup ?>
                        </label>
                        <input class="form-control" type="file" id="formFile" name="segonGrupFoto">
                        <input type="hidden" name="segonGrup" value="<?= $segonGrup ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
</body>

</html>