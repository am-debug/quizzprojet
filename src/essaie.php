<div>
  <form action=""  id="formul" method="POST"  >
        <div class="form-group">
            <label for="question">Question:</label>
            <textarea class="form-control" rows="5" id="question" name="question"></textarea>
            <span id="missquestion"></span>
        </div>

        <div class="form-group">
            <label for="question">Points:</label>
            <input type="number" id="points" name="points" >
            <span id="misspoints"></span>
        </div>

        <div class="form-group">
            <label for="choix">Type dereponse:</label>
            <select id="choix" name="choix" >
                <option value="">--choix---</option>
                <option value="texte">choix texte</option>
                <option value="simple">choix simple</option>
                <option value="multiple">choix multiple</option>
            </select> 
            <span id="misschoix"></span>
           
            <button class="add_field_button">Add More Fields</button>
            <div class="input_fields_wrap">
               
               <!-- <div><input type="text" name="mytext[]"></div>-->
            </div>
        </div>
        <div class="boutons" style="margin-top:5%">
              <button type ="submit" id="submit" name="submit" class="btn btn-primary mb-2 enregistrer" style=" margin-top:15%;float:left;margin-left:200%">
                Subscribe
              </button>   
        </div>
      </form>  
  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
    $(document).ready(function () {
      $('#choix').change(function (e) { 
        e.preventDefault();
            $('.ajout').remove(); 
             x=0   
      });
      var x=0;
     $('.add_field_button').click(function (e) { 
       x++;
      alert(x)
       let choix=$('#choix').val()
      var wrapper=$('.input_fields_wrap')
       e.preventDefault();
       if(choix==="simple")
      {
        
        $(wrapper).append('<div class="ajout"><input type="text"  class="rep" name="rep[]"/><input type="radio" name="monchoix" id="monchoix" value="${x}" /> <a href="#" class="remove_field">Remove</a></div>'); //add input box
      }
      else if(choix==="multiple"){
        
        $(wrapper).append('<div  class="ajout"><input type="text" class="rep" name="rep[]"/> <input type="checkbox"id="monchoix" name="monchoix[]"/> <a href="#" class="remove_field">Remove</a></div>'); //add input box
      }
      else {
        $(wrapper).append('<div  class="ajout"><input type="text" class="rep" name="rep[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
      }
       
      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); 
    })
    $(document).on('click', '.enregistrer',function (e) { 
      e.preventDefault();
      $.ajax({
      type: "post",
      url: "http://localhost/SAQuizzLaye/src/html/admin/ajouterQuest.php",
      data:{
        question:$('#question').val(),
        points:$('#points').val(),
        choix:$('#choix').val()
        

      },
     // dataType: "dataType",
      success: function (data) {
        alert("succcdffges")
        console.log("succes")
      }
    });
    
  });
    
     });
     
    })
     	
	
    //-----------Validation-----------------------
  //   $(document).ready(function () {
  //     $('#submit').click(function (e) {
  //     var erreuLog='';
  //     var erreurPass='';
  
  //     if($.trim($('#question').val()).length==0)
  //   {
  //     e.preventDefault();
  //     erreuLog="la question est requis";
  //     $('#missquestion').text(erreuLog);

  //   }
  //   if($.trim($('#points').val()).length<=0)
  //   {
  //     e.preventDefault();
  //     erreuLog="le score est requis ";
  //     $('#misspoints').text(erreuLog);

  //   }
  //   if($.trim($('#choix').val())=="")
  //   {
  //     e.preventDefault();
  //     erreuLog="un choix est requis";
  //     $('#misschoix').text(erreuLog);
      

  //   }
    
   
    
    
      
  //   })


  // });
  
   
    
  </script>

</div>