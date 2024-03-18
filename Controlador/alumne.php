<?php 
session_start();

$mail = $_SESSION['email'];

require_once '../Model/consultasbd.php';


$grup_id = buscarGrupId($mail);

$alumnes = buscarAlumnes2($grup_id);
include '../Vista/alumne.vista.php';

