<?php
session_start();
include("bd.php");
$quest=array();
$rep =$bdd->prepare("SELECT idQues,question,choix FROM questions");
$rep->execute();
while ($all = $rep->fetch()) {
	$quest[]=$all;
}
$reponse=array();
$rep =$bdd->prepare("SELECT idRep,reponse,etat,idQues FROM reponses");
$rep->execute();
while ($all = $rep->fetch()) {
	$reponse[]=$all;
}
echo "<div style='margin-top:2%'>
            <td width='10%'>
               <button type='button' name='edit' class='btn btn-primary btn-xs edit' '>Edit</button>
			</td>
			<td width='10%'>
				<button type='button' name='delete' class='btn btn-danger btn-xs delete' >Delete</button>
			</td>";
for ($i=0; $i < count($quest); $i++) { 
	echo $quest[$i]['question'];
	echo "<br>";
	if ($quest[$i]['choix']=="texte") {
		for ($j=$i; $j < count($reponse); $j++) { 
            if ($quest[$i]['idQues']==$reponse[$j]['idQues']) 
            {
                echo '<input type="text" value="'.$reponse[$j]['reponse'].'">';
                echo "******************************************";
			}
		}
		echo "<br>";
	}else if($quest[$i]['choix']=="simple"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['idQues']==$reponse[$j]['idQues']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']==1){
					echo '<input type="radio" style="width:0px;height:0px;" checked="checked">';
				}else{
					echo '<input type="radio" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}
		}
		echo "******************************************";
		echo "<br>";
	}else if($quest[$i]['choix']=="multiple"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['idQues']==$reponse[$j]['idQues']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']==1){
					echo '<input type="checkbox" style="width:0px;height:0px" checked="checked">';
				}else{
					echo '<input type="checkbox" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}

		}
		echo "******************************************";
		echo "<br>";
	}
	
}