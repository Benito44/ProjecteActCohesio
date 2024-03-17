<?php
require_once "../Middleware/IsAdmin.php";
require_once "../Model/consultasbd.php";

function generarLlistaProfesorsSelecionats($professors, $selectedProfessorId = -1)
{
    $options = "";
    foreach ($professors as $professor) {
        $selected = ($professor["id"] == $selectedProfessorId) ? "selected" : "";
        $options .= "<option value='{$professor["id"]}' $selected>{$professor["nom"]} {$professor["cognoms"]}</option>";
    }
    return $options;
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (!isset($_POST["id"]) || $_POST["id"] == "") {
        header("Location: llistaActivitats.php");
        die();
    }

    // comprovem si algun camp es buit
    if (!isset($_POST["nomActivitat"]) || $_POST["nomActivitat"] == "") {
        $error = "Falta el nom de l'activitat";
    }
    if (!isset($_POST["descripcioActivitat"]) || $_POST["descripcioActivitat"] == "") {
        $error = "Falta la descripció de l'activitat";
    }
    if (!isset($_POST["profPuntuador"]) || $_POST["profPuntuador"] == "") {
        $error = "Falta el professor puntuador";
    }
    if (!isset($_POST["profAssistencia"]) || $_POST["profAssistencia"] == "") {
        $error = "Falta el professor d'assistència";
    }
    if (!isset($_POST["locText"]) || $_POST["locText"] == "") {
        $error = "Falta la localització de l'activitat";
    }
    if (!isset($_POST["locCoord"]) || $_POST["locCoord"] == "") {
        $error = "Falten les coordenades de l'activitat";
    }
    if (!isset($_POST["id"]) || $_POST["id"] == "") {
        $error = "Falta l'identificador de l'activitat. Contacta amb el programador.";
    }

    if (isset($error)) {
        $_SESSION["error"] = $error;
        header("Location: modificarActivitat.php" . "?id=" . $_POST["id"]);
        die();
    }

    // Si tots els camps son omplerts, comprovarem la validesa de les coordenades
    $coordenades = explode(",", $_POST["locCoord"]);
    if (count($coordenades) != 2 || !is_numeric($coordenades[0]) || !is_numeric($coordenades[1])) {
        // en cas de tenir coordenades no valides, guardem l'error en una variable de sessio i tornem a la vista
        $_SESSION["error"] = "Les coordenades introduides no son vàlides";
        header("Location: modificarActivitat.php" . "?id=" . $_POST["id"]);
        die();
    }

    $activitat = [
        'nom' => $_POST["nomActivitat"],
        'descripcio' => $_POST["descripcioActivitat"],
        'professor_puntuador' => $_POST["profPuntuador"],
        'professor_assistencia' => $_POST["profAssistencia"],
        'localitzacio' => $_POST["locText"],
        'latitud' => $coordenades[0],
        'longitud' => $coordenades[1],
        'id' => $_POST["id"]
    ];

    modificarActivitat($activitat);
    header("Location: llistaActivitats.php");
    die();
} else {
    if (!isset($_GET["id"]) || $_GET["id"] == "") {
        header("Location: llistaActivitats.php");
        die();
    }

    $activitat = dadesActivitat($_GET["id"]);
    $activitat["coordenades"] = $activitat["latitud"] . ", " . $activitat["longitud"];

    $modificantActivitat = true;
    $professors = dadesProfessors();

    $llistaProfessorsPuntuador = generarLlistaProfesorsSelecionats($professors, $activitat["professor_puntuador"]);
    $llistaProfessorsAsistencia = generarLlistaProfesorsSelecionats($professors, $activitat["professor_assistencia"]);

    include_once "../Vista/AfegirActivitat.vista.php";
}
