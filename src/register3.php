<?php
 include("bd.php");
global $bdd ;

      if ($_POST) {
          $question = $_POST['question'];
          $point = $_POST['point'];
          $chx = $_POST['chx'];
          $reponses = $_POST['response'];
          $choice =  $_POST['choice'];
          $Ques = ['question'=> $question,'point'=>$point,'chx'=>$chx,'reponses'=>$reponses,'bon_reep'=>$choice];

          ///
            
        $respon= $bdd->prepare('INSERT INTO `quizzprojet`.questions (question, score,choix)
        VALUES ( :question, :point,:chx)');
                $respon->execute(array(
                    
                    'question'=> $question,
                    'point'=>$point,
                    'chx'=>$chx
                ));
          ///  
          $dernier=$bdd->lastInsertId();
          
          for ($i=0; $i <count($reponses) ; $i++) { 
              $rep = $reponses[$i];
              $etat = 0;
              if (in_array($rep,$choice )) {
                  $etat = 1;
              }
              
              $req= $bdd->prepare('INSERT INTO  `quizzprojet`.reponses (reponse,idQues,etat)
VALUES (:reponse, :idQ,:etat)');
          $req->execute(array(
              
              'reponse'=>$rep,
              'idQ'=>$dernier,
              'etat'=>$etat
          ));
          }
          echo json_encode($Ques);


      }
?>