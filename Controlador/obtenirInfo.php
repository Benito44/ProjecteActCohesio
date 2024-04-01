<?php

require_once '../Model/consultasbd.php';
$grupsTotals = nombreDeGrups();
$grupsTotals = $grupsTotals['total_grups'];
$rondasTotals = $grupsTotals / 2;

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

$response = [
    'rondasTotals' => $rondasTotals,
    'rondasRestants' => $rondasRestants,
    'rondaActual' => $rondaActual,
    'grupsTotals' => $grupsTotals,
];
echo json_encode($response);
