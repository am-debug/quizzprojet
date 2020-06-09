<?php
include('bd.php');
require_once "fonction.php";
global $bdd;
photo();
if(isset($_POST["Prenom"]) && isset($_POST["Nom"]) && isset($_POST["login"]) && isset($_POST["pass"])&& isset($_POST["passe"])){
    
    $user_exist = $bdd->query('SELECT LOGIN FROM utilisateur WHERE LOGIN='.$_POST["login"]);
    

    if(!$user_exist){
        $sql="INSERT INTO utilisateur (PRENOM, NOM, LOGIN, PASSWORD, REPEAT_PASSWORD , CATEGORIE, Photo)
        VALUE ('".$_POST["Prenom"]."', '".$_POST["Nom"]."', '".$_POST["login"]."', '".$_POST["pass"]."', 
         '".$_POST["passe"]."', 'joueur', '".$_FILES["avatar"]['name']."')"  ;
        $reponse = $bdd->exec($sql);
       
        if($reponse){
           echo "success";
        }
        else
        {
            echo "login exist";
        }

    }
    else
    {
        echo "login exist";
    }
    
    
}
?>


