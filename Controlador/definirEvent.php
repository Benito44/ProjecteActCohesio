<?php
require_once '../Model/consultasbd.php';

function generarEnfrontaments()
{
    $enfrontaments = dadesEnfrontaments();
    if (count($enfrontaments) > 0) {
        return "";
    };

    $grups = dadesGrups();
    $activitats = dadesActivitats();

    if (count($grups) == 0) {
        return "No hi ha grups per generar enfrontaments";
    }

    if (count($activitats) == 0) {
        return "No hi ha activitats per generar enfrontaments";
    }

    if (count($grups) % 2 != 0) {
        return "El nombre de grups ha de ser parell.";
    }

    if (count($activitats) <= count($grups) / 2) {
        return "No hi ha suficients activitats per generar enfrontaments.";
    }
    // assigna una activitat a cada grup
    // a partir de la meitat de grups, 
    // assigna la mateixa activitat a dos grups
    // exemple:
    // grups = [1, 2, 3, 4], activitats = [1, 2, 1, 2]
    // d'aquesta manera una activitat consta de dos grups
    for ($i = 0; $i < count($grups); $i++) {
        $grup = $grups[$i];
        $activitatPointer = $i % (count($grups) / 2);
        $activitat = $activitats[$activitatPointer]["id"];

        inserirEnfrontament($grup, $activitat);
    }
    return "";
}

if (isset($_POST['estat'])) {
    $estat = $_POST['estat'];

    switch ($estat) {
        case 'Pausat':
            guardarConfig("estat", "Pausat");
            break;

        case 'Iniciat':
            $resultat = generarEnfrontaments();
            if ($resultat != "") {
                echo json_encode(array('error' => $resultat));
                die();
            }

            guardarConfig("estat", "Iniciat");
            break;

        default:
            echo json_encode(array('error' => "Estat no reconegut"));
            die();
            break;
    }
}


$config = buscarConfig();
echo json_encode(array('config' => $config));
