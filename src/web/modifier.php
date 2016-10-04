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
				
				$atelier_dates = $data['dates'];
				$atelier_disciplines = $data['disciplines'];
				$atelier_public = $data['public'];		
				
				$lab_id = $data['laboratoire_id'];			
				
			}
			else {
				$err = true;
				echo "error sql req";
			}
			/*dates*/
			$sql = '
				SELECT *
				FROM dates';
				//WHERE id REGEXP "'.$dates.'"';
				
			$dates_array;
			$req = $db -> prepare($sql);
			if($req -> execute()){	
				while($data=$req->fetch()){					
					$dates_array[] = array($data['dates'],$data['id']);
				}
				
			}
			
			/* disciplines*/
			$sql = '
				SELECT *
				FROM disciplines';
				//WHERE id REGEXP "'.$disciplines.'"';
			$disciplines_array;
			$req = $db -> prepare($sql);
			if($req -> execute()){	
				while($data=$req->fetch()){
					
					$disciplines_array[] = array($data['nom'],$data['id']);
				}
				
			}
			
			/*public */
			$sql = '
				SELECT *
				FROM public';
				//WHERE id REGEXP "'.$public.'"';
			$public_array;
			$req = $db -> prepare($sql);
			if($req -> execute()){	
				while($data=$req->fetch()){
					
					$public_array[] = array($data['nom'],$data['id']);
				}
				
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
			<div class="input_info">Titre</div>
			<input maxlength="300" type="text" name="titre" value ="'.$titre.'" />
			<div class="input_info">Thème</div>
			<input maxlength="300" type="text" name="theme" value ="'.$theme.'" />
			<div class="input_info">Type</div>
			<input maxlength="300" type="text" name="type" value ="'.$type.'" />
			
			<div class="input_info">Dates</div>
			<div>';
			foreach($dates_array as $da){
				$inputs .=  '
				<div>				
				<input type="checkbox" name="dates[]" id="date'.$da[1].'" value="'.$da[1].'"';
				if($atelier_dates!= "" &&preg_match("#".$atelier_dates."#", $da[1])){
					$inputs.='checked="checked"';
				}
				$inputs.='>
				<label for="date'.$da[1].'">'.$da[0].'</label>
				</div>';
			}
			
			$inputs .='
			</div>
			
			<div class="input_info">Lieu</div>
			<textarea maxlength="300" form="modif_form" name="lieu">'.$lieu.'</textarea>
			<div class="input_info">Durée</div>
			<input maxlength="50" type="text" name="duree" value ="'.$duree.'" />
			<div class="input_info">Capacité</div>
			<input type="text" name="capacite" value ="'.$capacite.'" />
			<div class="input_info">Inscription</div>
			<input maxlength="100" type="text" name="inscription" value ="'.$inscription.'" />
			<div class="input_info">Résumé</div>
			<textarea maxlength="1000" form="modif_form" class="large_field" name="resume">'.$resume.'</textarea>
			<div class="input_info">Animateur</div>
			<input maxlength="300" type="text" name="animateur" value ="'.$animateur.'" />
			<div class="input_info">Partenaires</div>
			<input maxlength="500" type="text" name="partenaires" value ="'.$partenaires.'" />
			
			<div class="input_info">Public visé</div>
			<div>';
			foreach($public_array as $da){
				$inputs .=  '
				<div>				
				<input type="checkbox" name="public[]" id="public'.$da[1].'" value="'.$da[1].'"';
				if($atelier_public!= "" &&  preg_match("#".$atelier_public."#", $da[1])){
					$inputs.='checked="checked"';
				}
				$inputs.='>
				<label for="public'.$da[1].'">'.$da[0].'</label>
				</div>';
			}
			
			$inputs .='
			</div>
			
			<div class="input_info">Disciplines scolaires visées</div>
			<div>';
			foreach($disciplines_array as $da){
				$inputs .=  '
				<div>				
				<input type="checkbox" name="disciplines[]" id="disciplines'.$da[1].'" value="'.$da[1].'"';
				if($atelier_disciplines!= "" && preg_match("#".$atelier_disciplines."#", $da[1])){
					$inputs.='checked="checked"';
				}
				$inputs.='>
				<label for="disciplines'.$da[1].'">'.$da[0].'</label>
				</div>';
			}
			
			$inputs .='
			</div>
			
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
