<?php

if(isset($_GET['id'])){
	
	$id = $_GET['id'];
		
	try
	{
		$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','root');

		$sql = 'DELETE FROM Ateliers WHERE id = '.$id;
		
		$req = $db -> prepare($sql);
		if($req -> execute()){			
			$location = 'Location: accueil.php';		
			header($location);		
		}
		else{
			echo "error req<br\>";
			echo '<a href="accueil.php">Retour accueil</a>"';
		}
		
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e.getMessage());
		
	}	
		
}


?>
