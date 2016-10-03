<?php
if(	isset($_POST['titre'])&&
	isset($_POST['theme'])&&
	isset($_POST['type'])&&
	isset($_POST['lieu'])&&
	isset($_POST['duree'])&&
	isset($_POST['capacite'])&&
	isset($_POST['inscription'])&&
	isset($_POST['resume'])&&
	isset($_POST['animateur'])&&
	isset($_POST['partenaires'])&&
	isset($_POST['id'])&&
	isset($_POST['lab_id'])
	)
	{
		
		
		$titre = $_POST['titre'];
		$theme = $_POST['theme'];
		$type = $_POST['type'];
		$lieu = $_POST['lieu'];
		$duree =  $_POST['duree'];
		$capacite =  $_POST['capacite'];
		$inscription =  $_POST['inscription'];
		$resume =  $_POST['resume'];
		$animateur =  $_POST['animateur'];
		$partenaires =  $_POST['partenaires'];	
		$lab_id = $_POST['lab_id'];
		$id= $_POST['id'];
		
		if(is_numeric($capacite)){
			
			try
			{
				$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','');
				$sql = '
					Update Ateliers
					Set titre = "'.$titre.'", 
					theme = "'.$theme.'",
					typeAtelier = "'.$type.'",
					lieu = "'.$lieu.'",
					duree = "'.$duree.'",
					capacite = "'.$capacite.'",
					inscription = "'.$inscription.'",
					resumeAtelier = "'.$resume.'",
					animateur = "'.$animateur.'",
					partenaires = "'.$partenaires.'",
					laboratoire_id = "'.$lab_id.'"
					Where id = "'.$id.'"';
				
				$req = $db -> prepare($sql);
				if($req -> execute()){		
					$location = 'Location: accueil.php';		
					header($location);			
				}
				else{
					echo "Erreur requête <br>";					
					echo '<a href="modifier.php?id='.$id.'">Retour à la page</a><br>';
					echo '<a href="accueil.php">Retour accueil</a>';
				}
				
				
			}
			catch(Exception $e)
			{
				die('Erreur : ' . $e.getMessage());
				
			}	
		}
		else {
			echo "Atention le champs capacité doit être numérique<br>";
			echo '<a href="modifier.php?id='.$id.'">Retour à la page</a><br>';
			echo '<a href="accueil.php">Retour accueil</a><br>';
		}
		
	}


?>