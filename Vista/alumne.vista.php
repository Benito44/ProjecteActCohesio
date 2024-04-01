<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../public/css/alumnes.css">
    <script src="../public/js/redireccio.js"></script>
    <script src="../public/js/mapa.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCprdU5TR5GHDdY4EuOZb_dKHm2nXmX-EE&callback=crearMapa"></script>

    <title>Alumnes</title>
</head>

<body>

    <div class="custom-container container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../Controlador/alumne.php">
                    <img src="../public/img/logo-institut-sapalomera.png" width="140" height="80" class="d-inline-block align-top" alt="">
                </a>
            </nav>

        </header>
    </div>
    <div class="custom-container container">
        <h1 class="mt-5">Alumnes</h1>

        <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>Clase</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnes as $alumne) : ?>
                    <tr>
                        <td>
                            <?php echo $alumne['nom']; ?>
                        </td>
                        <td>
                            <?php echo $alumne['cognoms']; ?>
                        </td>
                        <td>
                            <?php echo $alumne['Clase']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-lg-4">
                <h2>Activitat que us toca</h2>
                <br>
                <p>Nom de l'activitat:
                    <?php echo $nom; ?>
                </p>
                <p>Localització:
                    <?php echo $localitzacio; ?>
                </p>
                <p>Descripció:
                    <?php echo $descripcio; ?>
                </p>
                <p>Professors:
                    <?php echo $professor_puntuador; ?>,
                    <?php echo $professor_assistencia; ?>
                </p>
            </div>
            <div class="col-lg-8">
                <?php echo '<div class="mapa" id="mapa" data-latitud="' . $latitud . '" data-longitud="' . $longitud . '"></div>'; ?>
            </div>
        </div>
        <br>
        <div class="row mt-5">
            <div class="col-lg-4">
                <h2>Puntuacio i ranking</h2>
                <p style="font-size: 18px; color: #333;">El vostre Grup tè una puntuació de:
                    <?php echo $puntuacio; ?> pts
                </p>

            </div>

            <div class="col-lg-8">
                <table class="table table-bordered table-striped mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>Grup</th>
                            <th>Puntuació</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($puntuacions as $puntuacio) : ?>
                            <tr>
                                <td>
                                    <?php echo $puntuacio['grup']; ?>
                                </td>
                                <td>
                                    <?php echo $puntuacio['puntuacio']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-12 my-5 d-none" id="contenidorGenerarDiploma">
                <a href="../Controlador/generacio-diploma.php" class="btn btn-primary w-50 mx-auto py-2">Generar diploma</a>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $.ajax({
                    url: 'obtenirInfo.php',
                    type: 'GET',
                    success: function(response) {
                        let parsed = JSON.parse(response);
                        if (parsed?.ultimaRonda) {
                            $('#contenidorGenerarDiploma').addClass('d-flex').removeClass('d-none');
                        }
                    }
                });
            });
        </script>
</body>

</html>