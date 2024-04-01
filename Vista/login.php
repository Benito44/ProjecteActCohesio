<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('../public/img/logo-institut-sapalomera.png');

            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter h-100">
            <div class="col-md-6 d-none d-md-flex bg-image">
                <img src="" alt="">
            </div>
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Inici de sessió</h3>
                                <p class="text-muted mb-4">Lloc web per l'administració de les Activitats de Cohesió</p>
                                <?php require('../Controlador/autentificacion.php'); ?>
                                <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-primary">Iniciar sessió amb Google</a>
                                <p>Necessitas ajuda? Contacta amb el teu tutor.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>