<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir alumnes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/estils.css">
</head>

<body>
    <?php include 'AdminHeader.vista.php'; ?>
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mt-5">Afegir alumnes</h2>
                    <form method="POST" action="../Controlador/afegir.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="arxiuAlumnes">Selecciona un arxiu CSV amb els alumnes</label>
                            <input class="form-control" type="file" name="arxiuAlumnes" id="arxiuAlumnes" accept=".csv">
                        </div>
                        <button class="buttons" type="submit">Afegir alumnes</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="mt-5">Afegir professors</h2>
                    <form method="POST" action="../Controlador/afegir.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label
                                " for="arxiuProfessors">Selecciona un arxiu CSV amb els professors</label>
                            <input class="form-control" type="file" name="arxiuProfessors" id="arxiuProfessors"
                                accept=".csv">
                        </div>
                        <button class="buttons" type="submit">Afegir professors</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>