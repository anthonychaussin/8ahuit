<h1 class="middle text">Mise à jour de la liste des produits</h1>
<input id="fichier" type="file" name="scrap" class="middle">
<div style="display: inline-flex;"><img id="load" src="resources/img/load.gif" class="hide" style="height: 3%;"><label id="wait" class="hide">Veuillez patienter cela peut être long</label></div><br><br>
<div id="sortie" class="middle"></div>
<div id="bar1" ><div id="bar2"></div></div>
<div id="erreur" class="middle"></div>
<input type="button" name="submit" value="Valider" class="middle" onclick="reade()">
<?php $js = ["scrap"] ?>