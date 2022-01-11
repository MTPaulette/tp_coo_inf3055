<?php
	/**
	 * 
	 */
	//require ('../interface/Connexion.Interface.php');
	//require ('../interface/Consultation.Interface.php');
	//require ('../interface/Inscription.Interface.php');
	include_once('Personne.class.php');
	include_once('Personne.class.php');
	class Employe extends Personne implements Consultation,Connexion
	{
		
		/*public function Employe($nom, $prenom, $tel, $adresse, $login, $password,$etat)
		{
			setNom($nom);
			setPrenom($prenom);
			setTelephone($tel);
			setAdresse($adresse);
			setLogin($login);
			setMotDePasse($password);
		}*/


		private function check($login, $table){
			$bd = $this->connecter();
			$reponse = $bd->prepare("SELECT * FROM {$table} WHERE login = ?");
			$reponse->execute(array($login));
			$resultat = $reponse->fetch(); 
			return $resultat;
		}
		public function addProduit($nom, $description, $prix, $quantite, $type){
			/*$nom = $produit->getNom();
			$description = $produit->getDescription();
			$prix = $produit->getPrix();
			$quantite = $produit->getQuantite();
			$type = $produit->getType();
			$baseDeDonnees = connecter();
			/*$req = $baseDeDonnees->prepare("INSERT INTO produit(nom, description, prix, quantite, type) VALUES(?, ?, ?, ?, ?)");
			$req->execute(array($nom, $description, $prix, $quantite, $type));
			$req2 = $baseDeDonnees->prepare("INSERT INTO nouveauproduit(nom, description, prix, quantite, type) VALUES(?, ?, ?, ?, ?)");
			$req2->execute(array($nom, $description, $prix, $quantite, $type));
			if($req == true and $req2 ==true ){
				return true;
			}
			else{
				return false;
			}*/
			$bd = $this->connecter();
			//recupérer l login du directeur d la pharmacie ou travaille l'employe
			/*$reponse2 = $bd->prepare('SELECT loginDirecteur FROM employe WHERE login = ?');
			$reponse2->execute(array($this->getLogin()));
			$loginDirecteur = $reponse2->fetch();*/
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$loginDirecteur = $this->check($this->getLogin(),'employe');
			echo $loginDirecteur['loginDirecteur'];
			//recupére le nom de la pharmacie lier au directeur
			$reponse3 = $bd->prepare('SELECT nom FROM pharmacie WHERE loginDirecteur = ?');
			$reponse3->execute(array($loginDirecteur['loginDirecteur']));
			$nomPharmacie = $reponse3->fetch();
			//$nomPharmacie = $this->check($loginDirecteur['loginDirecteur'],'pharmacie');
			echo $nomPharmacie['nom'];
			//verifier si le produit est déjà dans la bd
			$reponse = $bd->prepare('SELECT * FROM produit WHERE nom = ?');
			$reponse->execute(array($nom));
			$resultat = $reponse->fetch();
			//$resultat = $this->check($nom,'produit');
			if(empty($resultat)){
				$reponse1 = $bd->prepare('INSERT INTO produit(nom,description,prix,quantite,ancienne_quantite,quantite_ajouter,type,createdAt,heure,modifiedAt,loginEmploye,nomPharmacie) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
				$reponse1->execute(array($nom,$description,$prix,$quantite,0,$quantite,$type,$date,$date,$date,$this->getLogin(),$nomPharmacie['nom']));
			}
			else{
				$reponse4 = $bd->prepare('SELECT * FROM produit WHERE nom = ?');
				$reponse4->execute(array($nom));
				$produit = $reponse4->fetch();
				//$produit = $this->check($nom,'produit');
				$nouvelle_qte = $produit['quantite'] + $quantite;
				$reponse5 = $bd->prepare('UPDATE produit SET quantite = ?, ancienne_quantite = ?, quantite_ajouter = ?, modifiedAt = ?, loginEmploye = ?, nomPharmacie = ? WHERE nom = ?');
				$reponse5->execute(array($nouvelle_qte,$produit['quantite'],$quantite,$date,$this->getLogin(),$nomPharmacie['nom'],$nom));
			}
		}

		/*public function connecter(){
		try {
			$bd = new PDO('mysql:host=localhost;dbname=tpcoo','root','');
			//echo "connexion reussi";
			} catch (PDOException $e) {
				die('Erreur'.$e->getmessage());
				echo "echec connexion";
			}
			return $bd;
		}
		public function addProduit($nom, $description, $prix, $quantite, $type, $login, $password){
			
			$bd = $this->connecter();
			$reponse1 = $bd->prepare('SELECT quantite FROM produit WHERE nom = ?');
			$reponse1->execute(array($nom));
			$ad = $reponse1->fetch();
			if(!empty($ad)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$newQuantite = $ad['quantite'] + $quantite;
				$reponse = $bd->prepare('UPDATE produit SET quantite = ?, dateAjout = ?, heure = ?');
				$reponse->execute(array($newQuantite,$date,$date));
				return "modification reussi";
			}
			else{
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('SELECT id FROM employe WHERE login = ? AND motDePasse = PASSWORD(?)');
				$reponse->execute(array($login, $password));
				$id = $reponse->fetch();
				if(!empty($id)){
					$reponse3 = $bd->prepare('INSERT INTO produit(nom, description, prix, quantite, type, dateAjout, heure, idEmploye) VALUES(?,?,?,?,?,?,?,?)');
					$reponse3->execute(array($nom, $description, $prix, $quantite, $type, $date, $date, $id['id']));
					return "Ajout reussi";
				}
				else{
					return "employe non existant";
				}
				return "ajout echoue";
			}
		}*/

		public function deleteProduit($nom){
			$baseDeDonnees = $this->connecter();
			$req = $baseDeDonnees->prepare('DELETE FROM produit WHERE nom =? ');
			$req->execute(array($nom));
			if($req == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function rechercher($nom){
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT * FROM produit WHERE nom = ?');
			$reponse->execute(array($nom));
			$produit = $reponse->fetch();
			if(!empty($produit)){
				return $produit;
			}
			else{
				return null;
			}
		}
		public function vendre($produit,$quantite){
			$dateVente = date("l F d, Y"); //Récupérer la date courante
			$heure = date("H:i:s");
			$nomProduit = $produit->getNom();
			$loginEmploye = $this->getLogin();
			$baseDeDonnees = $this->connecter();
			$req1 = $baseDeDonnees->prepare('SELECT * FROM produit WHERE nom = ?');
			$req1->execute(array($nomProduit));
			$data = $req1->fetch(); //Récupération de la sélection dans la variable data
			$nouvelle_qte = $data['quantite']-$quantite; //Décrémentation de la quantité
			$nomProduit = $data['nom'];
			$prix = $quantite*$data['prix'];
			$nomPharmacie = $data['nomPharmacie'];
			$req2 = $baseDeDonnees->prepare("UPDATE `produit` SET `quantite` = ? WHERE `produit`.`nom` =?");
			$req2->execute(array($nouvelle_qte,$nomProduit));
			$req = $baseDeDonnees->prepare("INSERT INTO vendre(nomProduit, loginEmploye, dateVente, heure, quantite, prix,nomPharmacie) VALUES (?,?,?,?,?,?,?)");
			$req->execute(array($nomProduit, $loginEmploye, $dateVente, $heure, $quantite,$prix,$nomPharmacie));
			$req3 = $baseDeDonnees->prepare("INSERT INTO nouvelleVente(nomProduit, loginEmploye, dateVente, heure, quantite, prix,nomPharmacie) VALUES (?,?,?,?,?,?,?)");
			$req3->execute(array($nomProduit, $loginEmploye, $dateVente, $heure, $quantite,$prix,$nomPharmacie));
			if($req == true and $req1 == true and $req2 == true and $req3 == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function releveVente($date){
			$releveVente = array();
			$baseDeDonnees = connecter();
			$req1 = $baseDeDonnees->prepare("SELECT * FROM vente ");
			$data = $req1->fetch();
			while($data = $req1->fetch()){
				$idProduit = $data['idProduit'];
				$idEmploye = $data['idEmploye'];
				$req2 = $baseDeDonnees->prepare("SELECT nom FROM produit WHERE id = ?");
				$req2->execute(array($idProduit));
				$req3 = $baseDeDonnees->prepare("SELECT nom FROM employe WHERE id = ?");
				$req3->execute(array($idEmploye));
				while($data2 = $req2->fetch() and $data3 = $req3->fetch()){
					$nomProduit = $data2['nom'];
					$nomEmploye = $data3['nom'];
					$dateVente = $data['dateVente'];
					$heure = $data['heure'];
					$quantite = $data['quantite'];
					$prix = $data['prix'];
					$tab = array($nomProduit,$nomEmploye,$dateVente,$heure,$quantite,$prix);
					$releveVente->append($tab);
				}
			}
			return $releveVente;
		}
		/*
		--> Cette fonction retourne un tableau dont les éléments sont des tableaux de 6 éléments.
		--> Le premier élément correspond au nom du produit, le deuxième au nom de l'employé, etc...
		*/
		public function releveAjout($date){
			$releveAjout = array();
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT * FROM employe WHERE login = ?');
			$reponse->execute(array($this->getLogin()));
			$employe = $reponse->fetch();
			$reponse2 = $bd->prepare('SELECT * FROM produit WHERE loginEmploye = ? ');
			$reponse2->execute(array($this->getLogin()));
			while($data = $reponse2->fetch()){
				$nomProduit = $data['nom'];
				$quantiteAjouter = $data['quantite_ajouter'];
				$ancienneQuantite = $data['ancienne_quantite'];
				$quantite = $data['quantite'];
				$modifiedAt = $data['modifiedAt'];
				$heure = $data['heure'];
				$tab = array($employe['nom'],$nomProduit,$quantiteAjouter,$ancienneQuantite,$quantite,$modifiedAt,$heure);
				$releveAjout[] = $tab;
			}
			return $releveAjout;
		}
		public function authentifier($login, $motDePasse)
		{
				$baseDeDonnees = $this->connecter();
				$reponse = $baseDeDonnees->prepare('SELECT etat FROM employe WHERE login = ?');
				$reponse->execute(array($login));
				$resultat = $reponse->fetch();
				if($resultat['etat']=='poste'){
					$req = $baseDeDonnees->prepare('SELECT * FROM employe WHERE login = ? AND motDePasse = PASSWORD(?)');
					$req->execute(array($login, $motDePasse));
					$data = $req->fetch();
					if (empty($data)) {
						//echo 'mot de passe incorect';
						return 1;
					}
					else{
						$dateJour = new \DateTime('now');
						$date = $dateJour->format('y-m-d H:i:s');
						$reponse = $baseDeDonnees->prepare('UPDATE employe SET dateConnexion = ?, heureConnexion = ? WHERE login = ?');
						$reponse->execute(array($date,$date,$login));
						//echo 'mot de passe correct';
						return 2;
					}
				}
				else{
					//echo 'employe suspendu';
					return 3;
				}
			
		}
		public function deconnecter(){
			$bd = $this->connecter();
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$reponse = $bd->prepare('UPDATE employe SET dateDeconnexion = ?, heureDeconnexion = ? WHERE login = ?');
			$reponse->execute(array($date,$date,$this->getLogin()));

		}
		
		public function reinitialiser($ancienMotDePasse, $nouveauMotDePasse)
		{
			$resultat = $this->check($this->getLogin(),$ancienMotDepasse, 'employe');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE employe SET motDePasse = ? WHERE login = ?');
				$reponse2->execute(array($nouveauModePasse, $this->getLogin()));
				echo 'modification reussi';
			}

		}
		
	}
?>
