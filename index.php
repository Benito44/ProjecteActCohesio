<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('Location: Controlador/loginn.php');
}
else {
    header('Location: Controlador/llista.php');
}

?>