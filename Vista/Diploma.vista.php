<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Diploma del grup <?= $nomGrup ?></title>
    <style>
        .dades {
            width: 60%;
            margin-inline: auto;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .titol-inicial {
            margin-top: 3.5rem;
        }

        .titol-secundari {
            margin-top: 1rem;
        }

        .titol {
            font-size: 3rem;
        }

        .subtitol {
            font-size: 1.5rem;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <img class="d-none d-print-block w-100" src="../public/img/fons-diploma.png" alt="" srcset="">
    <div class="d-none d-print-flex flex-column align-items-center dades">
        <!-- Posicio -->
        <h1 class="titol titol-inicial"><?= $posicio ?> CLASSIFICAT</h1>
        <!-- Imatge del diploma -->
        <img class="d-print-block w-100" src="<?= $nomFitxer ?>" alt="" srcset="">
        <!-- Nom del grup i any del curs -->
        <h1 class="titol titol-secundari">GRUP: <?= $nomGrup ?></h1>
        <h2 class="subtitol mt-2">activitat de cohesió de cicles d'informàtica <?= $any ?> </h2>
    </div>

    <div class="d-print-none">
        <h1>Generacio de diploma</h1>
        <?php if (isset($error)) { ?>
            <p><?= $error ?></p>
        <?php } else { ?>
            <button onclick="window.print()">Imprimir</button>
        <?php }; ?>
    </div>
</body>

</html>