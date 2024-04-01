<?php

session_start();

if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];

    require_once '../Model/consultasbd.php';


    $professorId = buscarProfessorId($mail);

    if (!$professorId) {
        echo "<script>alert('No ets professor')</script>";
        session_unset();
        session_destroy();
        header('refresh:0.01;url=../index.php');
        exit;
    }

    $activitat = activitatProfessor($professorId);

    if (!$activitat) {
        echo "<script>alert('No hi ha grups disponibles')</script>";
        session_unset();
        session_destroy();
        header('refresh:0.01;url=../index.php');
        exit;
    }
    $activitat = $activitat['id'];
    $grups = grupsEnfrontats($activitat);

    $primerGrupId = $grups[0];
    $segonGrupId = $grups[1];
    $primerGrup = nomGrup($grups[0]);
    $segonGrup = nomGrup($grups[1]);

    $puntuacioPrimer = puntuacioGrup($grups[0]);
    $puntuacioSegon = puntuacioGrup($grups[1]);

    $alumnesPrimerGrup = buscarAlumnes2($grups[0]);
    $alumnesSegonGrup = buscarAlumnes2($grups[1]);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $connexio = connexion();

        foreach ($_POST['asistencia'] as $alumno_id => $asistencia) {

            if (isset($_POST['asistencia'][$alumno_id]) && $_POST['asistencia'][$alumno_id] == 'Si') {
                $asistencia = 'Si';
            } else {
                $asistencia = 'No';
            }
            try {
                $query = "SELECT * FROM alumne_assisteix_activitat WHERE alumne_id = :alumno_id AND activitat_id = :activitat_id";
                $stmt = $connexio->prepare($query);
                $stmt->bindParam(':alumno_id', $alumno_id);
                $stmt->bindParam(':activitat_id', $activitat);
                $stmt->execute();

                if ($stmt->rowCount() == 0) {
                    $query_insert = "INSERT INTO alumne_assisteix_activitat (alumne_id, activitat_id, assisteix) VALUES (:alumno_id, :activitat_id, :asistio)";
                    $stmt_insert = $connexio->prepare($query_insert);
                    $stmt_insert->bindParam(':alumno_id', $alumno_id);
                    $stmt_insert->bindParam(':activitat_id', $activitat);
                    $stmt_insert->bindParam(':asistio', $asistencia);
                    $stmt_insert->execute();
                } else {
                    $query_update = "UPDATE alumne_assisteix_activitat SET assisteix = :asistio WHERE alumne_id = :alumno_id AND activitat_id = :activitat_id";
                    $stmt_update = $connexio->prepare($query_update);
                    $stmt_update->bindParam(':alumno_id', $alumno_id);
                    $stmt_update->bindParam(':activitat_id', $activitat);
                    $stmt_update->bindParam(':asistio', $asistencia);
                    $stmt_update->execute();
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        echo "<script>alert('Assistència actualitzada')</script>";
    } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit2'])) {
        $connexio = connexion();

    }

}

// Definir aquesta variable en la ronda final per mostrar el formulari de pujada de fotos grupals.
$rondaFinal = True;

include '../Vista/profe.vista.php';
