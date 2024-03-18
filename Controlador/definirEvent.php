<?php
require_once '../Model/consultasbd.php';

if (isset($_POST['estat'])) {
    $estat = $_POST['estat'];

    if ($estat == "Pausat") {
        guardarConfig("estat", "Pausat");
    } else {
        guardarConfig("estat", $estat);
    }
}


$config = buscarConfig();
echo json_encode(array('config' => $config));
