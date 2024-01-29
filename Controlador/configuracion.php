<?php

  require '../vendor/autoload.php';
  $clientID = '276558750720-qtno4qc3sv4i22m0pp432no9u9bc58n5.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/Backend/cohesio/ProjecteActCohesio/Controlador/llista.php';

  // create Client Request to access Google API
  $client = new Google\Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");


?>  