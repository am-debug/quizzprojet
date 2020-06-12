<?php
include('bd.php');

global $bdd;

if(!empty($_POST)){
    unset($_POST['submit']);
    
    
    /* $user_exist = $bdd->query('SELECT LOGIN FROM utilisateur WHERE LOGIN='.$_POST["login"]);
    

    if(!$user_exist){
        $sql="INSERT INTO utilisateur (PRENOM, NOM, LOGIN, PASSWORD, REPEAT_PASSWORD , CATEGORIE, Photo)
        VALUE ('".$_POST["Prenom"]."', '".$_POST["Nom"]."', '".$_POST["login"]."', '".$_POST["pass"]."', 
         '".$_POST["passe"]."', 'admin', '".$_FILES["avatar"]['name']."')"  ;
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
    }*/
    
    
}
?>


