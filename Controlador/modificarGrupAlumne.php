<?php




require_once '../Model/consultasbd.php';
if (!empty($_POST["originalGroup"])) {
    $originalGroupId = $_POST["originalGroup"];
    $originalGroupName = grupPerId($originalGroupId);
    $alumnes = alumnesPerGrup($originalGroupId);
    // $nouGrups = nomDelsGrups();
}
if (!empty($_POST['grup']) && !empty($_POST['alumne'])) {
    $alumne = $_POST['alumne'];
    $grup = $_POST['grup'];
    canviarGrup($alumne, $grup);
    return header('Location: llista.php');
}

// $grups = nombreDeGrups();
// $alumnes = dadesAlumnes();
$grups = nomDelsGrups();

include '../Vista/modificarGrupAlumne.vista.php';
