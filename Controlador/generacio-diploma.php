<?php
require_once "../Middleware/LoggedIn.php";
require_once "../Model/consultasbd.php";

if ($_SESSION['rol'] != 'alumne') {
    header('Location: ../index.php');
}

$alumneGrupId = buscarGrupId($_SESSION['email']);
$nomGrup = grupPerId($alumneGrupId);

// Comprovem si existeix una foto amb el nom del grup en la carpeta temporal. (sigui png, jpg o jpeg)
$nomFitxers = glob("../public/temp/" . $nomGrup . ".*");
if (count($nomFitxers) > 0) {
    $nomFitxer = $nomFitxers[0];
} else {
    $nomFitxer = "";
    $error = "No s'ha trobat cap imatge per al teu grup.";
}

// AQUESTA POSICIO ES LA QUE HAURIA DE VENIR DE LA BASE DE DADES
// PEL MOMENT ESTA HARDCODEJADA
$posicio = 1;   // <-------------------

switch ($posicio) {
    case 1:
        $posicio = "1r";
        break;
    case 2:
        $posicio = "2n";
        break;
    case 3:
        $posicio = "3r";
        break;
    case 4:
        $posicio = "4t";
        break;
    default:
        $posicio = $posicio . "è";
        break;
}

// generem l'any del curs actual
// en cas de fer-se a mitjans de curs, caldria canviar-ho (despres de nadal, per exemple)
$any = date('Y') . '-' . (date('Y') + 1);

include_once "../Vista/Diploma.vista.php";
