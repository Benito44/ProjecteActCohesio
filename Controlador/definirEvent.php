<?php
require_once '../Model/consultasbd.php';
if (isset($_POST['estat'])) {
    $estat = $_POST['estat'];
    echo $estat;
    if ($estat == "R1") {
        editarAccio($estat);
    } else if ($estat == "R2") {
        editarAccio($estat);
    } else if ($estat == "R3") {
        editarAccio($estat);
    } else if ($estat == "R4") {
        editarAccio($estat);
    } else if ($estat == "R5") {
        editarAccio($estat);
    } else if ($estat == "R6") {
        editarAccio($estat);
    } else if ($estat == "R7") {
        editarAccio($estat);
    } else if ($estat == "R8") {
        editarAccio($estat);
    } else if ($estat == "R9") {
        editarAccio($estat);
    } else if ($estat == "R10") {
        editarAccio($estat);
    } else if ($estat == "R11") {
        editarAccio($estat);
    } else if ($estat == "R12") {
        editarAccio($estat);
    } else if ($estat == "R13") {
        editarAccio($estat);
    } else if ($estat == "R14") {
        editarAccio($estat);
    } else if ($estat == "R15") {
        editarAccio($estat);
    } else if ($estat == "R16") {
        editarAccio($estat);
    } else if ($estat == "R17") {
        editarAccio($estat);
    } else if ($estat == "R18") {
        editarAccio($estat);
    } else if ($estat == "R19") {
        editarAccio($estat);
    } else if ($estat == "R20") {
        editarAccio($estat);
    } else {
        editarAccio("Pausat");
    }
}


// Send information to another script
$data = array('estat' => $estat);
$url = 'http://example.com/other_script.php';
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === false) {
    // Handle error
} else {
    // Handle success
}
