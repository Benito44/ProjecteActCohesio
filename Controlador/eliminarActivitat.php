<?php
require_once "../Middleware/IsAdmin.php";
require_once "../Model/consultasbd.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST["activitat_id"]) || $_POST["activitat_id"] == "") {
        $_SESSION["error"] = "Falta l'identificador de l'activitat";
        header("Location: llistaActivitats.php");
        die();
    }

    eliminarActivitat($_POST["activitat_id"]);
    header("Location: llistaActivitats.php");
    die();
} else {
    if (!isset($_GET['id'])) {
        header("Location: llistaActivitats.php");
        die();
    }

    $activitat = dadesActivitat($_GET['id']);
    $professorPuntuador = dadesProfessor($activitat['professor_puntuador']);
    $professorAssistencia = dadesProfessor($activitat['professor_assistencia']);

    include_once "../Vista/eliminarActivitat.vista.php";
}
