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
     <link rel="stylesheet" type="text/css" href="../asset/css/style1.css">

  </head>
  <body>
  
    <div class="cadre" >
      <div class="interieur-cadre">
      <div class="container ">
      <div class="w-auto bg-info mt-2 p-2"  id="conte" style="min-height:900px;">
         <div class="w-auto py-0 mx-auto px-0" id="sectione" style="min-height:450px;">
            <div class="row">
                <div class="col-sm-2 col-md-lg" >
                <form action="" enctype="multipart/form-data" id="formul"  style="margin-top:-65%; float:left; margin-left:150%">
                     <div  style="float:left;margin-left:90% ;margin-top:35% ;width:50% ;height:50%">
                          <label for="username">Avatar</label><br>
                          <input type="file" id="tof" name="avatar"  accept="image/*" onchange="loadFile(event)" value="Choisir un fichier" > 
                          <span id="misstof"></span> 
                    </div>
                    <div class="droite">
                            
                            <img id="output" alt="avatar" class="avatar" style="margin-top:20%;background-color:blue;vertical-align: middle; width:50%; height:50%;;  border-radius: 50%; margin-left: 15%;">
                            <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                </script>
                                 <h2 style=" color:black; font-size:x-small; float: right; margin-right:95px; width: 60%;  margin: 0 auto;  margin-top: 40px;">Avatar Admin</h2>
                    </div>           
                    <div  style="float:left;margin-left:150% ;margin-top:5% ;width:200% ;height:250%">
                        <label for="Prenom">Prenom</label><br>
                        <input type="text" id="Prenom" name="Prenom" placeholder="Entrer votre prenom">
                        <span id="missprenom"></span>
                        
                    </div>
                    <div  style="float:left;margin-left:150% ;margin-top:5% ;width:200% ;height:250%">
                        <label for="Nom">Nom</label><br>
                        <input type="text" id="Nom" name="Nom" placeholder="Entrer vtre nom">
                        <span id="missnom"></span>
                        
                    </div>
                    <div  style="float:left;margin-left:150% ;margin-top:5% ;width:200% ;height:250%">
                        <label for="Login">Login</label><br>
                        <input type="text" id="login" name="login" placeholder="Entre votre login">
                        <span id="misslogin"></span>
                        
                    </div>
                    <div  style="float:left;margin-left:150% ;margin-top:5% ;width:200% ;height:250%">
                        <label for="password">Password</label><br>
                        <input type="password" id="pass" name="pass" placeholder="Entrer votre m.passe">
                        <span id="misspass"></span>
                        
                    </div>
                    <div  style="float:left;margin-left:150% ;margin-top:5% ;width:200% ;height:250%">
                        <label for="Repeat_Password">Repeat_Password</label><br>
                        <input type="password" id="passe" name="passe" placeholder="Repeter votre m.passe">
                        <span id="misspasse"></span>
                        
                    </div>
                    
                    <div class="boutons">
                    <button type ="submit" id="submit" name="submit" class="btn btn-primary mb-2" style=" margin-top:15%;float:left;margin-left:200%">
                   Subscribe
                    </button>
               
                    </div>
                    
                  </form>
                </div>   
            </div>
         </div>
      </div>
          
      </div>
      </div>
    
    </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>

  $(document).ready(function () {
    $('#submit').click(function (e) {
      var erreuLog='';
      var erreurPass='';
  
      if($.trim($('#login').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid login";
      $('#misslogin').text(erreuLog);

    }
    if($.trim($('#Prenom').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid Prenom";
      $('#missprenom').text(erreuLog);

    }
    if($.trim($('#Nom').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid Nom";
      $('#missnom').text(erreuLog);

    }
    if($.trim($('#pass').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid password";
      $('#misspass').text(erreuLog);

    }
    if($.trim($('#passe').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid password";
      $('#misspasse').text(erreuLog);

    }
    if($.trim($('#tof').val()).length==0)
    {
      e.preventDefault();
      erreuLog="Invalid photo";
      $('#misstof').text(erreuLog);

    }

     });
  
$('#formul').submit(function (e) { 
    var forms= document.getElementById('formul');
  var fd= new FormData(forms);
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "register.php",
    data:fd,
    processData: false,
    contentType: false,
    // dataType: "dataType",
    
    success: function (response) {
      
  window.location.replace('../index.php');
    }
  });
});
 
    
  });

</script>
  </body>
</html>