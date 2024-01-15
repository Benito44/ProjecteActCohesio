<?php   

function connexion()
{
    require 'db.constants.php';
    return new PDO("mysql:host=$HOST;dbname=$DB", "$USER", $PASS);
}

?>