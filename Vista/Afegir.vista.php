<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir alumnes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estils/estils.css">
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="sessio.php">Llista de grups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="llistaAlumn.php">Llista d'alumness</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="afegir.php">Afegir alumnes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="modificarGrupAlumne.php">Modificar grups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/redireccioWebSocket.php">Iniciar Joc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/gruposCohesio.php">Enfrontaments</a>
                            </li>
                            <li class="nav-item">
                <a class="nav-link sessio" href="../Controlador/cerrar_session.php">Tancar Sessió</a>
              </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="../Controlador/afegir.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="arxiuAlumnes">Selecciona un arxiu CSV amb els alumnes</label>
                <input class="form-control" type="file" name="arxiuAlumnes" id="arxiuAlumnes" accept=".csv">
            </div>
            <button type="submit">Afegir alumnes</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>