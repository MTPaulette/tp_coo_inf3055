/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   INF3055 : Conception Orientée Objet   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=///////
//////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   PROJET : Gestion de pharmacie et clientèle   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+///////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

######--- GROUPE ---######
	+--------------------------------+---------------+-------------------+
	|*NOM                 		 | MATRICULE	 | Secteur           |
	+--------------------------------+---------------+-------------------+
	|-MAYOGUE TADJUIDJE PAULETTE 	 | 18T2647	 | Front-end 	     |
	|-TCHINDE  WAFFO Cyrille-Junior  | 19M2392	 | Front-end 	     |
	|-NSANGOU ADAMOU 		 | 18T2890	 | Back-end 	     |
	|-OUABO Samuel Jordan		 | 19M2143	 | Back-end	     |
	|-NDANG ESSI PIERRE JUNIOR 	 | 18T2419	 | Back-end 	     |
	+--------------------------------+---------------+-------------------+
	
	*TECHNOLOGIES
	- Système D'Exploitation: UBUNTU v18, Windows 10 Pro, 
	- Langages: HTML, CSS, PHP, SQL
	- Compilateur: 
	- Editeur de texte: Visual Studio Code
	- Logiciel de MOO: ArgoUML
	- Framework: 
	- Base de Données: phpMyADMIN de MySQL et PHP de XAMPP Server.

	Nous vous presentons ce projet qui à été réalisé en tant que TP d'INF3055 pour le compte de l'année academique 2021/2022.
	C'est une application web tres utile dans le domaine medicale, permettant de;
	- Reduire la quantité de deplacement pour acheter un produit (Pour un patient)
	- Faciliter la gestion des stocks (Pour un employé)
	- Etablir des statistiques de ventes (Pour un directeur)
	Et plusieurs autres fonctionnalités, ennoncés dans le **DIAGRAMME DE CAS D'UTILISATION**
	
	l'application est developpé suivant l'architecture MVC(Modèle Vue Controlleur) et structuré comme suit:
	- le dossier ***diagrammes*** qui contient tout les diagrammes de COO que nous avons réalisé
	﻿- le dossier ***modèle*** contenant l'implementation du **DIAGRAMME DE CLASSES** (en php) et la base de donnees
	- le dossier ***controleur*** contenant les fichiers qui permettent l'interaction entre la **vue** et les fonctionnalites du **modèle**
	- le package ***vue*** contenant les fichiers qui constituent l'interface graphique (le front-end)

+------------------------+
| 	IMPORTANT 	 |
+------------------------+
	-> POUR LANCER LE JEU CORRECTEMENT;
	-> Importez le projet "BloomingGameUserInterface" dans une IDE, ECLIPSE IDE de preference.
	-> Creer prealablement la base de données "bloomingGame" avant d'importer la base de données, "bloomingGame.sql". Veuillez à respecter la casse car 
	   certains systemes d'exploitation tel que ubuntu sont sensibles à la casse.
	-> Effacez tout les modules importées avant d'importer a nouveau les modules present dans le dossier "Libraries". Assurez d'importer dans la section
	   "Module Path" plutot que Class Path"
	-> Lancez XAMPP serveur (Obligatoire pour le BACK-END et le FRONT-END)
	->  OUVREZ info.tp.view.fentre (La classe Java qui lance l'Interface Graphique) et suivez les directives !!!!
	-> Pour lancer le jeu en Back-end: il faut executer la classe "MainMultiPlayer" du package info.tp.model
	
	le code de jeu conteint des commentaires pour vous orienter.
+------------------------+
| 	CONCLUSION 	 |
+------------------------+

Ce TP est un grand pas vers notre but (devenir des génie logiciels). Pour ce fait, nous remercions notre superviseur *Docteur Valéry MONTHE*
de nous l'avoir donné.
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   INF3055 : Conception Orientée Objet   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=///////
//////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   PROJET : Gestion de pharmacie et clientèle   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+///////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
