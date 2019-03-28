<h1>8 à Huit - Les Arc 1950</h1>
<article>
<h2>Présentation</h2>
<div>
Ceci est le site de e-commerce du magasin 8 à Huit des Arc 1950.
C'est un projet de développement web composer d'une architecture micro-framwork. 
Vous trouverez ci-dessous, les instructions pour mettre en place ce projet sur n'importe quel serveur. 
Vous trouverez également les détails et instructions concernant le projet pour le continuer.
</div>
</article>
<article>
<h2>Sommaire</h2>
<ul>
<a href="#instal"><li>Installation</li></a>
<ul>
<a href="#ddl"><li>Mise en place</li></a>
<a href="#base"><li>Base de donées</li></a>
</ul>
<li>Dévelopement</li>
<ul>
<li>L'architecture</li>
</ul>
</ul>
</article>
<article>
<h2 id="instal">Installation</h2>
<div>
<h3 id="ddl">Mise en place</h3>
<span>ATTENTION tout les liens proposés ci-desous sont pour un ordinateur Windows</span>
<br><br>
<div>
Pour commencer il faut télécharger le fichier zip du projet via <a href="">ce lien</a>.
Dé-zippez le fichier en faisant click droit "dézipper" ou avec <a href="https://www.7-zip.org/a/7z1900.exe">7zip</a>
<br><br>
Aller sur votre hébergeur. S'il propose un service de transfère de fichier vous pouvez directement placer le contenu précédement dézipper dans votre éspace de fichier sur votre hébergeur.
Sinon il vous faudra télécharger un client FTP comme <a href="https://dl2.cdn.filezilla-project.org/client/FileZilla_3.41.2_win32-setup.exe?h=XPbVqsko3KXY-wV8UvtJ_A&x=1553795918">FilZilla</a>
Lancez le logiciel ftp et connectez vous à l'aide de vos identifiant fournis par votre hébergeur.
Puis transféré le contenu précèdement dé-zippé sur votre hébergeur.
<br><br>
<span>Bravo le site web et presque près à fonctionner !</span>
</div>
</div>
<div>
<h3 id="base">Base de donées</h3>
<div>
Il va maintenant falloir aller sur votre base de données sur votre hébergeur.
Regardez dans votre page client d'hébergeur comment accéder à votre base de données aussi appelé SGBD.
Connectez vous et cliquez sur le bouton SQL.
Télécharger ce fichier et ouvrez le avec n'importe quel éditeur de text.
Copiez le contenu et collez-le dans l'espace de saisie de texte qui c'est présenté à vous lorsque vous avez cliqué sur SQL dans votre base de données.
Cliquez sur exécuter.
<br><br>
Bien c'est presque fini
<br><br>
Retournz à votre espace de fichier sur votre hébergeur ou sur votre client FTP.
Allez dans le dossier "app" et ouvrez le fichier Db.php et ajoutez le code ci-dessous en suivant les instructions ces :
<br><br>
<code>case "wwwwwwwwwww":</code>
<code>$this->dbString = new PDO("mysql:host=localhost;dbname=xxxxxxxxxxxx", "yyyyyyyyy", "zzzzzzzzz");</code>
<code>break;</code>
<br><br>
vous devez remplacer :<br><br>
wwwwwwwww -> le nom de domaine de votre site ( ex: spar1950g1.000webhostapp.com).<br><br>
xxxxxxxxx -> le nom de votre base de données. Le plus souvent il est indiqué dans l'espace client de votre hébergeur ou tout en haut de la page de la base de données où vous avez cliqué sur SQL tout à l'heure. <br><br>
yyyyyyyy -> votre login
<br><br>
zzzzzzzz -> votre mot de passe. <br><br>
Vous devez ajouter ce code juste après 'break;' et avant 'default:' à la place de la ligne '//inserer une nouvelle connexion ici' comme ceci : <br><br>
<code>break;</code>
<br><br>
<code>//inserer une nouvelle connexion ici</code>
<br><br>
<code>default:</code><br>
<code>throw new Exception("Erreur ce serveur est inconu et/ou n'est lier à aucune base de donnée", 1);</code><br>
<code>die();</code><br>
<code>break;</code><br>
<br><br>
Et voila ! C'est enfin fini votre site est prèt à fonctionner. 
Concernant les informations de connexion en tant qu'administrateur elles vous ont été envoyées par e-mail pour des raisons de sécurité.
</div>
</div>
</article>
