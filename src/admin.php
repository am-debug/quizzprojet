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
          <div  style="position: absolute; float: left;margin-left: 42%;font-family: 'Open Sans', sans-serif;">
         <?php echo' <img src="../asset/img/images/'.$_SESSION['Photo'].'" style=" width: 60px;height: 60px;border-radius: 50%; margin-top: 30px; float:left; margin-left:-245px"> ';?>
             <?php echo  $_SESSION['Prenom']  ?><br><?php echo " "?><?php echo $_SESSION['Nom']?>
             </div> 
            
                <div style="margin-top:5%; float:right;margin-right:33%" id="menu">
                    <a class="btn btn-success mb-2" href="ajoutquestion">Add question</button>
                    <a class="btn btn-success mb-2" href="listjoueur">Gamer List</button>
                    <a class="btn btn-success mb-2" href="listquestion">Question List</button>
                    <a class="btn btn-success mb-2" href="addadmin">Add Admin</a>
                </div>   
           
         </div>
         <div class="w-auto" id="load">
         
         </div>
      </div>
          
      </div>
      </div>
    
    </div>
  </body>
</html> 
<script>

$(document).ready(function () {
  $('#menu a').click(function(e){
    e.preventDefault();
    var input= $(this).attr('href');
    $('#load').load(input+'.php');
  })

});
</script>

