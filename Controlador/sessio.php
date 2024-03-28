<?php 

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['rol'] != "admin") {
    echo "<script type='text/javascript'>alert('No pots accedir a aquesta pàgina si no ets administrador.');</script>";
    header('refresh:0.01;url=../Vista/Controlador/respera.php');
    
} else {

    require_once '../Model/consultasbd.php';

    $grups = nombreDeGrups();
    $alumnes = dadesAlumnes();
    $nomGrups = nomDelsGrups();

    include '../Vista/Llista.vista.php';

}