<?php

session_start();

  require 'autentificacion.php';
  //require '../Model/mainfunction.php';  
  
  $usuari =  $google_account_info->name;
  $email = $google_account_info->email = $email;
  echo $usuari;
  echo $email;
/*
  try {
    if ( comprovarEmail($email)){
       echo "L'email ja està registrat";
       $error =  "L'email ja està registrat";
       //$usuari = encontrarPorEmail($email);
       $_SESSION['usuari'] = $usuari;
       header('Location: index.logat.php');

     }else{
       //insertar_usuari_Oauth2($usuari, $email);
       $_SESSION['usuari'] = $usuari;
       header('Location: index.logat.php');
     }
     }catch(Exception $e) {
       echo "Error: " . $e->getMessage();
     }
*/

     //TODO: Todos tenemos que tener la misma ruta de carpetas !!!!!
 //  C:\xampp\htdocs\Backend\cohesio\ProjecteActCohesio\Controlador\controlargoogle.php






?>