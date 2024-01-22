<?php

function LlistaUsuaris()
{
    require '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT nom, cognom, grup_id FROM alumne";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'nom' => $row['nom'],
            'cognom' => $row['cognom'],
            'grup_id' => $row['grup_id']
        );
        $alumnes[] = $alumne;
    }

    return $alumnes;
}
    
function nombreDeGrups()
{
    require '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total_grups, GROUP_CONCAT(nom SEPARATOR ', ') AS noms_grups FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}


?>