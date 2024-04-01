<?php
require_once "../Middleware/LoggedIn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["primerGrup"]) || !isset($_POST["segonGrup"])) {
        $_SESSION["fotoGrupalError"] = "S'ha produit un error, torna a intentar-ho.";
        header("Location: ./professor.php");
        die();
    }
    if (!isset($_FILES["primerGrupFoto"]) || !isset($_FILES["segonGrupFoto"])) {
        $_SESSION["fotoGrupalError"] = "Falten fotos. Torna a intentar-ho.";
        header("Location: ./professor.php");
        die();
    }

    $primerGrup = $_POST["primerGrup"];
    $segonGrup = $_POST["segonGrup"];
    $primerGrupFoto = $_FILES["primerGrupFoto"];
    $segonGrupFoto = $_FILES["segonGrupFoto"];

    // renombrem la foto amb el nom del grup i la guardem en la carpeta de fotos (temporal)
    $primerGrupFotoNom = "../public/temp/" . $primerGrup . "." . pathinfo($primerGrupFoto["name"], PATHINFO_EXTENSION);
    $segonGrupFotoNom = "../public/temp/" . $segonGrup . "." . pathinfo($segonGrupFoto["name"], PATHINFO_EXTENSION);

    if (
        !move_uploaded_file($primerGrupFoto["tmp_name"], $primerGrupFotoNom) ||
        !move_uploaded_file($segonGrupFoto["tmp_name"], $segonGrupFotoNom)
    ) {
        $_SESSION["fotoGrupalError"] = "S'ha produït un error al pujar la foto. Torna a intentar-ho.";
        header("Location: ./professor.php");
        die();
    }

    echo "<script>alert('" . $_SESSION["fotoGrupalError"] . "')</script>";

    header("Location: ./professor.php");
}
