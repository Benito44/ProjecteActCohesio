<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir alumnes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/estils.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/events.js"></script>

</head>

<body>
    <?php include 'AdminHeader.vista.php'; ?>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-lg-6">

                    <div id="cronometre" class="text-center">Temps restant: 10:00</div><br>

                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <button id="inicii" name="inicii" class="buttons btn-primary btn-lg custom-btn">Iniciar jornada
                                de
                                cohesió</button>
                        </div>
                        <div class="col-12 text-center">
                            <button id="inici" name="inici" class="buttons btn-primary btn-lg custom-btn">Iniciar
                                cronometre</button>
                        </div>
                        <div class="col-12 text-center">
                            <button id="pausa" name="pausa" class="buttons btn-primary btn-lg custom-btn">Pausar
                                cronomotre</button>
                        </div>
                        <div class="col-12 text-center">
                            <button id="next" name="next" class="buttons btn-primary btn-lg custom-btn">Seguent
                                ronda</button>
                        </div>
                        <div class="col-12 text-center">
                            <button id="end" name="end" class="buttons btn-primary btn-lg custom-btn">Finalitzar jornada de
                                cohesió</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                           <p>Grups que s'enfronten i la activitat</p>
                            
                        </div>
                    </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>