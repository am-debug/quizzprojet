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
                <div class="col-sm-2 col-md-lg" id="menu">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="meilleurscore">TOP SCORE</a></li>
                        <li><a href="jouer">JOUER</a></li>
                        
                    </ul>
                </div>  
                <div class="w-auto" id="load">
         
                </div> 
            </div>
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
