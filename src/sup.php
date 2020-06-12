<?php 
require 'bd.php';

$id = $_POST['LOGIN'];

if(isset($_POST['LOGIN'])){
 
  $query="DELETE FROM utilisateur where LOGIN=?";
   $statement=$bdd->prepare($query);
  $statement->execute([$_POST['LOGIN']]);
   

   echo 1;
 }


echo 0;