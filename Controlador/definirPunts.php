<?php


$grup = $_POST['grup'];
$punts = $_POST['punts'];
$activitat = $_POST['activitat'];

require_once '../Model/consultasbd.php';

if (puntsGrupActivitat($grup, $activitat) == 0) {
    insertarPuntsGrup($grup, $activitat, $punts);
} else {
    actualitzarPuntsGrup($grup, $activitat, $punts);
}

