<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir alumnes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estils/estils.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Controlador/events.js"></script>

</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/sessio.php">Llista de grups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/llistaAlumn.php">Llista d'alumness</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/afegir.php">Afegir alumnes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Controlador/modificarGrupAlumne.php">Modificar grups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/Iniciar.php">Iniciar Joc</a>
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
    <br><br><br><br><br><br>
    <div class="container">
        <div class="container">
            <div id="cronometre" class="text-center">Temps restant: 10:00</div><br>

            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <button id="inicii" name="inicii" class="btn btn-primary btn-lg custom-btn">Iniciar jornada de
                        cohesió</button>
                </div>
                <div class="col-12 text-center">
                    <button id="pausa" name="pausa" class="btn btn-primary btn-lg custom-btn">Pausar jornada de
                        cohesió</button>
                </div>
                <div class="col-12 text-center">
                    <button id="next" name="next" class="btn btn-primary btn-lg custom-btn">Seguënt ronda</button>
                </div>
                <div class="col-12 text-center">
                    <button id="end" name="end" class="btn btn-primary btn-lg custom-btn">Finalitzar jornada de
                        cohesió</button>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>