<?php

require_once 'definirEvent.php';

$resultats = array();
for ($i = 1; $i < 5; $i++) { // test de ronda 1 a 4
    echo "Ronda $i\n";
    $enfrontaments = obtenirEnfrontamentPerRonda($i); // obtenir enfrontament
    array_push($resultats, $enfrontaments);
}

echo json_encode($resultats);
