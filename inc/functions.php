
<?php 
include_once("connexion.php");

function login($email,$pwd)
{
    $sql = "SELECT * FROM membre WHERE email = '$email' AND pwd = '$pwd'";
    $resultat = mysqli_query(dbconnect(),$sql);
    $return = mysqli_fetch_assoc($resultat);
    if ($return != null) {
        return $return;
    } else {
        return false;
    }

}

function set_new_pub($id_user,$contenue){
    $sql = "INSERT INTO publications (contenue,id_membre,date_de_pub) VALUES ('$contenue','$id_user',NOW())";
    $result = mysqli_query(dbconnect(),$sql);
    if($result){  // $result->lastInsertId()   -> pour obtenir l'id du nouveau pub insrer
        return true;
    } else{
        return false;
    }
}

function get_all_pub(){
    $sql = "SELECT * FROM publications";
    $result = mysqli_query(dbconnect(),$sql);
    $tab = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $tab[] = $row;
        }
    }
    return $tab;
}

function set_new_comment($comment,$id_pub,$id_user){
    $sql = "INSERT INTO commentaire (id_pub,id_membre,date_commentaire,commentaire) 
    VALUES ('$id_pub','$id_user',NOW(),'$comment')";
    $result = mysqli_query(dbconnect(),$sql);
    if($result){
        return true;
    } else{
        return false;
    }
}

function get_all_comment_by_pub_id($id_pub){
    $sql = "SELECT * FROM commentaire WHERE id_pub = '$id_pub' ORDER BY date_commentaire DESC";
    $result = mysqli_query(dbconnect(),$sql);
    $retour = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $retour[] = $row;
        }
        return $retour;
    } else{
        return null;
    }
}

?>