<?php

function LlistaUsuaris()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT nom, cognoms, grup_id FROM alumne";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'nom' => $row['nom'],
            'cognoms' => $row['cognoms'],
            'grup_id' => $row['grup_id']
        );
        $alumnes[] = $alumne;
    }

    return $alumnes;
}
    
function nomDelsGrups()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT nom, id FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $nomGrups = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nomGrup = array(
            'nom' => $row['nom'],
            'id' => $row['id']
        );
        $nomGrups[] = $nomGrup;
    }

    return $nomGrups;
}


function nombreDeGrups()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total_grups, GROUP_CONCAT(nom SEPARATOR ', ') AS noms_grups, id FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>