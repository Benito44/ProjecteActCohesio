<?php

if (!isset($_SESSION)) {
    session_start();
}


$role = $_SESSION['rol'];

include '../Vista/espera.php';