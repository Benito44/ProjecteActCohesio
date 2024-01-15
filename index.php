<?php 

session_start();

if (isset($_SESSION['administrador'])) {
    header("Location: llista.php");
}
else if (isset($_SESSION['professor'])) {
    header("Location: espera.php");
}
else if (isset($_SESSION['alumne'])) {
    header("Location: espera.php");
}
else {
    header("Location: login.php");
}

?>