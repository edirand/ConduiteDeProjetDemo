#Ce fichier contient des requêtes préparées. Il faut les préparer dans les fichiers php, ce fichier ne répertorie que les codes des requetes qui seront utiles.

##################################### Sélection #####################################

#Récupère tous les ateliers
Select * from Ateliers;

#Récupère les dates auxquelles un atelier est prévu. Passer l'id de l'atelier en paramètre
Select dates from Dates where Dates.id in (Select date_id from AteliersDates where atelier_id = ?);

#Récupère le(s) laboratoire(s) d'un atelier. Passer l'id de l'atelier en paramètre
select nom From Laboratoires where id in (Select laboratoire_id from Ateliers where id = ?);

#Récupère les différents publics visés par un atelier
Select nom from Public where id in (Select public_id from AteliersPublic where atelier_id = ?);

#Récupère la/les discipline(s) auxquelles appartient un atelier.
Select nom from Disciplines where id in (Select discipline_id from AteliersDiscipline where atelier_id = ?);



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
laboratoire_id = ?
Where id = ?;

#Requetes pour mettre à jour les dates auxquelles un atelier est proposé. Supprime les enregistrements et les recréé avec les bonnes dates. Utiliser les 2 requêtes !
delete from AteliersDates where atelier_id = ?; #Supprime les enregistrements
Insert into AteliersDates(atelier_id, date_id) Value(?, ?); #Recréé les enregistrements avec les bonnes dates. Possible de rajouter des valeurs en modifiant Value(?,?); en Values(?,?), (?,?); etc

#Requêtes pour mettre à jour le(s) public(s) visé(s) par un atelier. Supprime les enregistrement et les recréé avec les nouvelles valeurs. Utiliser les 2 requetes !
delete from AteliersPublic where atelier_id = ?; #Supprime les enregistrements
Insert into AteliersPublic(atelier_id, public_id) Value(?, ?); #Recréé les enregistrements avec les bons publics. Possible de rajouter des valeurs en modifiant Value(?,?); en Values(?,?), (?,?); etc

#Requêtes pour mettre à jour la/les discipline(s) d'un atelier. Supprime les enregistrements et les recréé avec les nouvelles valeurs. Utiliser les 2 requêtes !
delete from AteliersDiscipline where atelier_id = ?; #Supprime les enregistrements
Insert into AteliersDiscipline(atelier_id, discipline_id) value (?, ?); #Recréé les enregistrements avec les bonnes disciplines. Possible de rajouter des valeurs en modifiant Value(?,?); en Values(?,?), (?,?); etc


##################################### Suppression #####################################

#Requête pour supprimer un atelier. Supprime en cascade les enregistrements qui prennent l'atelier en référence
delete from Ateliers where id = ?;


##################################### Ajout #####################################

#Requetes pour ajouter un atelier. Utiliser toutes les requêtes ci dessous !
INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, laboratoire_id) VALUE
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);

#Répertories les dates auxquelles l'atelier exemple est proposé
INSERT INTO AteliersDates(atelier_id, date_id) Value  #Modifier Value(?,?); en Values(?,?), (?,?) pour ajouter plusieurs lignes
(?, ?);

#Définie la discipline à laquelle appartient l'atelier exemple
INSERT INTO AteliersDiscipline(atelier_id, discipline_id) Value #Modifier Value(?,?); en Values(?,?), (?,?) pour ajouter plusieurs lignes
(?, ?);

#Définie les différents publics visés par l'atelier exemple
INSERT INTO AteliersPublic(atelier_id, public_id) VALUE #Modifier Value(?,?); en Values(?,?), (?,?) pour ajouter plusieurs lignes
(?, ?);

