<?php

session_start();


//fetch.php

include("bd.php");

$query = "SELECT * FROM score ";
$statement = $bdd->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table id="mytab" class="table table-striped table-bordered">
	<tr>

		<th>NOM</th>
        <th>PRENOM</th>
        <th>Score</th>
		
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr  id ="trDelete">
			<td width="40%">'.$row["nom"].'</td>
            <td width="40%">'.$row["prenom"].'</td>
            <td width="40%">'.$row["score"].'</td>
			
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
?>