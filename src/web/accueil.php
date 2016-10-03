<?php
try
	{
		$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','');

		$sql = 'Select * from Ateliers';
		$req = $db -> prepare($sql);
		if(!$req -> execute()){			
			echo "error sql req";
		}
		
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e.getMessage());
		
	}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>	
	<meta charset="UTF-8">
		
	<title> Accueil </title>
	
	<link href="assets/css/accueil.css" rel="stylesheet" media="screen">
    </head>

    <body>
	
	
	<section id="liste_atelier">
		<h2>Liste des ateliers </h2>
		<div id="ajouter_atelier"><a href="ajout.php">Ajouter un atelier </a></div>
		
		<div id="div_liste">
		<?php
			
			
			while($data=$req->fetch())
			{					
				$id = $data['id'];
				
				$div_atelier = '
					<div class="div_atelier">
						<div class="info">
							<span class="info_title">'.$data["titre"].'</span>						
						</div>
						<span class="modifier"> <a href="modifier.php?id='.$id.'">Modifier</a> </span>
						
						
					</div>';
				echo $div_atelier;
			}
		?>
		</div>
	
	</section>

    </body>

</html>
