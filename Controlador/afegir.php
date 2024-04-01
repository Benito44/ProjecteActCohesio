<?php
session_start();

if ($_SESSION['rol'] == "admin") {
    require_once '../Model/consultasbd.php';

    $nom_arxiu_alumnes = '';
    $tipus_arxiu_alumnes = '';
    $mida_arxiu_alumnes = 0;

    $nom_arxiu_professors = '';
    $tipus_arxiu_professors = '';
    $mida_arxiu_professors = 0;

    if (isset($_FILES['arxiuAlumnes'])) {
        $nom_arxiu_alumnes = $_FILES['arxiuAlumnes']['name'];
        $tipus_arxiu_alumnes = $_FILES['arxiuAlumnes']['type'];
        $mida_arxiu_alumnes = $_FILES['arxiuAlumnes']['size'];
    }

    if (isset($_FILES['arxiuProfessors'])) {
        $nom_arxiu_professors = $_FILES['arxiuProfessors']['name'];
        $tipus_arxiu_professors = $_FILES['arxiuProfessors']['type'];
        $mida_arxiu_professors = $_FILES['arxiuProfessors']['size'];
    }

    if ($tipus_arxiu_alumnes == 'text/csv' || $tipus_arxiu_alumnes == 'application/vnd.ms-excel') {
        if ($mida_arxiu_alumnes < 2000000) {
            move_uploaded_file($_FILES['arxiuAlumnes']['tmp_name'], '../' . $nom_arxiu_alumnes);
            $arxiu_alumnes = fopen('../' . $nom_arxiu_alumnes, 'r');
            while (($linia_alumnes = fgetcsv($arxiu_alumnes, 1000, ',')) !== FALSE) {
                afegirAlumne($linia_alumnes[0], $linia_alumnes[1], $linia_alumnes[2], $linia_alumnes[3]);
            }
            fclose($arxiu_alumnes);
            echo "<script>alert('Alumnes afegits correctament')</script>";

        } else {
            echo "<script>alert('L'arxiu d'alumnes és massa gran o no és un arxiu CSV')</script>";
        }
    }

    if ($tipus_arxiu_professors == 'text/csv' || $tipus_arxiu_professors == 'application/vnd.ms-excel') {
        if ($mida_arxiu_professors < 2000000) {
            move_uploaded_file($_FILES['arxiuProfessors']['tmp_name'], '../' . $nom_arxiu_professors);
            $arxiu_professors = fopen('../' . $nom_arxiu_professors, 'r');
            while (($linia_professors = fgetcsv($arxiu_professors, 1000, ',')) !== FALSE) {
                afegirProfessor($linia_professors[0], $linia_professors[1], $linia_professors[2], $linia_professors[3]);
            }
            fclose($arxiu_professors);
            echo "<script>alert('Professors afegits correctament')</script>";

        } else {
            echo "<script>alert('L'arxiu de professors és massa gran o no és un arxiu CSV')</script>";
        }
    }

    include '../Vista/Afegir.vista.php';

} else {
    echo "<script>alert('No pots accedir a aquesta pàgina si no ets administrador, espera a que l'administrador inicii el joc.')</script>";
    header('refresh:0.01;url=../Controlador/respera.php');
}
?>
