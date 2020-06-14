<?php

session_start();


//fetch.php

include("bd.php");

$query = "SELECT * FROM utilisateur where CATEGORIE='joueur' ";
$statement = $bdd->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table id="mytab" class="table table-striped table-bordered">
	<tr>

		<th>NOM</th>
		<th>PRENOM</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr  id ="trDelete">
			<td width="40%">'.$row["NOM"].'</td>
			<td width="40%">'.$row["PRENOM"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="M_'.$row["LOGIN"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="del_'.$row["LOGIN"].'">Delete</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
          echo '<div class="modal-body">
                  <form>
                      <div class="form-group">
                          <label for="fn">Firstname</label>
                          <input type="text" class="form-control" id="firstname" name="firstname">
                      </div>
                      <div class="form-group">
                          <label for="ln">Lastname</label>
                          <input type="text" class="form-control" id="lastname" name="lastname">
                      </div>
                  </form>
              </div>';
             echo '<div class="modal-footer">
                  <button type="button"  class="btn btn-info modifier" id="M_'.$row["LOGIN"].'">Modify</button>

              </div>';
?>
<script >

$(document).ready(function(){
    
 /*   $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'getData.php',
                data:'id='+lastID,
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                }
            });
        }
    });*/
    // Delete 
$('tr').on('click' , '.btn btn-danger btn-xs delete' ,function(){
     var identifiant =$(this).attr('id' )
    //console.log(id);

  // var el = this;
 
   var splitid = identifiant.split("_");
   console.log(splitid);
   var id =splitid[1];

   // Delete id
   var deleteid = splitid[1];
  // alert("suprimeu la beuggg")
   // AJAX Request
   $.ajax({
     url: 'http://localhost/quizprojet/src/sup.php',
     type: 'POST',
     data: {LOGIN:id },
     dataType:'text',
     success: function(response){
        console.log(response);
		
       if(response == 1){
        console.log("supprimé avec success")
	 // Remove row from HTML Table
	 $(el).closest('tr').css('background','tomato');
	 $(el).closest('tr').fadeOut(800,function(){
	    $(this).remove();
	 });
      }else{
	 alert('Invalid ID.');
      }

    }
   });

 });
});

$('tr').on('click','.edit', function() {
              
                let firstname= $(this).parents('tr').find('td').eq(0).html();
                let lastname= $(this).parents('tr').find('td').eq(1).html();
                $('#firstname').attr('value',firstname);
                $('#lastname').attr('value',lastname);


            });
$(document).on("click",'.modifier', function() {
var identifiant =$(this).attr('id' )
let firstname=$('#firstname').val();
let lastname=$('#lastname').val();

    //console.log(id);

  // var el = this;
 
   var splitid = identifiant.split("_");
   console.log(splitid);
   var id =splitid[1];

   // Delete id
   var deleteid = splitid[1];
  // alert("suprimeu la beuggg")
   // AJAX Request
$.ajax({
url:'http://localhost/quizprojet/src/modifier.php',
type:'post',
data:{
     firstname:firstname,
     lastname:lastname,
     LOGIN:id
    },
    dataType:'html',
    success:function (data) {
        if (data=="ok") {
            alert('Modification carried out successfully');
            
        }
        else{
            alert('error');
        }
    
    
    }
    });
});


</script>