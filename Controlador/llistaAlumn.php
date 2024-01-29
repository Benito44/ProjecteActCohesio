<?php

session_start();

require_once '../Model/consultasbd.php';

$alumnes = dadesAlumnes();

include '../Vista/LlistaAlumn.vista.php';


?>