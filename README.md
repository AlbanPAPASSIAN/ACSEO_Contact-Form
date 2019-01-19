# ACSEO - Contact Form, par Alban PAPASSIAN

## Demande

Vous êtes développeur chez ACSEO. Vous recevez une demande de la part d'un client pour la mise en place d'une nouvelle fonctionnalité sur son site Internet.


> Nous souhaiterions mettre en place un formulaire de contact sur notre site.
> Le formulaire de contact doit être simple : il doit nous permettre de connaitre les coordonnées de l'internaute, et sa question.
> Il nous faut au moins son nom, son email, et sa question pour que nous traitions sa demande.

> Il nous faudrait aussi un petit back-office avec accès sécurisé pour permettre au webmaster de consulter la liste des demandes, et de pouvoir cocher les messages que nous avons traité

Il vous est demandé de mettre en place la solution sur la base du Framework Symfony 3 ou 4.

## Technologie utilisée

Symfony 4<br/>
MySQL<br />
Bootstrap<br />

## Prérequis

Afin de pouvoir consulter le projet en local, il est nécessaire d'effectuer les commandes suivantes à la racine du projet :

**Installation des dépendances**
> composer update

**Création de la base de données 'contact_form'**
> php bin/console doctrine:database:create

**Création des tables 'contact' et 'user'**
> php bin/console doctrine:schema:create

**Création du compte administrateur**
> php bin/console doctrine:fixtures:load

**Lancement du serveur local**
> php bin/console server:run

## Présentation du projet

### Accueil

Sur la page d'accueil, un utilisateur connecté ou non peux **envoyer un mail via un formulaire de contact**.<br/>

### Connexion

En tant qu'utilisateur non enregistré, un **formulaire de connexion** est disponible dans la partie '**Se connecter**'.<br/>
À partir de ce formulaire, l'utilisateur peux indiquer un **identifiant** et un **mot de passe** pour se connecter.<br/>
> Pour cette démonstration, un seul compte administrateur est disponible<br/>

> Identifiant: **admin**<br/>
> Mot de passe: **admin**<br/>

<img src="https://i.imgur.com/5SQ7Ndn.png" />

### Espace administration

Une fois connecté, l'utilisateur a accès à l'**espace d'administration**.<br/>
C'est ici que sont listés les **emails non traités et traités**

> Vous devez utiliser le formulaire et envoyer au moins 1 email.

<img src="https://i.imgur.com/LKSXPXK.png" alt="" />

### Détails mail

Le boutton '**Voir**' permet d'obtenir **les détails du mail** et de pouvoir le définir comme '**traité**' en **cochant la case** et en appuyant sur le boutton '**Valider**'.<br />
Le boutton '**Répondre par mail**' permet d'ouvrir un client de courrier électronique (*comme Outlook*) avec l'adresse e-mail indiquée et définie comme destinataire afin de répondre directement au mail sélectionné.

<img src="https://i.imgur.com/Q5w0nWb.png" />
