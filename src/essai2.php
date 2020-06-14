<?php
include('../../php/connectDatabase.php');

session_start();
global $db;

if(!empty($_POST)){
    unset($_POST['submit']);
    $sql="INSERT INTO questions( question, score, choix)
        VALUES
         ( '".$_POST["question"]."', '".$_POST["points"]."', '".$_POST["choix"]."')"  ;
         
         $reponse = $pdo->exec($sql);
         $count = $reponse->rowcount();
         if($count>0){
             $sql ="SELECT idQues FROM questions WHERE question=:question AND score=:score AND choix =:choix";
             $stmt=$pdo->prepare($sql);
             $stmt->execute(['question'=>$_POST["question"],'score'=>$_POST["points"],'choix'=>$_POST["choix"]]);
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
           //  print_r($result);
         }
        // $id = $pdo->query('SELECT idQues FROM questions WHERE question=''".$_POST["question"]."');
         
      
  
   return $result;
      
}      

    ?>

