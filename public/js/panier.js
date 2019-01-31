var DansLePanier = [];
function lepanier(idprod) {
	//cherche un element dans un element+
	var nbProduit = ($("#" + idprod + "_container")[0]).querySelector(".nb-produit input").value;
	console.log(idprod)
	console.log(nbProduit)
	DansLePanier.push(idprod,nbProduit)
	console.log(DansLePanier);
}