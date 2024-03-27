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
    if (!isset($_POST["descripcio_material"]) || $_POST["descripcio_material"] == "") {
        $error = "Falta descripcio_material";
    }
    if (!isset($_POST["obtenir_material"]) || $_POST["obtenir_material"] == "") {
        $error = "Falta obtenir_material";
    }

    if (!isset($_POST["id"]) || $_POST["id"] == "") {
        $error = "Falta l'identificador de l'activitat. Contacta amb el programador.";
    }

    if (isset($error)) {
        $_SESSION["error"] = $error;
        header("Location: afegirMaterial.php" . "?id=" . $_POST["id"]);
        die();
    }



    $activitat = [
        'descripcio_material' => $_POST["descripcio_material"],
        'obtenir_material' => $_POST["obtenir_material"],
        'id' => $_POST["id"]
    ];

    modificarMaterial($activitat);
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

    include_once "../Vista/AfegirMaterial.vista.php";
}
