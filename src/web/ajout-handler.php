<?php
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
		
		/* dates*/
		$dates ='';
		if(isset($_POST['dates'])){
			$len = count($_POST['dates']);
			for($i = 0; $i < $len -1;$i++){
				$dates .= $_POST['dates'][$i].'|';
				
			}
			$dates .= $_POST['dates'][$len-1];
		}
		/* disciplines*/
		$disciplines ='';
		if(isset($_POST['disciplines'])){
			$len = count($_POST['disciplines']);
			for($i = 0; $i < $len -1;$i++){
				$disciplines .= $_POST['disciplines'][$i].'|';
				
			}
			$disciplines .= $_POST['disciplines'][$len-1];
		}
		/* public*/
		$public ='';
		if(isset($_POST['public'])){
			$len = count($_POST['public']);
			for($i = 0; $i < $len -1;$i++){
				$public .= $_POST['public'][$i].'|';
				
			}
			$public .= $_POST['public'][$len-1];
		}
		/**/
		try
		{
			$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','root');
			$sql = 'INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, dates, disciplines, public, laboratoire_id) VALUES("'.$titre.'","'.$theme.'","'.$type.'","'.$lieu.'","'.$duree.'",'.$capacite.',"'.$inscription.'","'.$resume.'","'.$animateur.'","'.$partenaires.'","'.$dates.'","'.$disciplines.'","'.$public.'", 1);';
			
			
				
			$req = $db -> prepare($sql);
			if($req -> execute()){
				$location = 'Location: accueil.php';
				header($location);
			}
			else{
				echo "Erreur requête <br>";
				echo '<a href="ajout.php?id='.$id.'">Retour à la page</a><br>';
				echo '<a href="accueil.php">Retour accueil</a>';
			}
		}
		catch(Exception $e)
		{
			die('Erreur : ' . $e.getMessage());
		}


?>
