<?php   

session_start();


    require_once '../Model/consultasbd.php';

    $grups = nombreDeGrups();
    $alumnes = LlistaUsuaris();
    $nomGrups = nomDelsGrups();

    include '../Vista/Llista.vista.php';

?>