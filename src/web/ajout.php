<?php
	try
	{
	$db = new PDO('mysql:host=localhost; dbname=CNRSBDD; charset=utf8', 'root','root');
	/*dates*/
	$sql = 'SELECT * FROM dates';
	$dates_array;
	$req = $db -> prepare($sql);
	if($req -> execute()){
		while($data=$req->fetch()){
			$dates_array[] = array($data['dates'],$data['id']);
		}
		
	}
	
	/* disciplines*/
	$sql = 'SELECT * FROM disciplines';
	$disciplines_array;
	$req = $db -> prepare($sql);
	if($req -> execute()){
		while($data=$req->fetch()){
			
			$disciplines_array[] = array($data['nom'],$data['id']);
		}
		
	}
	
	/*public */
	$sql = 'SELECT * FROM public';
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
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<title>Ajout</title>

<link href="assets/css/modifier.css" rel="stylesheet" media="screen">
</head>

<body>

<h1> Ajout d'un atelier </h1>


<p>Veuillez renseigner tout les champs ci-dessous.
<section id="ajout_atelier">

<form method="post" action="ajout-handler.php">
<?php
	$inputs = '
	<div class="input_info">Titre</div>
	<input maxlength="300" type="text" name="titre"/>
	<div class="input_info">Thème</div>
	<input maxlength="300" type="text" name="theme"/>
	<div class="input_info">Type</div>
	<input maxlength="300" type="text" name="type"/>
	<div class="input_info">Dates</div>
	<div>';
	
	foreach($dates_array as $da){
		$inputs .=  '
		<div>
		<input type="checkbox" name="dates[]" id="date'.$da[1].'" value="'.$da[1].'"';
		$inputs.='>
		<label for="date'.$da[1].'">'.$da[0].'</label>
			</div>';
			}
	
	$inputs .='</div>
	<div class="input_info">Lieu</div>
	<textarea name="lieu"></textarea>
	<div class="input_info">Durée</div>
	<input maxlength="50" type="text" name="duree"/>
	<div class="input_info">Capacité</div>
	<input type="int" name="capacite"/>
	<div class="input_info">Inscription</div>
	<input maxlength="100" type="text" name="inscription"/>
	<div class="input_info">Résumé</div>
	<textarea name="resume"></textarea>
	<div class="input_info">Animateur</div>
	<input maxlength="300" type="text" name="animateur"/>
	<div class="input_info">Partenaires</div>
	<input maxlength="500" type="text" name="partenaires"/>
	
	<div class="input_info">Public visé</div>
	<div>';
	foreach($public_array as $da){
		$inputs .=  '
		<div>
		<input type="checkbox" name="public[]" id="public'.$da[1].'" value="'.$da[1].'"';
		$inputs.='>
		<label for="public'.$da[1].'">'.$da[0].'</label>
			</div>';
			}
	
	$inputs .='</div><div class="input_info">Disciplines scolaires visées</div><div>';
	foreach($disciplines_array as $da){
		$inputs .=  '
		<div>
		<input type="checkbox" name="disciplines[]" id="disciplines'.$da[1].'" value="'.$da[1].'"';
		$inputs.='>
		<label for="disciplines'.$da[1].'">'.$da[0].'</label>
			</div>';
			}
	echo $inputs;
	?>
<input type="submit" value="Enregistrer"/>
</form>

<a href ="accueil.php">Annuler </a>
</div>


</section>

    </body>

    </form>

</html>
