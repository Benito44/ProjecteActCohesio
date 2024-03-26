<?php
require_once '../Model/consultasbd.php';
session_start();

$ronda = $_COOKIE['ronda'];

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

// tenin en compte l'estat inicial:
// grups = [1, 2, 3, 4, 5, 6]
// activitats = [1, 2, 3, 1, 2, 3]
// hem de fer que els grups s'enfrentin entre ells (primera meitat vs segona meitat) 
// i no es repeteixin ni les activitats ni els grups
// per exemple, el recorregut del grup 1 seria el seguent
// ronda 1: grup1 vs grup4 (activitat 1)
// ronda 2: grup1 vs grup5 (activitat 3)
// ronda 3: grup1 vs grup6 (activitat 2)
function obtenirEnfrontamentPerRonda($ronda)
{
    $grups = dadesGrups();
    $activitats = dadesActivitats();
    $maxRonda = count($grups) / 2;
    $ronda = max(1, min($ronda, count($grups) / 2));

    $enfrontaments = array();
    for ($g = 0; $g < $maxRonda; $g++) {
        $oponent = $maxRonda + (($g + $ronda) % $maxRonda);
        $activitat = ($g - $ronda) % $maxRonda;
        if ($activitat < 0) {
            $activitat += abs($maxRonda);
        }

        $enfrontament = array(
            "grup" => $grups[$g],
            "oponent" => $grups[$oponent],
            "activitat" => $activitats[$activitat]["id"]
        );

        array_push($enfrontaments, $enfrontament);
    }

    return $enfrontaments;
}

function actualitzarEnfrontamentsSeguentRonda()
{   // comprovem que l'estat es R1, R2, R3, R4
    if (strpos(buscarConfig(), "R") === false) {
        return;
    }

    // obtenir la ronda d'un string com "R1"
    $ronda = intval(substr(buscarConfig(), 1));

    $enfrontaments = obtenirEnfrontamentPerRonda($ronda);
    foreach ($enfrontaments as $enfrontament) {
        actualitzarEnfrontament($enfrontament["grup"], $enfrontament["activitat"]);
        actualitzarEnfrontament($enfrontament["oponent"], $enfrontament["activitat"]);
    }
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

            $ronda = 1;
            setcookie('ronda', $ronda, time() + 3600);
            guardarConfig("estat", "R" . $ronda);
            break;
        case 'Seguent':
            $ronda = $_COOKIE['ronda'] + 1;
            setcookie('ronda', $ronda, time() + 3600);
            actualitzarEnfrontamentsSeguentRonda();
            $enfrontaments = dadesEnfrontaments();
            echo json_encode(array('enfrontaments' => $enfrontaments));

            guardarConfig("estat", "R" . $ronda);
            break;
        default:
            echo json_encode(array('error' => "Estat no reconegut"));
            die();
            break;
    }
}


$config = buscarConfig();
echo json_encode(array('config' => $config));
