<?php
include_once "../Middleware/IsAdmin.php";
include_once "../Model/consultasbd.php";

$activitats = dadesActivitats();

include_once "../Vista/LlistaActivitats.vista.php";
