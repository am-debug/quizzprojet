<?php
//$servername="mysql-aminata.alwaysdata.net";  
//$username="aminata";
//$password="aminalo95";
//$dbname="aminata_lo";

 $servername="localhost";
 $username="root";
 $password="";
$dbname="quizzprojet";
try
{
	$bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
 }


?>
