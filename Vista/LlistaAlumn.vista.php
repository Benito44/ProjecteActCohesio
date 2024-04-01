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
        <button id="btnGenerar" type="button" class="btn btn-secondary">
            Generar grups
        </button>
        <button type="button" class="btn btn-secondary" onclick="confirmReiniciar()">
            Reiniciar grups
        </button>

        <script>
            function confirmReiniciar() {
                if (confirm("Estàs segur que vols reiniciar els grups?")) {
                    window.location.href = 'reiniciar.php';
                }
            }
        </script>

        <p style="color: red;">S'hi recomana que abans de generar els grups, s'hagin afegit tots els alumnes primer correctament*</p>
    </div>
    <br>

    <br>
    <br>
    <?php if (empty($alumnes)) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>No hi ha alumnes</h1>
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
                                <th>Cognoms</th>
                                <th>Email</th>
                                <th>Clase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumnes as $alumne) : ?>
                                <tr>
                                    <td><?= $alumne['nom'] ?></td>
                                    <td><?= $alumne['cognoms'] ?></td>
                                    <td><?= $alumne['email'] ?></td>
                                    <td><?= $alumne['Clase'] ?></td>
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