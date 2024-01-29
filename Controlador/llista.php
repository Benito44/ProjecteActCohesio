<?php   

session_start();


    require_once '../Model/consultasbd.php';

    $grups = nombreDeGrups();
    $alumnes = dadesAlumnes();
    $nomGrups = nomDelsGrups();

    include '../Vista/Llista.vista.php';

?>