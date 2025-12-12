Installation et lancement :
L’environnement utilisé est XAMPP (Apache + PHP + MySQL), compatible Windows, macOS et Linux.
Avant de commencer, assurez-vous d’avoir installé :
XAMPP (Apache + MySQL).
Lien du repository : https://github.com/Lil-Power/Le-Goff-Lilian-Devoir-PHP
Placez le dossier du projet touche-pas-au-klaxon dans :
/Applications/XAMPP/xamppfiles/htdocs/ si vous êtes sur Mac ou Linux ou dans C:\xampp\htdocs\ si vous êtes sur Windows.
Ensuite sur Mysql Workbench, vous utilisez le fichier "insert-data.sql" pour créer et la base de donnée "touche-pas-au-klaxon" et y insérer les données. Utiliser LOAD DATA INFILE avec le fichiers users.txt pour insérer la liste des employés dans la tables employees.
Vérifiez que les tables suivantes existent : users, employees, agencies et trips.

Pour configurer la connexion à la base de donnée, il vous faut vous rendre dans le fichier app/core/database.php. Dans new PDO(), il vous faudra remplacer les deux derniers '' qui prennent places d'identifiant et de mot de passe par vos propres identifiants.

Identifiants de connexion :
Pour log un employé :
Identifiant = sophie.dubois@email.fr
Mot de passe = user123

Pour log un administrateur :
Identifiant = julien.bernard@email.fr
Mot de passe = admin123

Les mots de passe ont été hashés et se trouvent dans la base de données.

Lancement de l’application:
Lancez Apache et MySQL depuis XAMPP. Ouvrez votre navigateur. Accédez à l’application depuis le lien http://localhost/touche-pas-au-klaxon/

L’application est prête !
Vous pouvez maintenant :
créer une agence, gérer les trajets, gérer les employés, ou tout autre fonctionnalité disponible dans l’interface.

Touche pas au klaxon est une plateforme interne d'une entreprise permettant aux employées de créer des trajets entre les agences avec les voitures de l'entreprisse. En effet, de nombreux trajets aux mêmes agences et dans la même journée étaient effectués avec seulement un seul passager. Dans une démarche écologique mais aussi de rationnalisation des coûts, il a été décidé par la Direction de mettre en place sur l'intranet cette plateforme. Ainsi, fini la duplication des trajets et des voitures quasi vides. De ce fait, lorsque les employés auront un déplacement de prévu, ils pourront aller sur la plateforme pour créer un trajet vers l'agence dont ils ont besoin ou alors se greffer à un trajet existant.

Il y a trois types de profil pour cette plateforme :

- l'utilisateur non connecté,
- l'utilisateur connecté,
- l'administrateur.

Lorsque l'employé n'est pas connecté, il peut simplement voir les trajets. Il doit se connecter à l'aide de son adresse email et de son mot de passe afin de pouvoir accéder aux informations des trajets déjà existants, de créer son propre trajet, le modifier ou le supprimer. L'administrateur lui, à accès à toutes les informations. Il a la liste des employés, des trajets, des agences. Il peut supprimer, modifier des trajets. Il peut faire cela également pour les agences, ainsi qu'en rajouter.

La plateforme a été construite en PHP et sous une architecture MVC. L'identité graphique est simple et utilise Bootstrap et Sass. Le thème principal est de la couleur #00497c. Les autres couleurs de la palette pourront donc être utilisées pour les plateformes à venir prévues par l'entreprise.

L'outil de vérification PhpStan n'indique pas d'erreur avec la commande ".vendor/bin/phpstan analyse app".

Architecture du projet :
touche-pas-au-klaxon/
->app/
-->assets/
--->css/
--->scss/
-->class/
-->controllers/
-->core/
-->models/
-->views/
->htaccess
->index.php
->README.MD
