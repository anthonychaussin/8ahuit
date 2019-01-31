//anthony chaussin NE PAS TOUCHER !!!!!!

function escapeHTML(text) {return text.replace(/[&<>"']/g, function(m) { return {'&':' et ','<': ' ','>':' ','"':' ',"'": ' '}[m];});}
function reade(idInputFile = "fichier", idSortie = "sortie") {
	document.getElementById("bar2").style.width = "0%";
	document.getElementById("load").style.display = "block";
	document.getElementById("wait").style.display = "block";
	var temp = document.getElementById('fichier');
	const regex = /h4>(.*)<\/h4|pan>(\d*)<\/spa|<li>([a-z ./A-Z]*)<\/li>|\s*url[/*/*/*/]|\/(.*)\);/gmiu;
	var entree, fichier, fr, resultat;
	var compt = 0;
    if (typeof window.FileReader !== "function") {alert("L’API file n’est pas encore supportée par votre navigateur.");}
    entree = document.getElementById(idInputFile);
    if (!entree.files[0]) { alert("S’il vous plaît sélectionnez un fichier avant de cliquer sur «Chargement».");} 
    else 
    {   	
        fichier = entree.files[0];
        fr = new FileReader();
        fr.onload = function () 
        {
        	let m;
        	var compt = 0;
        	var fin = false;
        	var nb = 1;
        	var cat, tmp, nbcat, ean, produit, cadencier;
            temp = 0;
            nbcat = 0;
            cadencier = '[';
            while ((m = regex.exec(fr.result)) !== null) 
            {
        		if (m.index === regex.lastIndex) {regex.lastIndex++;}
   				m.forEach((match, groupName) => 
   				{
   					if (match != null && groupName != 0) {
	   				match = escapeHTML(match);
	    			switch(groupName)
	    			{
		    			case 1:
		    			compt++;
		    			document.getElementById('sortie').innerHTML = compt + " Produit détéctés";
		    			produit = (`"produit":"${match}"`);
		    			break;

		    			case 2:
		    			ean = `"ean":"${match}"`;
		    			break;

		    			case 4:
		    			image = `"image":"${match}"`;
		    			break;

		    			default:
		    			if (tmp != compt) {cat = '"cat":[';}
		    			cat += `"${match}",`;
		    			tmp = compt;
		    			break;
	    			}
	    		}
    			});
    			if (produit != null && ean != null && cat != null)
    			{
    				if(compt%100 == 0 && compt != 0)
		    		{
			    		getHTTPPost('http://10.103.1.202/~huitahuit/huita8/API/recupProd.php',encodeURI(cadencier.substring(0,cadencier.length-1)+']'), 
		    			function(element)
		    			{
		    				nb = nb + 100;
		    				if (!fin){document.getElementById("bar2").style.width = ((nb / parseInt(document.getElementById("sortie").innerHTML)) * 100) + '%';}
							if (element.toString().lenght > 1) 
							{
								console.error(element);
								var outPut = document.getElementById("erreur");
								if (outPut.innerHTML == null) {	outPut.innerHTML = "Une erreur c'est produite";}
							}
						});
			    		cadencier = '[';
			    	}
					cadencier += ("{"+produit+","+ean+","+image+","+cat.substring(0,cat.length-1)+"]},");
					produit=null;ean=null;
    			}
			}
		getHTTPPost('http://10.103.1.202/~huitahuit/huita8/API/recupProd.php',encodeURI(cadencier.substring(0,cadencier.length-1)+']'), 
		function(element)
		{
			fin = true;
			document.getElementById("load").style.display = "none";
			document.getElementById("wait").style.display = "none";
			document.getElementById("bar2").style.width = '100%';
			if (element.toString().lenght > 1) { console.error(element);var outPut = document.getElementById("erreur");
				if (outPut.innerHTML == null) {	outPut.innerHTML = "Une erreur c'est produite";}}			
		});
	}
	fr.readAsText(fichier);
	document.getElementById("bar1").style.display = "block";
	}
}

function searchImg($content){
getHTTPGet("imageSearch.php/?query=" + encodeURI($content)).then(function (response) {document.getElementById($content).innerHTML = "<a href=\""+response+"\"></a>";});}

function getHTTPGet(url, success) {//appel ajax
    return new Promise(function (success) {
        var b = new XMLHttpRequest();
        b.open("GET", url);
        b.onload = function() {if (this.status >= 200 && this.status < 300) {success(b.response);}};
        b.send();});}

function getHTTPPost(url, data, success) {
    var b=window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    b.open('POST', url);
    b.onreadystatechange = function() { if (b.readyState>3 && b.status>=200) { success(b.responseText);}};
    b.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    b.send('produit='+data);
}