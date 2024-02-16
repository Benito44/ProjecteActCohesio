<?php

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


function dadesAlumnes()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT nom, cognoms, email, grup_id, Clase FROM alumne ORDER BY Clase";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'nom' => $row['nom'],
            'cognoms' => $row['cognoms'],
            'email' => $row['email'],
            'grup_id' => $row['grup_id'],
            'Clase' => $row['Clase']
        );
        $alumnes[] = $alumne;
    }

    return $alumnes;
}


function afegirAlumne($nom, $cognoms, $email, $clase)
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    if (!jaExisteix($email)) {
        $query = "INSERT INTO alumne (nom, cognoms, email, Clase) VALUES (:nom, :cognoms, :email, :clase)";
        $stmt = $connexio->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':cognoms', $cognoms);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':clase', $clase);
        $stmt->execute();
    }
}

function jaExisteix($email)
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE email = :email";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] > 0;
}

function alumnesSMX1_1()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_2()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_3()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-3'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_4()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-4'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX2_1()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX2-1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX2_2()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX2-2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes1ASIX()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = '1ASIX'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes2ASIX()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = '2ASIX'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes1DAW()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = '1DAW'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes2DAW()
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = '2DAW'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function generarGrup($nomgrup)
{
    require_once '../database/pdo.php';
    $connexio = connexion();

    $query = "INSERT INTO grup (nom) VALUES (:nom)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':nom', $nomgrup);
    $stmt->execute();
}

function agafarAlumnes($grup){
    
}

?>