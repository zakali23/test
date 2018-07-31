caldex
======

A Symfony project created on May 23, 2018, 9:54 am.

Déployer notre site Symfony en production :
===========================================

Notre site est fonctionnel , il marche parfaitement en local, et vous voulez que le monde entier en profite ? Vous êtes au bon endroit, on va voir dans ce chapitre les points à vérifier pour déployer notre site sur un serveur distant.

L'objectif de ce chapitre n'est pas de vous apprendre comment mettre en production un site de façon générale, mais juste de vous mettre le doigt sur les quelques points particuliers auxquels il faut faire attention lors d'un projet Symfony.

Vérifier la compatibilité du serveur
-----------------------------------

Évidemment, pour déployer une application Symfony sur votre serveur, encore faut-il que celui-ci soit compatible avec les besoins de Symfony ! Pour vérifier cela, on peut distinguer deux cas.
Vous avez déjà un hébergeur

Ce cas est le plus simple, car vous avez accès au serveur. Symfony intègre un petit fichier PHP qui fait toutes les vérifications de compatibilité nécessaires, utilisons-le ! Il s'agit du fichierweb/config.php, mais avant de l'envoyer sur le serveur il nous faut le modifier un petit peu. En effet, ouvrez-le, vous pouvez voir qu'il y a une condition sur l'IP qui appelle le fichier :

<?php

// web/config.php


// …


if (!in_array(@$_SERVER['REMOTE_ADDR'], array(

  '127.0.0.1',

  '::1',

))) {

  header('HTTP/1.0 403 Forbidden');

  exit('This script is only accessible from localhost.');

}

Comme ce fichier n'est pas destiné à rester sur votre serveur, supprimez simplement ce bloc et envoyez le fichier sur votre serveur. Ouvrez la page web qui lui correspond, par exemplewww.votre-serveur.com/config.php. 

Vous n'avez pas encore d'hébergeur et en cherchez un compatible.
--------------------------------------------------------------

Dans ce cas, vous ne pouvez pas exécuter le petit script de test inclus dans Symfony. Ce n'est pas bien grave, vous allez le faire à la main ! Voici les points obligatoires qu'il faut que votre serveur respecte pour pouvoir faire tourner Symfony :

    La version de PHP doit être supérieure ou égale à PHP 5.5.9 ;

    L'extension SQLite 3 doit être activée ;

    L'extension JSON doit être activée ;

    L'extension Ctype doit être activée ;

    Le paramètredate.timezonedoit être défini dans lephp.ini.

Il y a bien entendu d'autres points qu'il vaut mieux vérifier, bien qu'ils ne soient pas obligatoires. La liste complète est disponible dans la documentation officielle.

Déployer votre application:
===========================

Il y a deux cas pour déployer votre application sur votre serveur :

    Soit vous n'avez pas accès en SSH à votre serveur (la plupart des hébergements mutualisés, etc.) : dans ce cas vous devez envoyer vos fichiers à la main ;

    Soit vous avez accès en SSH à votre serveur (VPS, serveur dédiés, etc.) : dans ce cas il vous faut utiliser Capifony, un outil fait pour automatiser le déploiement.

Méthode 1 : Envoyer les fichiers sur le serveur par FTP
-------------------------------------------------------

Dans un premier temps, il faut bien évidemment envoyer les fichiers sur le serveur. Pour éviter d'envoyer des fichiers inutiles et lourds, videz d'abord le cache de votre application : celui-ci est de l'ordre de 1 à 10 Mo. Attention, pour cette fois il faut le vider à la main, en supprimant tout son contenu, car la commande cache:clearne fait pas que supprimer le cache, elle le reconstruit en partie, il restera donc des fichiers qu'on ne veut pas. Ensuite, envoyez tous vos fichiers et dossiers à la racine de votre hébergement, danswww/sur OVH par exemple.
Que faire des vendors ?

Si vous avez accès à Composer sur votre serveur, c'est le mieux. N'envoyez pas vos vendors à la main, ils sont assez lourds, mais envoyez bien les deux fichierscomposer.jsonetcomposer.lock. Ensuite, sur votre serveur, exécutez la commandephp composer.phar install. Je parle bien de la commandeinstallet nonupdate, qui va installer les mêmes versions des dépendances que vous avez en local. Cela se fait grâce au fichiercomposer.lockqui contient tous les numéros des versions installées justement.

Si vous n'avez pas accès à Composer sur votre serveur, alors contentez-vous d'envoyer le dossiervendoren même temps que le reste de votre application.
Régler les droits sur le dossier /var

Vous le savez, Symfony a besoin de pouvoir écrire dans le répertoire :var pour y mettre le cache de l'application et ainsi améliorer les performances, mais aussi pour y mettre les logs, l'historiques des informations et erreurs rencontrées lors de l'exécution des pages.

Normalement, votre client FTP devrait vous permettre de régler les droits sur les dossiers. Avec FileZilla par exemple, un clic droit sur le dossier var  vous permet de définir les droits, comme à la figure suivante.
Modifiez les droits des dossiers
Modifiez les droits des dossiers

Assurez-vous d'accorder tous les droits (777) pour que Symfony puisse écrire à souhait dans ce dossier.
Méthode 2 : Utiliser l'outil Capifony pour envoyer votre application

La méthode précédente est très sommaire. Cela permet juste de vous expliquer quels sont les points particuliers du déploiement d'un projet Symfony. Mais si votre projet est assez grand, vous devez penser à utiliser des outils adaptés pour le déployer sur votre serveur. Je vous invite notamment à jeter un œil à Capifony : capifony.org, un outil Ruby qui permet d'automatiser pas mal de choses que nous venons de voir.

Je n'irai pas plus loin sur ce point, car c'est un outil à part entière qui mériterait un cours dédié. Cependant, sachez que c'est outil qui a été conçu pour justement déployer une application Symfony. Il fait donc toutes les tâches nécessaires et ce de façon automatique : envoyer le code source, installer les dépendances avec Composer, vider le cache, etc. Cerise sur le gâteau : si l'une de vos mises en production échoue (vous vous rendez compte d'une erreur une fois en ligne), vous pouvez facilement revenir à la version antérieure !

Bref, à vous d'investiguer cet outil indispensable !
Les derniers préparatifs

Maintenant que votre application est sur votre serveur, il reste quelques points à ne pas oublier avant de donner l'adresse à tout le monde.
S'autoriser l'environnement de développement

Pour exécuter les commandes Symfony, notamment celles pour créer la base de données, il nous faut avoir accès à l'environnement de développement. Or, essayez d'accéder à votreapp_dev.php… accès interdit ! En effet, si vous l'ouvrez, vous remarquez qu'il y a le même test sur l'IP qu'on avait rencontré dansconfig.php. Cette fois-ci, ne supprimez pas la condition, car vous aurez besoin d'accéder à l'environnement de développement dans le futur. Il faut donc que vous complétiez la condition avec votre adresse IP. Obtenez votre IP surwww.whatismyip.com, et rajoutez-la :

<?php

// web/app_dev.php


// …


if (!in_array(@$_SERVER['REMOTE_ADDR'], array(

  '127.0.0.1',

  '::1',

  '123.456.789.1'

))) {

  header('HTTP/1.0 403 Forbidden');

  exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');

}

Voilà, vous avez maintenant accès à l'environnement de développement et, surtout, à la console. ;)





