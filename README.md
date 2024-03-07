# Gestion de Billets

## Description

Ce projet est une application de gestion de billets conçue pour simplifier le processus de réservation des billets pour les voyages. L'application offre une interface conviviale pour les utilisateurs afin de visualiser, ajouter, modifier et supprimer des billets, ainsi que de gérer les informations des clients associées.

## Structure du Projet

L'organisation des fichiers dans ce projet suit une structure standard pour les applications web PHP. Voici un aperçu de la structure du projet :

- **index.php**: Le point d'entrée de l'application, affichant la page d'accueil et la liste de l'ensemble des billets avec trois boutons (`modifier` `supprimer` `voir les détails` ).
- **config.php**: Fichier de configuration contenant les paramètres de connexion à la base de données et d'autres configurations globales.
- **header.php** et **footer.php**: Fichiers inclus sur chaque page pour la mise en page commune de l'interface utilisateur.
- **img/**: Répertoire contenant les images.
- **style/**: Répertoire contenant les fichiers css.
- **database.sql**: Fichier SQL contenant la structure de la base de données et éventuellement des données de test.
- **create.php** , **delete.php** et **update.php** : Pour les fonctionnalités d'ajout, suppression et modification d'un billet.
- **detail.php** : Pour afficher les détails de chaque de chaque billet.
- **a-propos** et **contact.php**

## Fonctionnalités principales

- **Gestion des Billets**: Permet aux utilisateurs de visualiser tous les billets disponibles, ainsi que les détails associés tels que le nom du client, le prix, la date de réservation, etc.
- **Ajout de Billets**: Offre la possibilité aux utilisateurs d'ajouter de nouveaux billets en fournissant les informations nécessaires telles que le nom du client, le prix, la date de réservation, etc.
- **Modification des Billets**: Permet aux utilisateurs de modifier les détails des billets existants, tels que le nom du client, le prix, la date de réservation, etc.
- **Suppression de Billets**: Permet aux utilisateurs de supprimer les billets dont ils n'ont plus besoin.
- **Gestion des Clients**: Inclut également la gestion des informations des clients associées à chaque billet, telles que le nom, le prénom, la date de naissance, etc.

## Technologies Utilisées

- **PHP 8.2** : Utilisé pour la logique côté serveur et l'interaction avec la base de données.
- **MySQL 8.0.36-0ubuntu0.23.10.1**: Base de données utilisée pour stocker les informations sur les billets et les clients.
- **HTML/CSS** : Utilisés pour la conception et la mise en page de l'interface utilisateur.
- **JavaScript** : Utilisé dans la partie où on demande au client de confirmer la suppression de son billet avec un `alert`
- **PDO** : Nous utilisons PDO comme driver pour connecter notre application PHP à la base de données.
- **Apache2** : le serveur web utilisé.

## Installation

1. **Clonage du Projet**: Clonez le dépôt GitHub sur votre machine locale.
2. **Configuration de l'Environnement**: Assurez-vous d'avoir un serveur web avec PHP et MySQL installés sur votre machine.
3. **Importation de la Base de Données**: Importez le fichier de base de données fourni (`db_billet.sql`) dans votre gestionnaire de bases de données MySQL.
4. **Configuration de la Connexion à la Base de Données**: Modifiez le fichier `config.php` pour inclure les informations de connexion à votre base de données.
5. **Lancement de l'Application**: Lancez l'application en accédant à l'URL correspondante dans votre navigateur.

## Utilisation

- Accédez à l'application via votre navigateur.
- Pour ce projet on a focalisé sur le CRUD, vous n'avez pas besoin de vous connecter. Vous allez juste être rédirigé vers la page d'accueil.
- Explorez les différentes fonctionnalités de l'application, notamment la visualisation, l'ajout, la modification et la suppression de billets.
- Vous pouvez aussi trouvez d'autres pages supplémentaires comme contact et à propos.

## Contribution

Les contributions sont les bienvenues ! Pour des suggestions, des corrections de bugs ou des fonctionnalités supplémentaires, veuillez ouvrir une issue ou soumettre une pull request.

## Auteur

Mouhammad NDOUR, apprenant - Simplon Sénégal

## Licence

Ce projet est sous licence MIT.
