<?php

session_start();

require_once '../Controlador/autentificacion.php';

if (!isset($_SESSION['email'])) {
    $email2 = $email;
    $name2 = $name;
    $_SESSION['email'] = $email2;
    $_SESSION['name'] = $name2;
} else {
    $email2 = $_SESSION['email'];
    $name2 = $_SESSION['name'];
}

require '../Model/consultasbd.php';

if (profeExists($email2)) {
    if (profeIsAdmin($email) == 1) {

        $_SESSION['rol'] = "admin";
        header('Location: sessio.php');
    } else {
        $_SESSION['rol'] = "profe";
        header('Location: ../Vista/espera.php');
    }
} else {
    $_SESSION['rol'] = "alumne";
    header('Location: ../Vista/espera.php');
}



?>