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
   CATEGORIEADMIN       bool not null,
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
   LOGINCLIENT          varchar(20) not null,
   MDPCLIENT            varchar(32) not null,
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
   EAN                  bigint,
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
";


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
         Where lblcategorie = NEW.lblcategorie 
         AND categorieadmin = NEW.categorieadmin) > 0) THEN
            SIGNAL SQLSTATE '45002' 
            SET MESSAGE_TEXT = 'Erreur : la cateegorie existe deja.';
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


$rep=$bdd->prepare("INSERT INTO CATEGORIE (lblcategorie, categorieadmin) VALUES 
('fruit', true),('legume', true),('boisson', true),('bio', true),('conserve', true),('sec', true),('surgele', true),('hygienne', true),('autre', true);");
$rep->execute();
