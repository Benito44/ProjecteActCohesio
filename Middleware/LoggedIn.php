<?php
// Iniciem la sessio en cas de que no estigui iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Comprovem si l'usuari te la sessio iniciada
// en cas contrari, el redirigim a la pagina de login
// i acabem l'execucio del script
if (!isset($_SESSION['rol'])) {
    header('Location: /');
    die();
}
