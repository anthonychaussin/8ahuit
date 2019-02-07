var DansLePanier = [];

function lepanier(idprod) {
	//cherche un element dans un element+
	var nbProduit = ($("#" + idprod + "_container")[0]).querySelector(".nb-produit input").value;
	console.log(idprod)
	console.log(nbProduit)
	DansLePanier.push(idprod,nbProduit)
	console.log(DansLePanier);

	getHTTPPost("./?API=panier",encodeURI(DansLePanier),console.log);

}



function getHTTPPost(url, data, success) {
    var b=window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    b.open('POST', url);
    b.onreadystatechange = function() { if (b.readyState>3 && b.status>=200) { success(b.responseText);}};
    b.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    b.send('produit='+data);
}