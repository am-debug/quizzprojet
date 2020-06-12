<?php

session_start();

//action.php

include('bd.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		
		$query = "INSERT INTO utilisateur (NOM, PRENOM) VALUE ('".$_POST["Prenom"]."', '".$_POST["Nom"]."')";
		$statement = $bdd->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM utilisateur WHERE NOM = '".$_POST["Nom"]."'
		";
		$statement =  $bdd->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['first_name'] = $row['first_name'];
			$output['last_name'] = $row['last_name'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE tbl_sample 
		SET first_name = '".$_POST["first_name"]."', 
		last_name = '".$_POST["last_name"]."' 
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	
}

?>