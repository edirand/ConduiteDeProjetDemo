#Script permettant d'ajouter des données afin d'avoir des résultats à tester

#Permet d'avoir quelques disciplines pour tester
INSERT INTO Disciplines(nom) VALUES
('Chimie'),
('Physique'),
('Informatique'),
('Mathématique');

#Permet d'avoir un labo pour tester
INSERT INTO Laboratoires(nom) VALUE
('Centre de Recherche Paul Pascal, CNRS');

#Rempli les différentes dates possibles pour les évènnements
INSERT INTO Dates(dates) values
('Lundi matin'),
('Lundi après midi'),
('Mardi matin'),
('Mardi après midi'),
('Mercredi matin'),
('Mercredi après midi'),
('Jeudi matin'),
('Jeudi après midi'),
('Vendredi matin'),
('Vendredi après midi');

#Rempli les différents publics possibles définis dans le cahier des charges
INSERT INTO Public(nom) VALUES
('Primaires'),
('6ieme 5ieme'),
('4ieme 3ieme'),
('2nde'),
('1ere'),
('Tale'),
('Classes préparatoires'),
('Université');

#Rempli la table avec l'atelier exemple proposé dans le cahier des charges
INSERT INTO Ateliers(titre, theme, typeAtelier, lieu, duree, capacite, inscription, resumeAtelier, animateur, partenaires, laboratoire_id) VALUES
('Liquides durs et solides mous', 'Découverte des fluides complexes, gels, matériaux granulaires...', 'Atelier scientifique',
'Centre de Recherche Paul Pascal (CRPP), CNRS, 115 Avenue du Dr Schweitzer, 33600 Pessac\nZone D : atelier situé entre Doyen 
Brus et Montaigne-Montesquieu', '30 min', 12, 'Sur réservation', 'Les fluides complexes nous accompagnent dans notre quotidien :
les shampoings, mousses et savons dans notre salle de bains, le dentifrice, les mayonnaises ou autres émulsions dans la cuisine...\n
Que sont-ils ? Ce sont des fluides qui se comportent, selon les circonstances, comme un liquide ou comme un solide. Nous proposons,
à l\'aide d\expériences simples, de montrer et expliquer les propriétés spectaculaires de quelques fluides complexes.', 
'Martin Depardieu (doctorant)\n Christophe Coutant (doctorant)', '', 1);

#Répertories les dates auxquelles l'atelier exemple est proposé
INSERT INTO AteliersDates(atelier_id, date_id) Values
(1, 3),
(1, 4),
(1, 7),
(1, 8);

#Définie la discipline à laquelle appartient l'atelier exemple
INSERT INTO AteliersDiscipline(atelier_id, discipline_id) Values
(1, 1);

#Définie les différents publics visés par l'atelier exemple
INSERT INTO AteliersPublic(atelier_id, public_id) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);