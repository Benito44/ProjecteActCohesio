<?php
// Comprovem si l'usuari ha iniciat sessió
require_once "LoggedIn.php";

// Comprovem si l'usuari es administrador
if ($_SESSION['rol'] != 'admin') {
    header('Location: ../Controlador/llista.php');
    die();
}
