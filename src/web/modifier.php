<?php
$err = false;
if(isset($_GET['id'])){
		$id = $_GET['id'];

	try
		{
			$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','');

			$sql = 'Select * from Ateliers WHERE id='.$id;
			$req = $db -> prepare($sql);
			if($req -> execute()){			
				$data=$req->fetch();	
				$titre = $data['titre'];
				$theme = $data['theme'];
				$type = $data['typeAtelier'];
				$lieu = $data['lieu'];
				$duree =  $data['duree'];
				$capacite =  $data['capacite'];
				$inscription =  $data['inscription'];
				$resume =  $data['resumeAtelier'];
				$animateur =  $data['animateur'];
				$partenaires =  $data['partenaires'];	
				$lab_id = $data['laboratoire_id'];
				
			}
			else {
				$err = true;
				echo "error sql req";
			}
			
		}
		catch(Exception $e)
		{
			$err = true;
			die('Erreur : ' . $e.getMessage());
			
		}
}
else{
	$err= true;
	echo"ERROR ID";
} 

?>


<!DOCTYPE html>
<html lang="fr">
    <head>	
	<meta charset="UTF-8">
		
	<title>Modifier</title>
	
	<link href="assets/css/modifier.css" rel="stylesheet" media="screen">
    </head>

    <body>
	
	<h1> Modification d'atelier </h1>
	
	
	
	<section id="modifier_atelier">	
		
		<form method="post" id="modif_form" action="modifier_handler.php">
		<?php
			$inputs = '
			<span>Titre</span>
			<input maxlength="300" type="text" name="titre" value ="'.$titre.'" />
			<span>Thème</span>
			<input maxlength="300" type="text" name="theme" value ="'.$theme.'" />
			<span>Type</span>
			<input maxlength="300" type="text" name="type" value ="'.$type.'" />
			<span>Lieu</span>
			<textarea maxlength="300" form="modif_form" name="lieu">'.$lieu.'</textarea>
			<span>Durée</span>
			<input maxlength="50" type="text" name="duree" value ="'.$duree.'" />
			<span>Capacité</span>
			<input type="text" name="capacite" value ="'.$capacite.'" />
			<span>Inscription</span>
			<input maxlength="100" type="text" name="inscription" value ="'.$inscription.'" />
			<span>Résumé</span>
			<textarea maxlength="1000" form="modif_form" class="large_field" name="resume">'.$resume.'</textarea>
			<span>Animateur</span>
			<input maxlength="300" type="text" name="animateur" value ="'.$animateur.'" />
			<span>Partenaires</span>
			<input maxlength="500" type="text" name="partenaires" value ="'.$partenaires.'" />
			
			<input type="hidden" name="lab_id" value ="'.$lab_id.'" />
			<input type="hidden" name="id" value ="'.$id.'" />
			';
			echo $inputs;
		
		?>
			<input type="submit" id ="modif_submit"value="Enregistrer" id="form_submit"/>
		</form>
		
		<div class="to_center">
			<a class="modif_action to_left" href ="accueil.php">Annuler </a>
			<?php
			
			 echo '<a class="modif_action to_right" href ="supprimer_handler.php?id='.$id.'">Supprimer l\'atelier </a>';
			
			?>
		</div>
		
	
	</section>

    </body>

</html>
