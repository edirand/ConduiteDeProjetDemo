Drop database CNRSBDD;

Create database CNRSBDD;

use CNRSBDD;

CREATE TABLE IF NOT EXISTS Laboratoires
(id int unsigned not null auto_increment primary key,
nom varchar(250)
);

#Obligé d'utiliser un varchar ici pour avoir des dates cohérentes avec le cahier des charges
CREATE TABLE IF NOT EXISTS Dates
(id int unsigned not null auto_increment primary key,
dates varchar(100));

CREATE TABLE IF NOT EXISTS Disciplines(
id int unsigned not null auto_increment primary key,
nom varchar(200));

CREATE TABLE IF NOT EXISTS Public(
id int unsigned not null auto_increment primary key,
nom varchar(200)
);

CREATE TABLE IF NOT EXISTS Ateliers(
id int unsigned not null auto_increment primary key,
titre varchar(300),
theme varchar(300),
typeAtelier varchar(300),
lieu varchar(300),
duree varchar(50),
capacite int,
inscription varchar(100),
resumeAtelier varchar(1000),
animateur varchar(300),
partenaires varchar(500),
laboratoire_id int unsigned not null,
FOREIGN KEY (laboratoire_id) REFERENCES Laboratoires(id));

CREATE TABLE IF NOT EXISTS AteliersDates(
id int unsigned not null auto_increment primary key,
atelier_id int unsigned not null,
date_id int unsigned not null,

FOREIGN KEY (atelier_id) REFERENCES Ateliers(id) ON DELETE CASCADE,
FOREIGN KEY (date_id) REFERENCES Dates(id));

CREATE TABLE IF NOT EXISTS AteliersPublic(
id int unsigned not null auto_increment primary key,
atelier_id int unsigned not null,
public_id int unsigned not null, 

FOREIGN KEY (atelier_id) REFERENCES Ateliers(id) ON DELETE CASCADE,
FOREIGN KEY (public_id) REFERENCES Public(id));

CREATE TABLE IF NOT EXISTS AteliersDiscipline(
id int unsigned not null auto_increment primary key,
atelier_id int unsigned not null,
discipline_id int unsigned not null, 

FOREIGN KEY (atelier_id) REFERENCES Ateliers(id) ON DELETE CASCADE,
FOREIGN KEY (discipline_id) REFERENCES Disciplines(id));


