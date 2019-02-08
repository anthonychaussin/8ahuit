<?php

/*Gruaz Johan*/

global $bdd;

//$bdd = new PDO("pgsql:host=10.103.1.202/phppgadmin/;port=5432;dbname=huitahuit", "huitahuit", "groupe1");

//$bdd = new PDO("mysql:host=localhost;dbname=faverow", "faverow", "jHtpUv");

//$bdd = new PDO("mysql:host=localhost;dbname=id7005313_spar", "id7005313_groupe1", "groupe1");

//$bdd = new PDO("mysql:host=10.103.1.202/phpmyadmin;dbname=huitahuit", "huitahuit", "groupe1");



/*COPIER UNIQUEMENT CETTE LIGNE pour utiliser la bdd, et appeller les fonctions dans fonctionsBDD.php*/
$bdd = new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1");



/*PAS TOUCHER*/
$sql = "
/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  25/09/2018 17:26:38                      */
/*==============================================================*/


drop table if exists APPARTIEN_A;

drop table if exists CATEGORIE;

drop table if exists CONTIENT;

drop table if exists FACTURE;

drop table if exists CLIENT;

drop table if exists PRODUIT;

drop table if exists MESURE;

/*==============================================================*/
/* Table : APPARTIEN_A                                          */
/*==============================================================*/
create table APPARTIEN_A
(
   IDPRODUIT            INT NOT NULL,
   IDCATEGORIE          INT NOT NULL,
   primary key (IDPRODUIT, IDCATEGORIE)
);

/*==============================================================*/
/* Table : CATEGORIE                                            */
/*==============================================================*/
create table CATEGORIE
(
   IDCATEGORIE          INT NOT NULL AUTO_INCREMENT,
   LBLCATEGORIE         varchar(40),
   CATEGORIEFILLE       bool not null,
   IDCATEGORIEMERE      INT,
   primary key (IDCATEGORIE)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   IDCLIENT             INT NOT NULL AUTO_INCREMENT,
   NOMCLIENT            varchar(20) not null,
   PRENOMCLIENT         varchar(20) not null,
   MDPCLIENT            varchar(50) not null,
   MAILCLIENT           varchar(40) not null,
   NUMERORESERVATION    int not null,
   COMPTEDEFINITIF      bool not null,
   TELEPHONE            char(10),
   primary key (IDCLIENT)
);

/*==============================================================*/
/* Table : CONTIENT                                             */
/*==============================================================*/
create table CONTIENT
(
   IDFACTURE            INT NOT NULL,
   IDPRODUIT            INT NOT NULL,
   QUANTITE				INT NOT NULL,
   primary key (IDFACTURE, IDPRODUIT)
);

/*==============================================================*/
/* Table : FACTURE                                              */
/*==============================================================*/
create table FACTURE
(
   IDFACTURE            INT NOT NULL AUTO_INCREMENT,
   IDCLIENT             int,
   DATECREATIONFACTURE  date not null,
   REGLEE				bool,
   primary key (IDFACTURE)
);

/*==============================================================*/
/* Table : MESURE                                               */
/*==============================================================*/
create table MESURE
(
   IDMESURE             INT NOT NULL AUTO_INCREMENT,
   LBLMESURE            varchar(20),
   primary key (IDMESURE)
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT
(
   IDPRODUIT            INT NOT NULL AUTO_INCREMENT,
   IDMESURE             INT,
   LBLPRODUIT           varchar(70),
   DETAILPRODUIT        text,
   PRIX                 decimal(3,2),
   POURCENTAGEPRESENCE  smallint,
   REMISE               decimal,
   CHEMINIMAGE          varchar(75),
   PRESENT              bool,
   primary key (IDPRODUIT)
);

alter table APPARTIEN_A add constraint FK_APPARTIEN_A foreign key (IDCATEGORIE)
      references CATEGORIE (IDCATEGORIE) on delete restrict on update restrict;

alter table APPARTIEN_A add constraint FK_APPARTIEN_A2 foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT) on delete restrict on update restrict;

alter table CONTIENT add constraint FK_CONTIENT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT) on delete restrict on update restrict;

alter table CONTIENT add constraint FK_CONTIENT2 foreign key (IDFACTURE)
      references FACTURE (IDFACTURE) on delete restrict on update restrict;

alter table FACTURE add constraint FK_EST_LIE_A foreign key (IDCLIENT)
      references CLIENT (IDCLIENT) on delete restrict on update restrict;

alter table PRODUIT add constraint FK_EST_DEFINI_EN foreign key (IDMESURE)
      references MESURE (IDMESURE) on delete restrict on update restrict;

create index idproduit_index ON PRODUIT (IDPRODUIT(INT));

create index idproduit_index ON CATEGORIE (IDCATEGORIE(INT));
ALTER TABLE `CLIENT` ADD `ARRIVCLIENT` DATE NOT NULL AFTER `TELEPHONE`, ADD `DEPARTCLIENT` DATE NOT NULL AFTER `ARRIVCLIENT`;
ALTER TABLE `CLIENT` CHANGE `NUMERORESERVATION` `NORESACLIENT` INT(11) NOT NULL;
ALTER TABLE `CLIENT` CHANGE `COMPTEDEFINITIF` `ARCHICLIENT` TINYINT(1) NOT NULL;
ALTER TABLE `CLIENT` CHANGE `TELEPHONE` `TELCLIENT` CHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `CLIENT` CHANGE `IDCLIENT` `idclient` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `NOMCLIENT` `nomclient` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `PRENOMCLIENT` `prenomclient` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `LOGINCLIENT` `loginclient` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `MDPCLIENT` `mdpclient` VARCHAR(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `MAILCLIENT` `mailclient` VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `NORESACLIENT` `noresaclient` INT(11) NOT NULL, CHANGE `ARCHICLIENT` `archiclient` TINYINT(1) NOT NULL, CHANGE `TELCLIENT` `telclient` CHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `ARRIVCLIENT` `arrivclient` DATE NOT NULL, CHANGE `DEPARTCLIENT` `departclient` DATE NOT NULL;";


$reqsql = array();
$reqsql = explode(";", $sql);


foreach ($reqsql as $unereqsql) {
   $rep = $bdd->prepare($unereqsql);
   $rep->execute();
   //var_dump($bdd->errorInfo());
}


$rep=$bdd->prepare("INSERT INTO MESURE (lblmesure) VALUES 
('uni'),('kg');");
$rep->execute();

/*
$rep=$bdd->prepare("DELIMITER $$
CREATE TRIGGER uniquecategorie BEFORE INSERT 
ON CATEGORIE FOR EACH ROW
    BEGIN
        IF ((SELECT count(*)
         FROM CATEGORIE
         Where lblcategorie = NEW.lblcategorie 
         AND categorieadmin = NEW.categorieadmin) > 0) THEN
            SIGNAL SQLSTATE '45002' 
            SET MESSAGE_TEXT = 'Erreur : la cateegorie existe deja.';
        END IF;
END $$
DELIMITER;");
$rep->execute();
var_dump($bdd->errorInfo());

$rep=$bdd->prepare("DELIMITER $$
CREATE TRIGGER uniqueproduit BEFORE INSERT 
ON PRODUIT FOR EACH ROW 
BEGIN 
  IF ((SELECT count(*) 
         FROM categorie 
         Where lblproduit = NEW.lblproduit) > 0) THEN 
    SIGNAL SQLSTATE '45001' 
        SET MESSAGE_TEXT = 'Erreur : le produit existe deja.';
    END IF;
END $$
DELIMITER ;");
$rep->execute();
var_dump($bdd->errorInfo());*/


$rep=$bdd->prepare("
CREATE TRIGGER uniquecategorie BEFORE INSERT 
ON CATEGORIE FOR EACH ROW
  BEGIN
    IF ((SELECT count(*)
         FROM CATEGORIE
         Where lblcategorie = NEW.lblcategorie ) > 0) THEN
      SIGNAL SQLSTATE '45002' 
          SET MESSAGE_TEXT = 'Erreur : la categorie existe deja.';
    END IF;
END");
$rep->execute();
var_dump($bdd->errorInfo());

$rep=$bdd->prepare("
CREATE TRIGGER uniqueproduit BEFORE INSERT 
ON PRODUIT FOR EACH ROW 
BEGIN 
  IF ((SELECT count(*) 
         FROM PRODUIT 
         Where lblproduit = NEW.lblproduit) > 0) THEN 
    SIGNAL SQLSTATE '45001' 
        SET MESSAGE_TEXT = 'Erreur : le produit existe deja.';
    END IF;
END");
$rep->execute();
var_dump($bdd->errorInfo());

$rep=$bdd->prepare("
CREATE TRIGGER idcategoriemereobli BEFORE INSERT 
ON CATEGORIE FOR EACH ROW 
BEGIN 
  IF (NEW.categoriefille = 1 AND NEW.idcategoriemere IS NULL ) THEN 
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Erreur : id cat mere obligatoire';
  END IF;
END");
$rep->execute();
var_dump($bdd->errorInfo());


$rep=$bdd->prepare("INSERT INTO CATEGORIE (lblcategorie, CATEGORIEFILLE) VALUES 
('Cremerie', false),('Episserie Sucre', false),('Fruit et legume', false),('Episserie sale', false),('Produit du monde', false),('Produit bio', false),('Boisson et cave à vin', false),('Produit menage et hygienne', false);");
$rep->execute();

$rep=$bdd->prepare("INSERT INTO CATEGORIE (lblcategorie, CATEGORIEFILLE, idcategoriemere) VALUES 
('Fromage', true, (SELECT c.IDCATEGORIE FROM CATEGORIE c WHERE lblcategorie='Cremerie'));");
$rep->execute();
