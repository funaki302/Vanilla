
<?php 
include_once("connexion.php");

function login($email,$pwd)
{
    $sql = "SELECT * FROM membre WHERE email = '$email' AND pwd = '$pwd'";
    $resultat = mysqli_query(dbconnect(),$sql);
    $return = mysqli_fetch_assoc($resultat);
    if ($return != null) {
        return true;
    } else {
        return false;
    }

}

?>