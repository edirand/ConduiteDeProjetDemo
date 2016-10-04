<?php 
$err = false;
try
	{
		$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','');		
		
		
		/* Dates */
		$sql = 'DELETE FROM Dates';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error clean dates";
			$err= true;
		}
		
		$sql = 'ALTER TABLE Dates AUTO_INCREMENT = 1';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error reset aa dates";
			$err= true;
		}
		
		$sql =	"INSERT INTO Dates(dates) VALUES 
		('Lundi matin'),
		('Lundi après midi'),
		('Mardi matin'),
		('Mardi après midi'),
		('Mercredi matin'),
		('Mercredi après midi'),
		('Jeudi matin'),
		('Jeudi après midi'),
		('Vendredi matin'),
		('Vendredi après midi')";
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error insert dates";
			$err= true;
		}				
	
		
		/* Dscipline*/
		$sql = 'DELETE FROM Disciplines';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error clean disciplines";
			$err= true;
		}
		
		$sql = 'ALTER TABLE Disciplines AUTO_INCREMENT = 1';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error reset aa disciplines";
			$err= true;
		}
		
		$sql = "INSERT INTO Disciplines(nom) VALUES
				('Chimie'),
				('Physique'),
				('Informatique'),
				('Mathématique')";
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error insert disciplines";
			$err= true;
		}
		
		/* public */
		$sql = 'DELETE FROM Public';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error clean Public";
			$err= true;
		}
		
		$sql = 'ALTER TABLE Public AUTO_INCREMENT = 1';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error reset aa public";
			$err= true;
		}
		
		$sql = "INSERT INTO Public(nom) VALUES
				('Primaires'),
				('6ieme 5ieme'),
				('4ieme 3ieme'),
				('2nde'),
				('1ere'),
				('Tale'),
				('Classes préparatoires'),
				('Université')";
		$req = $db -> prepare($sql);				
		if(!$req -> execute()){		
			echo "error insert Public";
			$err= true;
		}
		
		/* Ateliers */
		$sql = 'DELETE FROM Ateliers';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error clean ateliers";
			$err= true;
		}
		
		$sql = 'ALTER TABLE Ateliers AUTO_INCREMENT = 1';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){		
			echo "error reset aa ateliers";
			$err= true;
		}
		
		for($i = 0; $i < 15; $i++){
			$sql = "INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, dates, disciplines, public, laboratoire_id) VALUES
('Liquides durs et solides mous ', 'Découverte des fluides complexes, gels, matériaux granulaires...', 'Atelier scientifique',
'Centre de Recherche Paul Pascal (CRPP), CNRS, 115 Avenue du Dr Schweitzer, 33600 Pessac\nZone D : atelier situé entre Doyen 
Brus et Montaigne-Montesquieu', '30 min', 12, 'Sur réservation', 'Les fluides complexes nous accompagnent dans notre quotidien :
les shampoings, mousses et savons dans notre salle de bains, le dentifrice, les mayonnaises ou autres émulsions dans la cuisine...\n
Que sont-ils ? Ce sont des fluides qui se comportent, selon les circonstances, comme un liquide ou comme un solide. Nous proposons,
à l\'aide d\expériences simples, de montrer et expliquer les propriétés spectaculaires de quelques fluides complexes.', 
'Martin Depardieu (doctorant)\n Christophe Coutant (doctorant)', '', '3|4|7|8', '1', '4|5|6|7|8',1);";
			$req = $db -> prepare($sql);
			if(!$req -> execute()){			
				echo "error sql req ".$i;
				$err= true;
			}
		}
		/**/
		
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