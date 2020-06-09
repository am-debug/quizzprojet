<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title> page de connexion </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  </script>
 <link rel="stylesheet" type="text/css" href="asset/css/style.css">
 <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
   

  </head>
  <body>
    <div class="cadre" >
      <div class="interieur-cadre">
      <div class="container ">
      <div class="w-auto bg-info mt-2 p-2"  id="cont" style="min-height:900px;">
         <div class="w-auto py-0 mx-auto px-0" id="section" style="min-height:450px;">
            <div class="row">
                <div class="col-sm-2 col-md-lg" >
                  <form action="" class="form" id="form" method="post">
                    <div  style="float:left;margin-left:250% ;margin-top:150% ;width:200% ;height:250%">
                        <label for="username">Username</label><br>
                        <input type="text" id="username" name="login" placeholder="Entrer your username">
                        
                    </div>
                    <div  style="float:left;margin-left:250% ;margin-top:10% ;width:200% ;height:250%">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="pass" placeholder="Entrer your password">
                       
                    </div>
                    <div class="boutons">
                    <button type ="submit" name="submit" class="btn btn-primary mb-2" style=" margin-top:10%;float:left;margin-left:225%">
                    Login
                    </button>
                    
                    <a href="src/inscription.php" style=" width:100%;font-weight: bold;color: #000000; margin-top:-15%;float:left;margin-left:355%">S'inscrire pour jouer?</a>

                    </div>
                    
                  </form>
                </div>   
            </div>
         </div>
      </div>
          
      </div>
      </div>
    
    </div>
  </body>
</html> 
<?php
include('src/bd.php');
if (isset($_POST['submit']))
{
    $login=$_POST['login'];
    $password=$_POST['pass'];
   
    $sql="Select * From utilisateur  where LOGIN='".$login."'";
    $result=$bdd->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0)
    {
      $data=$result->fetchAll();
      $_SESSION['Photo']=$data[0]['Photo'];
      $_SESSION['Prenom']=$data[0]['PRENOM'];
      $_SESSION['Nom']=$data[0]['NOM'];
      
      if ($password == $data[0]['PASSWORD'])
      {
        if ($data[0]['CATEGORIE']== "admin")
        {
          echo "connexion effectuer";
          $_SESSION['login']= $login;
          header('Location:src/admin.php');
       
       }else
       {
        if ($data[0]['CATEGORIE']== "joueur")
        {
          echo "connexion effectuer";
          $_SESSION['login']= $login;
          header('Location:src/joueur.php');
         
          
        }


       }
      }
        
      else{
        echo " login ou password invalide";
      }
     

    }else
    {
      echo " login ou password invalide";

    }
  

    
   
}



?>