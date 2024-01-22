<?php   

session_start();

if (isset($_SESSION['administrador'])) {
    require '../Model/consultasbd.php';

    $grups = nombreDeGrups();
    $alumnes = LlistaUsuaris();

    include '../Vista/Llista.vista.php';
} else {
    echo "<script>alert('No podeu accedir si no sou un administrador. Si us plau, inicieu sessió.');</script>";
    header('refresh:0.01; url=../Vista/login.html');
}
?>