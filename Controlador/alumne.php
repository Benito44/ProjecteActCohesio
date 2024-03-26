<?php
session_start();

if (isset ($_SESSION['email'])) {
    $mail = $_SESSION['email'];

    require_once '../Model/consultasbd.php';

    $grup_id = buscarGrupId($mail);
}

if (empty ($grup_id)) {
    session_unset();
    session_destroy();
    echo "No pertanys a cap grup." . "<br> <a href='../index.php'>Tornar a l'inici de sessió</a>";

    exit();

} else {
    $alumnes = buscarAlumnes2($grup_id);

    $activitat = buscarActivitat($grup_id);

    $activitat = informacioActivitat($activitat);

    $latitud = $activitat['latitud'];
    $longitud = $activitat['longitud'];

    $nom = $activitat['nom'];
    $localitzacio = $activitat['localitzacio'];
    $descripcio = $activitat['descripcio'];

    $professor_puntuador = buscarProfesor($activitat['professor_puntuador']);
    $professor_assistencia = buscarProfesor($activitat['professor_assistencia']);


    include '../Vista/alumne.vista.php';
}
