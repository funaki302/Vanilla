<?php
include_once("../inc/functions.php");
session_start();
$code = $_GET['code'];
if ($code == 1) {

    $email = $_POST['Email'];
    $mdp = $_POST['mdp'];

    $resultat_log = login($email, $mdp);
    $_SESSION['user'] = $resultat_log;

    header("Content-Type: application/json");
    sleep(4);
    if ($resultat_log == true) {
        echo json_encode($resultat_log);
    } else {
        echo json_encode(false);
    }
} else if ($code == 2) {
    $id_user = $_POST['id_user'];
    $texte = $_POST['texte'];
    
    header("Content-Type: application/json");
    if(set_new_pub($id_user,$texte)){
        $pubs = get_all_pub();
        echo json_encode($pubs);
    } else{
        echo json_encode(false);
    }
 } 


?>