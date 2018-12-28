<?php

global $bdd;

//$bdd = new PDO("pgsql:host=10.103.1.202/phppgadmin/;port=5432;dbname=huitahuit", "huitahuit", "groupe1");

//$bdd = new PDO("mysql:host=localhost;dbname=faverow", "faverow", "jHtpUv");

//$bdd = new PDO("mysql:host=localhost;dbname=id7005313_spar", "id7005313_groupe1", "groupe1");

//$bdd = new PDO("mysql:host=10.103.1.202/phpmyadmin;dbname=huitahuit", "huitahuit", "groupe1");

$bdd = new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1");

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
   LBLCATEGORIE         varchar(20),
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
   MDPCLIENT            varchar(20) not null,
   MAILCLIENT           varchar(40) not null,
   NUMERORESERVATION    int not null,
   COMPTEDEFINITIF      bool not null,
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
   LBLPRODUIT           varchar(40),
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


";


$reqsql = array();
$reqsql = explode(";", $sql);

foreach ($reqsql as $unereqsql) {
   $rep = $bdd->prepare($unereqsql);
   $rep->execute();
   //var_dump($bdd->errorInfo());
}
