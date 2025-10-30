<?php
include_once("../inc/functions.php");
session_start();
$code = $_GET['code'];
if ($code == 1) {

    $email = $_POST['Email'];
    $mdp = $_POST['mdp'];

    $resultat_log = login($email, $mdp);
    $_SESSION['nom_membre'] = $resultat_log['nom'];

    header("Content-Type: application/json");
    sleep(4);
    if ($resultat_log == true) {
        echo json_encode($resultat_log);
    } else {
        echo json_encode(false);
    }
} else if ($code == 2) {
    
}


?>