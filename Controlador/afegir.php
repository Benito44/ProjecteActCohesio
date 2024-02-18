<?php
session_start();

if ($_SESSION['rol'] == "admin") {
    require_once '../Model/consultasbd.php';

    $nom_arxiu = '';
    $tipus_arxiu = '';
    $mida_arxiu = 0;

    if (isset($_FILES['arxiuAlumnes'])) {
        $nom_arxiu = $_FILES['arxiuAlumnes']['name'];
        $tipus_arxiu = $_FILES['arxiuAlumnes']['type'];
        $mida_arxiu = $_FILES['arxiuAlumnes']['size'];
    }

    if ($tipus_arxiu == 'text/csv' || $tipus_arxiu == 'application/vnd.ms-excel') {
        if ($mida_arxiu < 2000000) {
            move_uploaded_file($_FILES['arxiuAlumnes']['tmp_name'], '../' . $nom_arxiu);
            $arxiu = fopen('../' . $nom_arxiu, 'r');
            while (($linia = fgetcsv($arxiu, 1000, ',')) !== FALSE) {
                afegirAlumne($linia[0], $linia[1], $linia[2], $linia[3]);
            }
            fclose($arxiu);
            echo "<script>alert('Alumnes afegits correctament')</script>";

        } else {
            echo "<script>alert('L'arxiu és massa gran o no és un arxiu CSV')</script>";
        }
    }
    include '../Vista/Afegir.vista.php';

} else {
    echo "<script>alert('No pots accedir a aquesta pàgina si no ets administrador, espera a que l'administrador inicii el joc.')</script>";
    header('refresh:0.01;url=../Vista/espera.php');

}

?>
