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

function dadesGrups()
{
    $connexio = connexion();

    $query = "SELECT * FROM grup";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $grups = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $grup = $row['id'];
        $grups[] = $grup;
    }

    return $grups;
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

function buscarGrupId2($id)
{

    $connexio = connexion();

    $query = "SELECT nom FROM grup WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['nom'];
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

function buscarAlumnes2($grup_id)
{
    $connexio = connexion();

    $query = "SELECT id, nom, cognoms, email, grup_id, Clase FROM alumne WHERE grup_id = :grup_id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup_id', $grup_id);
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

    $query = "INSERT INTO config (option, value) VALUES (:Estat, :valor)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':Estat', $config);
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
    $query = "UPDATE config SET value = :valor WHERE option = :Estat";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':Estat', $config);
    $stmt->bindParam(':valor', $valor);
    $stmt->execute();
}


function llegirConfig($config)
{
    $connexio = connexion();

    $query = "SELECT value FROM config WHERE option = :Estat";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':Estat', $config);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['value'];
}

function buscarConfig()
{
    $connexio = connexion();

    $query = "SELECT value FROM config WHERE option = 'Estat'";
    $stmt = $connexio->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["value"];
}

function dadesProfessors()
{
    $connexio = connexion();

    $query = "SELECT * FROM professor";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $professors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $professors;
}

function dadesProfessor($id)
{
    $connexio = connexion();

    $query = "SELECT * FROM professor WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $professor = $stmt->fetch(PDO::FETCH_ASSOC);

    return $professor;
}

function dadesActivitats()
{
    $connexio = connexion();

    $query = "SELECT * FROM activitat";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $activitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $activitats;
}

function dadesActivitat($id)
{
    $connexio = connexion();

    $query = "SELECT * FROM activitat WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $activitat = $stmt->fetch(PDO::FETCH_ASSOC);

    return $activitat;
}

function buscarProfesor($id)
{
    $connexio = connexion();

    $query = "SELECT nom, cognoms FROM professor WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['nom'] . " " . $result['cognoms'];
}

function buscarActivitat($group_id)
{
    $connexio = connexion();

    $query = "SELECT activitat_id FROM enfrontament WHERE grup_id = :group_id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':group_id', $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result['activitat_id'];
}

function informacioActivitat($id)
{
    $connexio = connexion();

    $query = "SELECT * FROM activitat WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function afegirActivitat($activitat)
{
    $connexio = connexion();

    // Modifica la consulta para insertar el punto en lugar de las coordenadas directamente
    $query = "INSERT INTO activitat (nom, descripcio, professor_puntuador, professor_assistencia, localitzacio, latitud, longitud)
VALUES (:nom, :descripcio, :professor_puntuador, :professor_assistencia, :localitzacio, :latitud, :longitud)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':nom', $activitat['nom']);
    $stmt->bindParam(':descripcio', $activitat['descripcio']);
    $stmt->bindParam(':professor_puntuador', $activitat['professor_puntuador']);
    $stmt->bindParam(':professor_assistencia', $activitat['professor_assistencia']);
    $stmt->bindParam(':localitzacio', $activitat['localitzacio']);
    $stmt->bindParam(':latitud', $activitat['latitud']);
    $stmt->bindParam(':longitud', $activitat['longitud']);

    $stmt->execute();

    return $connexio->lastInsertId();
}

function modificarActivitat($activitat)
{
    $connexio = connexion();

    $query = "UPDATE activitat SET nom = :nom, descripcio = :descripcio, professor_puntuador = :professor_puntuador, professor_assistencia = :professor_assistencia, localitzacio = :localitzacio, latitud = :latitud, longitud = :longitud WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':nom', $activitat['nom']);
    $stmt->bindParam(':descripcio', $activitat['descripcio']);
    $stmt->bindParam(':professor_puntuador', $activitat['professor_puntuador']);
    $stmt->bindParam(':professor_assistencia', $activitat['professor_assistencia']);
    $stmt->bindParam(':localitzacio', $activitat['localitzacio']);
    $stmt->bindParam(':latitud', $activitat['latitud']);
    $stmt->bindParam(':longitud', $activitat['longitud']);
    $stmt->bindParam(':id', $activitat['id']);

    $stmt->execute();
}
function modificarMaterial($activitat)
{
    $connexio = connexion();

    $query = "UPDATE activitat SET descripcio_material = :descripcio_material, obtenir_material = :obtenir_material  WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':descripcio_material', $activitat['descripcio_material']);
    $stmt->bindParam(':obtenir_material', $activitat['obtenir_material']);
    $stmt->bindParam(':id', $activitat['id']);

    $stmt->execute();
}

function buscarGrupId($mail)
{
    $connexio = connexion();

    $query = "SELECT grup_id FROM alumne WHERE email = :mail";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['grup_id'];
}

function eliminarActivitat($id)
{
    $connexio = connexion();

    $query = "DELETE FROM activitat WHERE id = :id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function inserirEnfrontament($grupId, $activitatId)
{
    $connexio = connexion();

    $query = "INSERT INTO enfrontament (grup_id, activitat_id) VALUES (:grup_id, :activitat_id)";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup_id', $grupId);
    $stmt->bindParam(':activitat_id', $activitatId);
    $stmt->execute();
}

function dadesEnfrontaments()
{
    $connexio = connexion();

    $query = "SELECT * FROM enfrontament";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $enfrontaments = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $enfrontament = array(
            'grup_id' => $row['grup_id'],
            'activitat_id' => $row['activitat_id']
        );
        $enfrontaments[] = $enfrontament;
    }

    return $enfrontaments;
}

function actualitzarEnfrontament($grupId, $activitatId)
{
    $connexio = connexion();

    $query = "UPDATE enfrontament SET activitat_id = :activitat_id WHERE grup_id = :grup_id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup_id', $grupId);
    $stmt->bindParam(':activitat_id', $activitatId);
    $stmt->execute();
}

function puntuacioTotalGrup($grupId)
{
    $connexio = connexion();

    $query = "SELECT SUM(puntuacio) AS total FROM grup_puntua_activitat WHERE grup_id = :grup_id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup_id', $grupId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function puntuacionsPerGrup()
{
    $connexio = connexion();

    $query = "SELECT grup_id, SUM(puntuacio) AS total FROM grup_puntua_activitat GROUP BY grup_id ORDER BY total DESC";
    $stmt = $connexio->prepare($query);
    $stmt->execute();

    $puntuacions = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $puntuacio = array(
            'grup' => buscarGrupId2($row['grup_id']),
            'puntuacio' => $row['total']
        );
        $puntuacions[] = $puntuacio;
    }

    return $puntuacions;
}

function puntuacioGrup($grupId)
{
    $connexio = connexion();

    $query = "SELECT SUM(puntuacio) AS total FROM grup_puntua_activitat WHERE grup_id = :grup_id";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':grup_id', $grupId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function buscarProfessorId($email){
    $connexio = connexion();

    $query = "SELECT id FROM professor WHERE email = :email";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['id'];
}

function activitatProfessor($professorId){
    $connexio = connexion();

    $query = "SELECT id FROM activitat WHERE professor_puntuador = :professorId OR professor_assistencia = :professorId";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':professorId', $professorId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function grupsEnfrontats($activitat){
    $connexio = connexion();

    $query = "SELECT grup_id FROM enfrontament WHERE activitat_id = :activitat";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':activitat', $activitat);
    $stmt->execute();

    $grups = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $grup = $row['grup_id'];
        $grups[] = $grup;
    }

    return $grups;
}

function nomGrup($groupId){
    $connexio = connexion();

    $query = "SELECT nom FROM grup WHERE id = :groupId";
    $stmt = $connexio->prepare($query);
    $stmt->bindParam(':groupId', $groupId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['nom'];
}