<?php

session_start();

if ($_SESSION['rol'] != "admin") {
    echo "<script type='text/javascript'>alert('No pots accedir a aquesta pàgina si no ets administrador.');</script>";
    header('refresh:0.01;url=../Vista/espera.php');
} else {
require_once '../Model/consultasbd.php';
if (!empty($_POST["originalGroup"])) {
    $originalGroupId = $_POST["originalGroup"];
    $originalGroupName = grupPerId($originalGroupId);
    $alumnes = alumnesPerGrup($originalGroupId);

}
if (!empty($_POST['grup']) && !empty($_POST['alumne'])) {
    $alumne = $_POST['alumne'];
    $grup = $_POST['grup'];
    canviarGrup($alumne, $grup);
    return header('Location: sessio.php');
}

// $grups = nombreDeGrups();
// $alumnes = dadesAlumnes();
$grups = nomDelsGrups();

include '../Vista/modificarGrupAlumne.vista.php';
}