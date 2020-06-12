<?php
require_once "bd.php";

if (isset($_POST['firstname']) and isset($_POST['lastname'])){
    $id= $_POST['LOGIN'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    if (!empty($firstname)and !empty($lastname)){
        $req=$bdd->query("UPDATE utilisateur set PRENOM='$firstname' , NOM='$lastname'
where LOGIN='$id'");
    }
    if ($req->rowCount()>0){
        echo 'ok';
    }
    else{
        echo 'bonjour';
    }
}
