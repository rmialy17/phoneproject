# phoneproject

## Objectifs

Création d'un site collaboratif pour faire connaître les figures de snowboard.
Environnement de développement
- Symfony 5
-	Composer 2.1.9
-	WampServer 3.2.3.3
      -	Apache 2.4.46
      -	PHP 7.4.9
      -	MySQL 8.0.21

## Installation

1.	Clonez ou téléchargez le repository GitHub dans le dossier souhaité :
> git clone https://github.com/rmialy17/phoneproject.git

2.	Modifiez le fichier .env avec vos variables d'environnement (connexion à la base de données). 
    Exemple : DATABASE_URL=mysql://username:password@localhost:3306/databasename)
    
3.	Téléchargez et installez les dépendances du projet avec la commande:
> composer install

4.	Importez le fichier "phoneproject.sql" dans votre base de données.

5.	Dans votre terminal effectuer la commande :
 > php bin/console server:start

6.	Dans votre navigateur, rendez vous sur http://127.0.0.1:8000/api 

Le projet est à présent installé, vous pouvez commencer à l'utiliser.
