#Ce fichier contient des requêtes préparées. Il faut les préparer dans les fichiers php, ce fichier ne répertorie que les codes des requetes qui seront utiles.

##################################### Sélection #####################################

#Récupère tous les ateliers
Select * from Ateliers;

#Récupère toutes les infos sur l'atelier à afficher
Select * from Ateliers where id = ?;

#Récupère les dates auxquelles un atelier est prévu. Passer l'id de l'atelier en paramètre, possibilité de rajouter des arguments
Select dates from Dates where Dates.id in (?);

#Récupère le(s) laboratoire(s) d'un atelier. Passer l'id de l'atelier en paramètre
select nom From Laboratoires where id in (Select laboratoire_id from Ateliers where id = ?);

#Récupère les différents publics visés par un atelier, possibilité de rajouter des arguments
Select nom from Public where id in (?);

#Récupère la/les discipline(s) auxquelles appartient un atelier.
Select nom from Disciplines where id in (?);

#Récupérer la liste des labos pour afficher dans un menu déroulant
select nom from Laboratoires;

#Récupère l'ID du laboratoire sélectionné
select id from Laboratoires where nom like "%?%";
##################################### Modification #####################################

#Requête pour update la table atelier. Passer tout les champs de la table en paramètre (réenregistre toute la ligne pour être plus simple à utiliser)
Update Ateliers
Set titre = ?, 
theme = ?,
typeAtelier = ?,
lieu = ?,
duree = ?,
capacite = ?,
inscription = ?,
resumeAtelier = ?,
animateur = ?,
partenaires = ?,
dates = ?,
disciplines = ?,
public = ?,
laboratoire_id = ?
Where id = ?;


##################################### Suppression #####################################

#Requête pour supprimer un atelier.
delete from Ateliers where id = ?;


##################################### Ajout #####################################

#Requetes pour ajouter un atelier.

INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, dates, disciplines, public, laboratoire_id) VALUE
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
