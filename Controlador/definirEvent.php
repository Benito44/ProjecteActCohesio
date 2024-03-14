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



// Send information to another script
// $data = array('estat' => $estat);
// $url = 'http://example.com/other_script.php';
// $options = array(
//     'http' => array(
//         'method'  => 'POST',
//         'header'  => 'Content-type: application/x-www-form-urlencoded',
//         'content' => http_build_query($data)
//     )
// );
// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);
// if ($result === false) {
//     // Handle error
// } else {
//     // Handle success
// }
