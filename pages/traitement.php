<?php
include_once("../inc/functions.php");
$code = $_GET['code'];
if ($code == 1) {

    $email = $_POST['Email'];
    $mdp = $_POST['mdp'];
    $resultat_log = login($email, $mdp);
    header("Content-Type: application/json");
    sleep(10);
    if ($resultat_log == true) {
        echo json_encode($resultat_log);
    } else {
        echo json_encode(false);
    }
} else if ($code == 2) {
    #
}


?>