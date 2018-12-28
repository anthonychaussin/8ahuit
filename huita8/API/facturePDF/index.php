<?php
function MakeFacture($factureList)
{
require('facturePDF.php');
// #1 initialise les informations de base
// adresse de l'entreprise qui émet la facture
$adresse = "8 à Huit\nImmeuble Jardin Cascade - Les Arcs 1950\n73700 Bourg-Saint-Maurice\n\nspar1950@wanadoo.fr\n(+33) 4 79 00 69 72";
// initialise l'objet facturePDF
$pdf = new facturePDF($adresse, '', "");
// défini le logo
$pdf->setLogo('https://noahcatalog1.blob.core.windows.net/img/74752439-0bd9-4c2c-9117-f4a050044133.jpg');
// entete des produits
$pdf->productHeaderAddRow('Fait', 10, 'L');
$pdf->productHeaderAddRow('Produit', 95, 'L');
$pdf->productHeaderAddRow('Prix Unité', 25, 'C');
$pdf->productHeaderAddRow('QTE', 15, 'C');
$pdf->productHeaderAddRow('Prix TTC', 25, 'R');
// entete des totaux
$pdf->totalHeaderAddRow(30, 'L');
$pdf->totalHeaderAddRow(30, 'R');
// element personnalisé
//$pdf->elementAdd('', 'traitEnteteProduit', 'content');

// #2 Créer une facture
// numéro de facture, date, texte avant le numéro de page
// produit
	foreach ($factureList as $key => $facture) {
		$name = (str_replace(' ', '_',$facture->client[0])); 
			$$name = new facture($facture->client . 'resa =' . $facture->Nresa);
		foreach ($facture->productLst as $key => $product) {
			$$name->productAdd($product);
		}
		$pdf->factureAdd($$name);		
	}
	require('gabarit1.php');
// #4 Finalisation
// construit le PDF
$pdf->buildPDF();
// télécharge le fichier
$pdf->Output();
}
?>