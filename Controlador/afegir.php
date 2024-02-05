<?php

session_start();

require_once '../Model/consultasbd.php';

$tipus = $_FILES['arxiuAlumnes']['type'];
$nom = $_FILES['arxiuAlumnes']['name'];
$extensio = pathinfo($nom, PATHINFO_EXTENSION);

if ($tipus == 'application/vnd.ms-excel' && $extensio == 'csv') {
    $arxiu = $_FILES['arxiuAlumnes']['tmp_name'];
    $fitxer = fopen($arxiu, 'r');
    $connexio = connexion();
    while (($dades = fgetcsv($fitxer, 1000, ',')) !== FALSE) {
        $query = "INSERT INTO alumne (nom, cognoms, email, Clase) VALUES (:nom, :cognoms, :email, :Clase)";
        $stmt = $connexio->prepare($query);
        $stmt->bindParam(':nom', $dades[0]);
        $stmt->bindParam(':cognoms', $dades[1]);
        $stmt->bindParam(':email', $dades[2]);
        $stmt->bindParam(':Clase', $dades[3]);
        $stmt->execute();
    }
    fclose($fitxer);
    header('Location: llista.php');
} else {
    echo "El fitxer no és un arxiu CSV";
}



include '../Vista/Afegir.vista.php'

?>