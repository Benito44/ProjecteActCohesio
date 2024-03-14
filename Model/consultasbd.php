<?php
require_once '../database/pdo.php';

function nomDelsGrups()
{

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

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total_grups, GROUP_CONCAT(nom SEPARATOR ', ') AS noms_grups, id FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Función para generar parejas aleatorias
function generarParejas($grupos)
{
    // Mezclar el array de grupos
    shuffle($grupos);

    // Dividir el array en pares
    $parejas = array_chunk($grupos, 2);

    return $parejas;
}

function dadesAlumnes()
{
    $connexio = connexion();

    $query = "SELECT id, nom, cognoms, email, grup_id, Clase FROM alumne ORDER BY Clase";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'id' => $row['id'],
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

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE email = :email";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] > 0;
}

function profeExists($email)
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM professor WHERE email = :email";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] > 0;
}

function profeIsAdmin($email)
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM professor WHERE email = :email AND administrador = 1";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] > 0;
}

function alumnesSMX1_1()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_2()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_3()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-3'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX1_4()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX1-4'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX2_1()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX2-1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnesSMX2_2()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'SMX2-2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes1ASIX()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'ASIX1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes2ASIX()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'ASIX2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes1DAW()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'DAW1'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function alumnes2DAW()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM alumne WHERE Clase = 'DAW2'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function generarGrup($nomgrup)
{

    $connexio = connexion();

    $query = "INSERT INTO grup (nom) VALUES (:nom)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':nom', $nomgrup);
    $stmt->execute();
}

function buscarGrup($grup)
{

    $connexio = connexion();

    $query = "SELECT id FROM grup WHERE nom = :nom";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':nom', $grup);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['id'];
}

function buscarAlumnes($clase)
{

    $connexio = connexion();

    $query = "SELECT email FROM alumne WHERE Clase = :clase";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':clase', $clase);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'email' => $row['email']
        );
        $alumnes[] = $alumne;
    }

    return $alumnes;
}

function setIdAlumne($grup, $mail)
{

    $connexio = connexion();

    $query = "UPDATE alumne SET grup_id = :grup WHERE email = :mail";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup', $grup);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
}


function grupoCreado()
{

    $connexio = connexion();

    $query = "SELECT COUNT(*) AS total FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function eliminarGrups()
{

    $connexio = connexion();

    $query = "DELETE FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();
}

function netejarAlumnes()
{

    $connexio = connexion();

    $query = "UPDATE alumne SET grup_id = 0";
    $stmt = $connexio->prepare($query);
    $stmt->execute();
}

function canviarGrup($alumne, $grup)
{

    $connexio = connexion();

    $query = "UPDATE alumne SET grup_id = :grup WHERE id = :alumne";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup', $grup);
    $stmt->bindParam(':alumne', $alumne);
    $stmt->execute();
};

function alumnesPerGrup($grup)
{

    $connexio = connexion();

    $query = "SELECT id, nom, cognoms, email, grup_id, Clase FROM alumne WHERE grup_id = :grup";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup', $grup);
    $stmt->execute();

    $alumnes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $alumne = array(
            'id' => $row['id'],
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

function grupPerId($id)
{

    $connexio = connexion();

    $query = "SELECT nom FROM grup WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['nom'];
}
function seleccionarGrup()
{

    $connexio = connexion();

    $query = "SELECT nom FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    // Obtener todos los nombres y almacenarlos en un array
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return ($result);
}

function inserirConfig($config, $valor)
{
    $connexio = connexion();

    $query = "INSERT INTO config (option, value) VALUES (:config, :valor)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':config', $config);
    $stmt->bindParam(':valor', $valor);
    $stmt->execute();
}

function guardarConfig($config, $valor)
{
    $connexio = connexion();
    if (llegirConfig($config) == null) {
        inserirConfig($config, "Pausat");
        return;
    }
    $query = "UPDATE config SET value = :valor WHERE option = :config";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':config', $config);
    $stmt->bindParam(':valor', $valor);
    $stmt->execute();
}

function editarConfig($config)
{
    $connexio = connexion();

    $query = "UPDATE config SET value = :config";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':config', $config);
    $stmt->execute();
}

function llegirConfig($config)
{
    $connexio = connexion();

    $query = "SELECT value FROM config WHERE option = :config";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':config', $config);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['value'];
}
