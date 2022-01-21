/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   INF3055 : Conception Orientée Objet   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=///////
//////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   PROJET : Gestion de pharmacie et clientèle   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+///////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

+------------------------+
| 	GROUPE	 	 |
+------------------------+
	+--------------------------------+---------------+-------------------+
	|	    **NOM**              | **MATRICULE** |   **SECTEUR**     |
	+--------------------------------+---------------+-------------------+
	|- MAYOGUE TADJUIDJE PAULETTE 	 |    18T2647	 |    Front-end      |
	|- TCHINDE  WAFFO Cyrille-Junior |    19M2392	 |    Front-end      |
	|- NSANGOU ADAMOU 		 |    18T2890	 |    Back-end 	     |
	|- OUABO Samuel Jordan		 |    19M2143	 |    Back-end	     |
	|- NDANG ESSI PIERRE JUNIOR 	 |    18T2419	 |    Back-end 	     |
	+--------------------------------+---------------+-------------------+
	
+------------------------+
| 	TECHNOLOGIES 	 |
+------------------------+
	- Système D'Exploitations		:  UBUNTU v18, Windows 10 Pro 
	- Langages				:  HTML, CSS, JavaScript, AJAX, PHP, SQL
	- Compilateur				:  navigateur (google CHROME), php version 7
	- Editeur de texte			:  Visual Studio Code
	- Logiciel de MOO			:  ArgoUML
	- Bibliothèques				:  JQuery.js, Fontawesome.js
	- Framework				:  Bootstrap
	- Serveur d'application			:  Apache offert par phpMyADMIN
	- Serveur de bases de données		:  MySQL offert par phpMyADMIN


+------------------------+
|  EXECUTION DU PROJET 	 |
+------------------------+
	Les étapes d'exécution du projet sont:
		-Avoir instaler le serveur de base de données MySQL(Xamp)
		-Déplacer le dossier tp_coo_pharmacie et le placer dans le repertoire 'C:\xampp\htdocs'
		-créer une base de données et la nommer tp_coo_inf3055
		-importer la base de données tp_coo_inf3055.sql dans le dossier modeles
		-lancer un navigateur
		-et taper l'url localhost/tp_coo_pharmacie
		-ici vous verez 4 cartes portant les noms superadmin, directeur, employe, internaute; permettant de se connecter
		-pour se connecter en tant que superadmin vous devrez mettre le login: Adams et le mot de passe:alima
		-pour se connecter à un directeur vous devrez mettre le login: paulette et le mot de passe:paulette
		-pour se connecter à un employe vous devrez mettre le login: dorine et le mot de passe:dorine
		-pour se connecter en tant que internaute on n'a pas besoin d'authentification

+------------------------+
| 	PRESENTATION 	 |
+------------------------+
	Ce projet à été réalisé en tant que TP d'INF3055 pour le compte de l'année academique 2021/2022. C'est une application web 
	tres utile dans le domaine medicale. Il permet de;

	- Reduire la quantité de deplacement pour acheter un produit (Pour un patient)
	- Faciliter la gestion des stocks (Pour un employé)
	- Etablir des statistiques de ventes (Pour un directeur)
	Et plusieurs autres fonctionnalités, ennoncés dans le **DIAGRAMME DE CAS D'UTILISATION**.

+------------------------+
| 	ARCHITECTURE 	 |
+------------------------+	
	l'application est developpée suivant l'architecture MVC(Modèle Vue Controleur) et structuré comme suit:

	- le dossier *** COO_Diagrammes *** 	: Contient tout les diagrammes de COO que nous avons réalisé.
	﻿- le dossier ***     modèle     ***	: Contient la base de donnees et l'implementation du **DIAGRAMME DE CLASSES** (en php). 
	- le dossier ***   controleur   ***	: Contient l'interaction entre la **vue** et les fonctionnalites du **modèle**.
	- le dossier ***      vue       *** 	: Contient les fichiers qui constituent l'interface graphique (le front-end)

+------------------------+
| 	IMPORTANT 	 |
+------------------------+	
	Le code source de l'application contient des commentaires pour vous orienter.

+------------------------+
| 	CONCLUSION 	 |
+------------------------+
	Ce TP est un grand pas vers notre but (devenir des génie logiciels). Pour ce fait, nous remercions notre superviseur 
	*Docteur Valéry MONTHE* de nous l'avoir donné.

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   INF3055 : Conception Orientée Objet   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=///////
//////+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+++   PROJET : Gestion de pharmacie et clientèle   +++=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+///////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
