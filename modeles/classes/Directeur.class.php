<?php
	/**
	 * 
	 */
	require (__DIR__.'/../interface/Connexion.Interface.php');
	require (__DIR__.'/../interface/Consultation.Interface.php');
	require (__DIR__.'/../interface/Inscription.Interface.php');
	include_once('Personne.class.php');

	class Directeur extends Personne implements Connexion,Consultation,Inscription
	{

		private function creerDirecteur($nom, $prenom, $tel, $adresse, $login)
		{
			$directeur = new Directeur();
			$directeur->setNom($nom);
			$directeur->setPrenom($prenom);
			$directeur->setTelephone($tel);
			$directeur->setAdresse($adresse);
			$directeur->setLogin($login);
			return $directeur;
		}

		//rechrche
		private function check($login, $table){
			$bd = $this->connecter();
			$reponse = $bd->prepare("SELECT * FROM {$table} WHERE login = ?");
			$reponse->execute(array($login));
			$resultat = $reponse->fetch(); 
			return $resultat;
		}

		public function creerCompte($nom,$prenom,$telephone,$adresse,$photo,$login,$motDePasse){
			
			//recherche si le login et mot de passe existe
			/*$reponse = $bd->prepare('SELECT nom FROM employe WHERE login = ?');
			$reponse->execute(array($login));*/
			$resulat = $this->check($login,'employe');
			//recherche pour recupérer l'id du directeur
			/*$reponse2 = $bd->prepare('SELECT id FROM directeur WHERE login = ?');
			$reponse2->execute(array($loginD));*/
			$loginDirecteur = $this->check($this->getLogin(),'directeur');
			if(empty($resulat) and !empty($loginDirecteur)){
				$bd = $this->connecter();
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse2 = $bd->prepare('INSERT INTO employe(nom,prenom, telephone, adresse, photo,etat, createdAt, login, motDePasse, loginDirecteur) VALUES(?,?,?,?,?,?,?,?,PASSWORD(?),?)');
				$reponse2->execute(array($nom, $prenom,$telephone,$adresse,addslashes($photo),'en poste',$date,$login,$motDePasse,$loginDirecteur['login']));
				echo "ajout reussi";
				return true;
			}
			else{
				echo "echer";
				return false;
			}
		}

		//confirmer lemot de passe
		private function confirmerMotDePasse($motDePasse, $table){
			$bd = $this->connecter();
			$reponse = $bd->prepare("SELECT * FROM {$table} WHERE motDePasse = PASSWORD(?)");
			$reponse->execute(array($motDePasse));
			$resultat = $reponse->fetch(); 
			if ($resultat) {
				return true;
			}else {
				return false;
			}
		}


		function supprimerEmploye($motDePasse, $login){
			$bd = $this->connecter();
			$table = 'directeur';
			if ($this->confirmerMotDePasse($motDePasse, $table)) {
				try {
					$req = $bd->prepare('UPDATE employe SET etat = ? WHERE login =?');
					$req->execute(array('supprime',$login));
					if($req){
						return true;
					}
					else{
						return false;
					}
				} catch (PDOException $e) {
					$e->getmessage();
					return false;
					
				}
			}else {
				return false;
			}
			

		}

		function suspendreEmploye($motDePasse, $login){
			$bd = $this->connecter();
			$table = 'directeur';
			if ($this->confirmerMotDePasse($motDePasse, $table)) {
				try {
					$req = $bd->prepare('UPDATE employe SET etat = ? WHERE login =?');
					$req->execute(array('suspendu',$login));
					if($req){
						return true;
					}
					else{
						return false;
					}
				} catch (PDOException $e) {
					$e->getmessage();
					return false;
					
				}
			}else {
				return false;
			}
			

		}



		function activerEmploye($motDePasse, $login){
			$bd = $this->connecter();
			$table = 'directeur';
			if ($this->confirmerMotDePasse($motDePasse, $table)) {
				try {
					$dateJour = new \DateTime('now');
					$date = $dateJour->format('y-m-d H:i:s');
					$reponse = $bd->prepare('UPDATE employe SET etat = ?, modifiedAt = ? WHERE login = ?');
					$reponse->execute(array('poste',$date,$login));
					if($req){
						return true;
					}
					else{
						return false;
					}
				} catch (PDOException $e) {
					$e->getmessage();
					return false;
					
				}
			}else {
				return false;
			}
			

		}

		
		public function rechercherEmploye($login){
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT * FROM employe WHERE login LIKE ? and loginDirecteur = ?');	
			$reponse->execute(array('%'.$login.'%',$this->getLogin()));
			$employe = $reponse->fetchAll();
			if(!empty($employe)){
				return $employe;
			}
			else{
				return null;
			}
		}
		

		public function authentifier($login, $motDePasse)
		{
				$baseDeDonnees = $this->connecter();
				$reponse = $baseDeDonnees->prepare('SELECT etat FROM pharmacie WHERE loginDirecteur = ?');
				$reponse->execute(array($login));
				$resultat = $reponse->fetch();
				if($resultat['etat']=='disponible'){
					$req = $baseDeDonnees->prepare('SELECT * FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
					$req->execute(array($login, $motDePasse));
					$param = $req->fetch();
					if (empty($param)) {
						//echo 'mot de passe incorect';
						return false;
					}
					else{
						//echo 'mot de passe correct';
						return $this->creerDirecteur($param['nom'],$param['prenom'],$param['telephone'],$param['adresse'],$param['login']);
					}
				}
				else{
					//echo 'login incorect ou pharmacie suspendu';
					return false;
				}
			
		}
		public function deconnecter()
		{
			
		}
		public function reinitialiser($ancienMotDePasse, $nouveauMotDePasse)
		{
			$resultat = $this->check($this->getLogin(), 'directeur');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE directeur SET motDePasse = PASSWORD(?) WHERE login = ?');
				$reponse2->execute(array($nouveauMotDePasse, $this->getLogin()));
				echo 'modification reussi';
			}

		}
		public function releveVente()
		{
			$releve = array();
			$baseDeDonnees = $this->connecter();
			//rcupérer le nom de la pharmacie
			$reponse = $baseDeDonnees->prepare('SELECT nom FROM pharmacie WHERE loginDirecteur = ?');
			$reponse->execute(array($this->getLogin()));
			$nomPharmacie = $reponse->fetch();
			//recupérer le vente effectuer dans la pharmacie qui n'ont pas encore été vue
			$reponse2 = $baseDeDonnees->prepare('SELECT * FROM vendre WHERE nomPharmacie = ?');
			$reponse2->execute(array($nomPharmacie['nom']));
			while($vente = $reponse2->fetch()){
				$nomProduit = $vente['nomProduit'];
				$loginEmploye = $vente['loginEmploye'];
				$dateVente = $vente['dateVente'];
				$heureVente = $vente['heure'];
				$prix  = $vente['prix'];
				//recupérer le nom de l'employe qui a effectué la vente
				$reponse3 = $baseDeDonnees->prepare('SELECT * FROM employe WHERE login = ?');
				$reponse3->execute(array($loginEmploye));
				$nomEmploye = $reponse3->fetch();
				$tab = array($nomEmploye['nom'],$nomEmploye['prenom'],$nomProduit,$dateVente,$heureVente,$prix);
				$releve[] = $tab;
			}
			

			return $releve;
		}


		public function releveAjout(){
			$releve = array();
			$baseDeDonnees = $this->connecter();
			//rcupérer le nom de la pharmacie
			$reponse = $baseDeDonnees->prepare('SELECT nom FROM pharmacie WHERE loginDirecteur = ?');
			$reponse->execute(array($this->getLogin()));
			$nomPharmacie = $reponse->fetch();
			//recupérer le produit d'une la pharmacie qui n'ont pas encore été vue
			$reponse2 = $baseDeDonnees->prepare('SELECT * FROM produit WHERE nomPharmacie = ?');
			$reponse2->execute(array($nomPharmacie['nom']));
			while($produit = $reponse2->fetch()){
				$nomProduit = $produit['nomp'];
				$loginEmploye = $produit['loginEmploye'];
				$date = $produit['modifiedAt'];
				$prix  = $produit['prix'];
				$ancienneQuantite = $produit['ancienne_quantite'];
				$quantiteAjoute = $produit['quantite_ajouter'];
				$nouvelleQuantite = $produit['quantite'];
				$type = $produit['type'];
				//recupérer le nom de l'employe qui a effectué la vente
				$reponse3 = $baseDeDonnees->prepare('SELECT * FROM employe WHERE login = ?');
				$reponse3->execute(array($loginEmploye));
				$nomEmploye = $reponse3->fetch();
				$tab = array($nomEmploye['nom'],$nomEmploye['prenom'],$nomProduit,$ancienneQuantite,$quantiteAjoute,$nouvelleQuantite,$type,$prix,$date,);
				$releve[] = $tab;
			}
			return $releve;
		}


	}
?>