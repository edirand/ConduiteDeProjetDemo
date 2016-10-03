<?php 
$err = false;
try
	{
		$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','');
		
		$sql = 'DELETE FROM Ateliers';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error clean";
			$err= true;
		}
		
		for($i = 0; $i < 15; $i++){
			$sql = "INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, laboratoire_id) VALUES
			('Liquides durs et solides mous ".$i."', 'Découverte des fluides complexes, gels, matériaux granulaires...', 'Atelier scientifique',
			'Centre de Recherche Paul Pascal (CRPP), CNRS, 115 Avenue du Dr Schweitzer, 33600 Pessac\nZone D : atelier situé entre Doyen 
			Brus et Montaigne-Montesquieu', '30 min', 12, 'Sur réservation', 'Les fluides complexes nous accompagnent dans notre quotidien :
			les shampoings, mousses et savons dans notre salle de bains, le dentifrice, les mayonnaises ou autres émulsions dans la cuisine...\n
			Que sont-ils ? Ce sont des fluides qui se comportent, selon les circonstances, comme un liquide ou comme un solide. Nous proposons,
			à l\'aide d\expériences simples, de montrer et expliquer les propriétés spectaculaires de quelques fluides complexes.', 
			'Martin Depardieu (doctorant)\n Christophe Coutant (doctorant)', '', 1)";
			$req = $db -> prepare($sql);
			if(!$req -> execute()){			
				echo "error sql req ".$i;
				$err= true;
			}
		}
		if(!$err){
			$location = 'Location: accueil.php';		
			header($location);			
		}
	}
	catch(Exception $e)
	{
		$err= true;
		die('Erreur : ' . $e.getMessage());
		
	}




?>