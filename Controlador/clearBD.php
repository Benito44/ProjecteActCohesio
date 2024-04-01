<?php

require_once '../Model/consultasbd.php';

clearEnfrotaments();
clearAlumnesAssisteixActivitat();
clearGrupPuntuacio();
guardarConfig("estat", "Pausat");

$response = [
    'status' => 'ok'
];

echo json_encode($response);