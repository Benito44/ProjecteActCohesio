<?php

session_start();

if ($_SESSION['rol'] != "admin") {
    echo "<script type='text/javascript'>alert('No pots accedir a aquesta pàgina si no ets administrador.');</script>";
    header('refresh:0.01;url=../Controlador/respera.php');
    
} else {
require_once '../Model/consultasbd.php';

$alumnes = dadesAlumnes();

include '../Vista/LlistaAlumn.vista.php';
}

?>