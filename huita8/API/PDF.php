<?php
require'facturePDF/facture.php';
include 'facturePDF/index.php';

$facture1 = new Facture('Patrick Brush');
$facture1->Nresa = '14856F45';
$facture1->productAdd(['', 'Brosse à dents', '2,46 €', '1', '2,46 €']);
$facture1->total = ['Total TTC', '2,46 €'];

$facture2 = new Facture('Sebastien R');
$facture2->productAdd(['', 'Tomates', '2,46 €', '1', '2,46 €']);
$facture2->productAdd(['', 'Papier Toilette', '2,46 €', '1', '2,46 €']);
$facture2->productAdd(['', 'Shampoing', '2,46 €', '1', '2,46 €']);
$facture2->Nresa = '14856F46';
$facture2->total = ['Total TTC', '2,46 €'];

MakeFacture([$facture1, $facture2]);