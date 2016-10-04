<?php

 if (isset($_POST['creerBut']))
 {
 	try{
 		$pdoconnect = new PDO("mysql:host=localhost; dbname=CNRSBDD; charset=utf8", "root","");
 	
 	 } catch(Exception $err)
 	 	{
 		echo $err->getTraceAsString();
 		exit();
   	    }
   	 $titre=$_POST['titre'];
   	 $theme=$_POST['theme'];
   	 $type=$_POST['type'];
   	 $lieu=$_POST['lieu'];
   	 $duree=$_POST['duree'];
   	 $capacite=$_POST['capacite'];
   	 $inscription=$_POST['inscription'];
   	 $resume=$_POST['resume'];
   	 $animateur=$_POST['animateur'];
   	 $partenaire=$_POST['partenaire'];
   	 $id_lab = 1;
   	 

   	 $pdoQuerry = "INSERT INTO `ateliers`(`titre`, `theme`, `typeAtelier`, `lieu`, `duree`, `capacite`, `inscription`, `resumeAtelier`, `animateur`, `partenaires`,`laboratoire_id`) VALUES (:titre, :theme, :type, :lieu, :duree, :capacite, :inscription, :resume, :animateur, :partenaire, :id_lab)";

   	 $pdoResult = $pdoconnect->prepare($pdoQuerry);
   	 $pdoExec = $pdoResult->execute(array(":titre"=>$titre, ":theme"=>$theme, ":type"=>$type, ":lieu"=>$lieu, ":duree"=>$duree, ":capacite"=>$capacite, ":inscription"=>$inscription, ":resume"=>$resume, ":animateur"=>$animateur, ":partenaire"=>$partenaire, ":id_lab"=>$id_lab));

   	 if ($pdoExec)
   	 {
   	 	echo 'ok';
   	 }
   	 else {
   	 	echo 'ko';
   	 }

 }



?>

<!DOCTYPE html>
<html lang="fr">
<form method="POST"	>
    <head>	
	<meta charset="UTF-8">
		
	<title> Ajout </title>
	
	<link href="assets/css/accueil.css" rel="stylesheet" media="screen">
    </head>

    <body>
	
	<center>
		<p> Veuillez renseigner les champs suivants concernant l'atelier : <br /><br />
		<table cellspacing="10">
		<tr>
			<td><label for="titreAt"> Titre : </label></td>
			<td><input type="text" name="titre" id="titre"/></td>			
		</tr>
		<tr>
			<td><label for="themeAt"> Thème : </label></td>
			<td><input type="text" name="theme" id="theme"/></td>			
		</tr>
		<tr>
			<td><label for="typeAt"> Type : </label></td>
			<td><input type="text" name="type" id="type"/></td>			
		</tr>
		<tr>
			<td><label for="lieuAt"> Lieu : </label></td>
			<td><input type="text" name="lieu" id="lieu"/></td>			
		</tr>
		<tr>
			<td><label for="dureeAt"> Durée : </label></td>
			<td><input type="number" name="duree" id="duree"/></td>			
		</tr>
			<td><label for="capaciteAt"> Capacité : </label></td>
			<td><input type="number" min="1" name="capacite" id="capacite"/></td>
		<tr>	
			<td><label for="inscriptionAt"> Inscription : </label></td>
			<td><input type="text" name="inscription" id="inscription"/></td>
		</tr>	
			<td><label for="resumeAt"> Résumé : </label></td>
			<td><input type="text" name="resume" id="resume"/></td>
		<tr>	
			<td><label for="animateurAt"> Animateur : </label></td>
			<td><input type="text" name="animateur" id="animateur"/></td>
		</tr>
		<tr>	
			<td><label for="partenairesAt"> Partenaires : </label></td>
			<td><input type="text" name="partenaire" id="partenaire"/></td>
		</tr>
		<tr> 
		<td><input type="submit" value="Créer" name="creerBut" ></input></td>
		</tr>
		</table>

		</p>
	</center>



    </body>

    </form>

</html>