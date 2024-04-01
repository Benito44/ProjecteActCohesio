<?php

require_once '../Model/consultasbd.php';
$grupsTotals = nombreDeGrups();
$grupsTotals = $grupsTotals['total_grups'];
$rondasTotals = $grupsTotals / 2;
$ultimaRonda = false;

$rondaActual = getRondaActual();
if ($rondaActual === null) {
    $rondaActual = "Pausat";
} else {
    $rondaActual = (int) substr($rondaActual, 1);
}

if ($rondaActual === "Pausat") {
    $rondasRestants = $rondasTotals;
} else {
    $rondasRestants = $rondasTotals - $rondaActual;
}

if($rondaActual === $rondasTotals){
    $ultimaRonda = true;
}

$response = [
    'rondasTotals' => $rondasTotals,
    'rondasRestants' => $rondasRestants,
    'rondaActual' => $rondaActual,
    'grupsTotals' => $grupsTotals,
    'ultimaRonda' => $ultimaRonda
];
echo json_encode($response);
