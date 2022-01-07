<?php
	/**
	 * 
	 */
	require ('../Controleur/all_use_cases.php');
	include_once('Personne.class.php');
	class ClassName extends AnotherClass
	{
		private $etat;
		function __construct($nom, $prenom, $tel, $adresse, $login, $password,$etat)
		{
			parent::__construct($nom, $prenom, $tel, $adresse, $login, $password);
			$this->etat = $etat;
		}


		public function addProduit($produit){
			$nom = $produit->nom;
			$description = $produit->description;
			$prix = $produit->prix;
			$quantite = $produit->quantite;
			$type = $produit->type;
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare("INSERT INTO produit(nom, description, prix, quantite, type) VALUES(?, ?, ?, ?, ?)");
			$req->execute(array($nom, $description, $prix, $quantite, $type));
			$req2 = $baseDeDonnees->prepare("INSERT INTO nouveauproduit(nom, description, prix, quantite, type) VALUES(?, ?, ?, ?, ?)");
			$req2->execute(array($nom, $description, $prix, $quantite, $type));
			if($req == true and $req2 ==true ){
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteProduit($nom){
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare("DELETE FROM `produit` WHERE `produit`.`nom` =? ");
			$req->execute(array($nom));
			if($req == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function rechercher($produit){

		}
		public function vendre($produit,$employe,$quantite){
			$dateVente = date("l F d, Y"); //Récupérer la date courante
			$heure = date("H:i:s");
			$nomProduit = $produit->nom;
			$idEmploye = $employe->id;
			$baseDeDonnees = connecter();
			$req1 = $baseDeDonnees->prepare("SELECT quantite, id FROM produit WHERE nom = ?");
			$req1->execute(array($nomProduit));
			$data = $req1->fetch(); //Récupération de la sélection dans la variable data
			$nouvelle_qte = $data['quantite']-$quantite; //Décrémentation de la quantité
			$idProduit = $data['id'];
			$req2 = $baseDeDonnees->prepare("UPDATE `produit` SET `quantite` = ? WHERE `produit`.`nom` =?");
			$req2->execute(array($nouvelle_qte,$nomProduit));
			$req = $baseDeDonnees->prepare("INSERT INTO vendre(idProduit, idEmploye, dateVente, heure, quantite) VALUES (?,?,?,?,?)");
			$req->execute(array($idProduit, $idEmploye, $dateVente, $heure, $quantite));
			if($req == true and $req1 == true and $req2 == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function consulterReleverVente(){
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
		public function consulterReleverAjout(){
			$releveAjout = array();
			$baseDeDonnees = connecter();
			$req1 = $baseDeDonnees->prepare("SELECT * FROM nouveauproduit ");
			$data = $req1->fetch();
			while($data = $req1->fetch()){
				$idEmploye = $data['idEmploye'];
				$req3 = $baseDeDonnees->prepare("SELECT nom FROM employe WHERE id = ?");
				$req3->execute(array($idEmploye));
				while($data3 = $req3->fetch()){
					$nomProduit = $data['nom'];
					$nomEmploye = $data3['nom'];
					$dateVente = $data['dateVente'];
					$heure = $data['heure'];
					$quantite = $data['quantite'];
					$prix = $data['prix'];
					$tab = array($nomProduit,$nomEmploye,$dateVente,$heure,$quantite,$prix);
					$releveAjout->append($tab);
				}
			}
			return $releveAjout;
		}
		public function authentifier($login, $motDePasse){
			if (!empty(isset($login) AND isset($motDePasse))) {
				$baseDeDonnees = connecter();
					$req = $baseDeDonnees->prepare('SELECT * FROM employe WHERE login = ? AND motDePasse = ?');
					$req->execute(array($login, $motDePasse));
					if ($req == true) {
						$data = $req->fetch();
						session_start();
						$_SESSION['idEmploye'] = $data['id'];
						$_SESSION['login'] = $login;
						$_SESSION['motDePasse'] = $motDePasse;
						return true;
					}
					else{
						return false;
					}
				}
			else{
				?>
					<script type="text/javascript">alert("Login ou mot de passe incorrect");</script>
				<?php
			}
		}
		public function deconnecter(){
			session_destroy();
			header("Location: $url_connexion");
		}
		public function modifierInfos($employe)
		{
			$nom = $employe->nom;
			$prenom = $employe->prenom;
			$tel = $employe->tel;
			$adresse = $employe->adresse;
			$login = $employe->login;
			$motDePasse = $employe->motDePasse;
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare("UPDATE `employe` SET `nom` = ?, `prenom` = ?, `tel` = ?, `adresse` = ?, `login` = ?, `motDePasse` = ? WHERE `employe`.`id` = ?");
			$req->execute(array($nom, $prenom, $tel, $adresse, $login, $motDePasse));
			if($req == true){
				return true;
			}
			else{
				return false;
			}

		}
	}
?>