<?php
include_once "../Middleware/IsAdmin.php";
include_once "../Model/consultasbd.php";

function generarLlistaProfessorsSelecionats($professors, $selectedProfessorId = -1)
{
    $options = "";
    foreach ($professors as $professor) {
        $selected = ($professor["id"] == $selectedProfessorId) ? "selected" : "";
        $options .= "<option value='{$professor["id"]}' $selected>{$professor["nom"]} {$professor["cognoms"]}</option>";
    }
    return $options;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // comprovem si algun camp es buit
    if (!isset($_POST["nomActivitat"]) || $_POST["nomActivitat"] == "") {
        $error = "Falta el nom de l'activitat";
    }
    $activitat = ["nom" => $_POST["nomActivitat"]];

    if (!isset($_POST["descripcioActivitat"]) || $_POST["descripcioActivitat"] == "") {
        $error = "Falta la descripció de l'activitat";
    }
    $activitat["descripcio"] = $_POST["descripcioActivitat"];

    if (!isset($_POST['profPuntuador']) || $_POST["profPuntuador"] == "") {
        $error = "Falta el professor puntuador";
    }
    $activitat["professor_puntuador"] = $_POST["profPuntuador"];

    if (!isset($_POST['profAssistencia']) || $_POST["profAssistencia"] == "") {
        $error = "Falta el professor d'assistència";
    }
    $activitat["professor_assistencia"] = $_POST["profAssistencia"];

    if (!isset($_POST['locText']) || $_POST["locText"] == "") {
        $error = "Falta la localització de l'activitat";
    }
    $activitat["localitzacio"] = $_POST["locText"];

    if (!isset($_POST['locCoord']) || $_POST["locCoord"] == "") {
        $error = "Falten les coordenades de l'activitat";
    }
    $activitat["coordenades"] = $_POST["locCoord"];

    $_SESSION['activitat'] = $activitat;

    if (isset($error)) {
        $_SESSION['error'] = $error;
        header("Location: afegirActivitat.php");
        die();
    }

    // Si tots els camps son omplerts generarem les coordenades i guardarem l'activitat temporalment en cas d'error
    $coordenades = explode(",", $_POST['locCoord']);
    // comprovarem la validesa de les coordenades
    if (count($coordenades) != 2 || !is_numeric($coordenades[0]) || !is_numeric($coordenades[1])) {
        // en cas de tenir coordenades no valides, guardem l'error en una variable de sessio i tornem a la vista
        $_SESSION['error'] = "Les coordenades introduides no son vàlides";
        header("Location: afegirActivitat.php");
        die();
    }
    $activitat['latitud'] = $coordenades[0];
    $activitat['longitud'] = $coordenades[1];

    // finalment comprovem si el professor puntuador i el professor d'assistencia no son en altre activitat al mateix temps
    $activitatsProfessorPuntuador = activitatProfessor($activitat['professor_puntuador']);
    $activitatsProfessorAssistencia = activitatProfessor($activitat['professor_assistencia']);
    if ($activitatsProfessorPuntuador && count($activitatsProfessorPuntuador) > 0) {
        $professor = dadesProfessor($activitat["professor_puntuador"]);
        // en cas de tenir conflicte de professors, guardem l'error en una variable de sessio i tornem a la vista
        $_SESSION['error'] = "Els professor " . $professor["nom"] . " " . $professor["cognoms"] . " seleccionat ja te un altre activitat assignada.";
        header("Location: afegirActivitat.php");
        die();
    }

    if ($activitatsProfessorAssistencia && count($activitatsProfessorAssistencia) > 0) {
        $professor = dadesProfessor($activitat["professor_assistencia"]);
        // en cas de tenir conflicte de professors, guardem l'error en una variable de sessio i tornem a la vista
        $_SESSION['error'] = "Els professor " . $professor["nom"] . " " . $professor["cognoms"] . " seleccionat ja te un altre activitat assignada.";
        header("Location: afegirActivitat.php");
        die();
    }


    // $activitat = [
    //     'nom' => $_POST['nomActivitat'],
    //     'descripcio' => $_POST['descripcioActivitat'],
    //     'professor_puntuador' => $_POST['profPuntuador'],
    //     'professor_assistencia' => $_POST['profAssistencia'],
    //     'localitzacio' => $_POST['locText'],
    //     'latitud' => $coordenades[0],
    //     'longitud' => $coordenades[1]
    // ];

    unset($_SESSION['activitat']);
    afegirActivitat($activitat);
    header("Location: llistaActivitats.php");
} else {
    // en cas de no ser una peticio POST, carreguem la llista de professors i la passem a la vista
    $professors = dadesProfessors();
    if (isset($_SESSION['activitat'])) {
        $activitat = $_SESSION['activitat'];
        unset($_SESSION['activitat']);
        $llistaProfessorsAsistencia = generarLlistaProfessorsSelecionats($professors, $activitat['professor_assistencia']);
        $llistaProfessorsPuntuador = generarLlistaProfessorsSelecionats($professors, $activitat['professor_puntuador']);
    } else {
        $llistaProfessorsAsistencia = generarLlistaProfessorsSelecionats($professors);
        $llistaProfessorsPuntuador = generarLlistaProfessorsSelecionats($professors);
    }

    include_once "../Vista/AfegirActivitat.vista.php";
}
