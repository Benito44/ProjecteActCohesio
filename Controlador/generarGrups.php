<?php

session_start();

require_once '../Model/consultasbd.php';

$alumnes_SMX1_1 = 0;
$alumnes_SMX1_2 = 0;
$alumnes_SMX1_3 = 0;
$alumnes_SMX1_4 = 0;
$alumnes_SMX2_1 = 0;
$alumnes_SMX2_2 = 0;
$alumnes_1ASIX = 0;
$alumnes_2ASIX = 0;
$alumnes_1DAW = 0;
$alumnes_2DAW = 0;

if (alumnesSMX1_1() < 10)
{
    generarGrup('SMX1-1A');
    $arrayAlumnes = 
}

?>