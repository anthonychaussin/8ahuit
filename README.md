<h1>8 à Huit - Les Arc 1950</h1>
<article>
<h2>Présentation</h2>
<div>
Ceci est le site de e-commerce du magasin 8 à Huit des Arc 1950.
C'est un projet de développement web composer d'un architecture micro-framwork.
Vous trouverez ci-dessous, les instruction pour mettre en place ce projet sur n'importe quel serveur.
Vous trouverez également les détails et instructions concernant le projet pour le continuer.
</div>
</article>
<article>
<h2>Sommaire</h2>
<ul>
<a href="#instal"><li>Installation</li></a>
<ul>
<a href="#ddl"><li>Mise en place</li></a>
<a href="#base"><li>Base de donée</li></a>
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
<span>ATTENTION tout les lien proposé ci-desous sont pour un ordinateur Windows</span>
<br><br>
<div>
Pour commencer il faut télécharger le fichier zip du projet via <a href="">ce lien</a>.
Dézipper le fichier en faisant click droit dézipper ou avec <a href="https://www.7-zip.org/a/7z1900.exe">7zip</a>
<br><br>
Aller sur votre hébergeur. S'il proposer un service de transfère de fichier vous pouver directement placer le contenu précédement dézipper dans votre éspace de fichier sur votre hébergeur.
Sinon il vous faudra télécharger un client FTP comme <a href="https://dl2.cdn.filezilla-project.org/client/FileZilla_3.41.2_win32-setup.exe?h=XPbVqsko3KXY-wV8UvtJ_A&x=1553795918">FilZilla</a>
Lancez le logiciel ftp et connectez vous à l'aide de vos identifiant fournis par votre hébergeur.
Puis transféré le contenu précédement dézipper sur votre hébergeur.
<br><br>
<span>Bravo le site web et presuqe près à fonctionner !</span>
</div>
</div>
<div>
<h3 id="base">Base de donée</h3>
<div>
Il va maintenant faloir aller sur votre base de donnée sur votre hébergeur.
Regarder dans votre page client d'hébergeur comment accéder à votre base de donnée aussi appelé SGBD.
Connectez vous et cliquer sur le bouton SQL.
Téléchagez ce fichier et ouvrez le avec n'importe quel éditeur de text.
Copier le contenu et coller le dans l'espace de saisie de text qui c'est présentez à vous lorsque vous avez cliquer sur SQL dans votre base de donnée.
Cliquez sur exécuter.
<br><br>
Bien c'est presque fini
<br><br>
Retourné à votre espace de fichier sur votre hébergeur ou sur votre client FTP.
Allez dans app et ouvrez le fichier Db.php et ajouter le code suivant en suivant les instruction si après :
<br><br>
<code>case "wwwwwwwwwww":</code>
<code>$this->dbString = new PDO("mysql:host=localhost;dbname=xxxxxxxxxxxx", "yyyyyyyyy", "zzzzzzzzz");</code>
<code>break;</code>
<br><br>
vous devez remplacer :<br><br>
wwwwwwwww -> le nom de domaine de votre site ( ex: spar1950g1.000webhostapp.com).<br><br>
xxxxxxxxx -> le nom de votre base de donnée. Le plus souvent il est indiquer dans l'espace client de votre hébergeur ou tout en haut de la page de la base de donnée où vous avez cliqez sur SQL tout à l'heure. <br><br>
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
Concernant les information de connection en temps qu'administrateur elles vous ont été envoyé par e-mail pour des raison de sécurité.
</div>
</div>
</article>
