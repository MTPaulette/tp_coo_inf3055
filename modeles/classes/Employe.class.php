<?php
	/**
	 * 
	 */
	require (__DIR__.'/../interface/Connexion.Interface.php');
	require (__DIR__.'/../interface/Consultation.Interface.php');
	//require ('../interface/Inscription.Interface.php');
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

		public function ajouterProduit($nom, $description, $prix,$photo, $quantite, $type){
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
			//echo $nomPharmacie['nom'];
			//verifier si le produit est déjà dans la bd
			$reponse = $bd->prepare('SELECT * FROM produit WHERE nomp = ? AND nomPharmacie = ?');
			$reponse->execute(array($nom, $nomPharmacie['nom']));
			$resultat = $reponse->fetch();
			//$resultat = $this->check($nom,'produit');
			if(empty($resultat)){
				$reponse1 = $bd->prepare('INSERT INTO produit(nomp,description,prix,quantite,ancienne_quantite,quantite_ajouter,type,photo,createdAt,heure,modifiedAt,loginEmploye,nomPharmacie) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
				$reponse1->execute(array($nom,$description,$prix,$quantite,0,$quantite,$type,addslashes($photo),$date,$date,$date,$this->getLogin(),$nomPharmacie['nom']));
				return true;
			}
			else{
				$reponse4 = $bd->prepare('SELECT * FROM produit WHERE nomp = ? AND nomPharmacie = ?');
				$reponse4->execute(array($nom,$nomPharmacie['nom']));
				$produit = $reponse4->fetch();
				//$produit = $this->check($nom,'produit');
				$nouvelle_qte = $produit['quantite'] + $quantite;
				$reponse5 = $bd->prepare('UPDATE produit SET quantite = ?, ancienne_quantite = ?, quantite_ajouter = ?, modifiedAt = ?, loginEmploye = ?, nomPharmacie = ? WHERE nomp = ? AND nomPharmacie = ?');
				$reponse5->execute(array($nouvelle_qte,$produit['quantite'],$quantite,$date,$this->getLogin(),$nomPharmacie['nom'],$nom, $nomPharmacie['nom']));
				return true;
			}
		}

		public function deleteProduit($nom){
			$baseDeDonnees = $this->connecter();
			$rep = $baseDeDonnees->prepare('SELECT * FROM produit WHERE nomp = ?  AND loginEmploye = ?');
			$rep->execute(array($nom,$this->getLogin()));
			$quantite = $rep->fetch();
			if(!empty($quantite) and $quantite['ancienne_quantite']!=0){
				$nouvelle_qte = $quantite['ancienne_quantite'];
				$req = $baseDeDonnees->prepare('UPDATE produit SET quantite = ?, ancienne_quantite = ?, quantite_ajouter = ? WHERE nomp = ? AND loginEmploye = ?');
				$req->execute(array($nouvelle_qte,0,0,$nom,$this->getLogin()));
				if($req == true){
					return true;
				}
				else{
					return false;
				}
			}
			
		}

		public function rechercher($nom){
			$bd = $this->connecter();
			echo "$nom<br>";
			$var = $this->getLogin();
			echo "$var<br>";
			//recupere le login du directeur
			$rep = $bd->prepare('SELECT loginDirecteur FROM employe WHERE login = ?');
			$rep->execute(array($this->getLogin()));
			$loginDirecteur = $rep->fetch();
			print_r($loginDirecteur);
			//recupere le nom de la pharmaci
			$rep2 = $bd->prepare('SELECT nom FROM pharmacie WHERE loginDirecteur = ?');
			$rep2->execute(array($loginDirecteur['loginDirecteur']));
			$nomPharmacie = $rep2->fetch();
			echo "<br>";
			print_r($nomPharmacie); 
			echo "<br>";
			if(!empty($nomPharmacie)){
				$reponse = $bd->prepare('SELECT * FROM produit WHERE nomp = ? AND nomPharmacie = ?');
				$reponse->execute(array($nom,$nomPharmacie['nom']));
				$produit = $reponse->fetch();
				if(!empty($produit)){
					return $produit;
				}
			}
			
			else{
				return null;
			}
		}
		public function vendre($nom,$quantite){
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$nomProduit = $nom;
			$loginEmploye = $this->getLogin();
			$baseDeDonnees = $this->connecter();
			//recupere le login du directeur
			$sql = $baseDeDonnees->prepare('SELECT loginDirecteur FROM employe WHERE login = ?');
			$sql->execute(array($this->getLogin()));
			$val = $sql->fetch();
			//recupere le nom de la pharmacie
			$sql2 = $baseDeDonnees->prepare('SELECT nom FROM pharmacie WHERE loginDirecteur = ?');
			$sql2->execute(array($val['loginDirecteur']));
			$val2 = $sql2->fetch();
			//recupere le produit
			$req1 = $baseDeDonnees->prepare('SELECT * FROM produit WHERE nomp = ? AND nomPharmacie = ?');
			$req1->execute(array($nomProduit,$val2['nom']));
			$data = $req1->fetch(); //Récupération de la sélection dans la variable data
			//print_r($data);
			if(!empty($data)){
				if($data['quantite']>=$quantite){
					$nouvelle_qte = $data['quantite']-$quantite; //Décrémentation de la quantité
					$nomProduit = $data['nomp'];
					$prix = $quantite*$data['prix'];
					$nomPharmacie = $data['nomPharmacie'];
					//echo $nomPharmacie;
					$req = $baseDeDonnees->prepare("INSERT INTO vendre(nomProduit, loginEmploye, dateVente, heure, quantite, prix,nomPharmacie) VALUES (?,?,?,?,?,?,?)");
					$req->execute(array($nomProduit, $loginEmploye, $date, $date, $quantite,$prix,$nomPharmacie));
					$req3 = $baseDeDonnees->prepare("INSERT INTO nouvelleVente(nomProduit, loginEmploye, dateVente, heure, quantite, prix,nomPharmacie) VALUES (?,?,?,?,?,?,?)");
					$req3->execute(array($nomProduit, $loginEmploye, $date, $date, $quantite,$prix,$nomPharmacie));
					$req2 = $baseDeDonnees->prepare("UPDATE `produit` SET `quantite` = ? WHERE `produit`.`nomp` =? AND `produit`.`nomPharmacie` =?");
					$req2->execute(array($nouvelle_qte,$nomProduit,$val2['nom']));
					echo 'reussi';
					return true;
				}
			}
			
			else{
				echo 'echec';
				return false;
			}
		}

		public function releveVente(){
			$releveVente = array();
			$baseDeDonnees = $this->connecter();
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$req1 = $baseDeDonnees->prepare("SELECT * FROM vendre WHERE loginEmploye = ?");
			$req1->execute(array( $this->getLogin()));
			//$data = $req1->fetch();
			$reponse = $baseDeDonnees->prepare('SELECT * FROM employe WHERE login = ?');
			$reponse->execute(array($this->getLogin()));
			$employe = $reponse->fetch();
			while($data = $req1->fetch()){
				$nomProduit = $data['nomProduit'];
				$dateVente = $data['dateVente'];
				$heure = $data['heure'];
				$quantite = $data['quantite'];
				$prix = $data['prix'];
				$tab = array($employe['nom'],$employe['prenom'],$nomProduit,$dateVente,$heure,$quantite,$prix);
				$releveVente[] = $tab;
				
			}
			return $releveVente;
		}
		/*
		--> Cette fonction retourne un tableau dont les éléments sont des tableaux de 6 éléments.
		--> Le premier élément correspond au nom du produit, le deuxième au nom de l'employé, etc...
		*/
		public function releveAjout(){
			$releveAjout = array();
			/*$baseDeDonnees = connecter();
			$req1 = $baseDeDonnees->prepare("SELECT * FROM nouveauproduit ");
			$data = $req1->fetch();
			while($data = $req1->fetch()){
				$loginEmploye = $data['loginEmploye'];
				$req3 = $baseDeDonnees->prepare("SELECT nom FROM employe WHERE login = ?");
				$req3->execute(array($loginEmploye));
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
			}*/
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT * FROM employe WHERE login = ?');
			$reponse->execute(array($this->getLogin()));
			$employe = $reponse->fetch();
			$reponse2 = $bd->prepare('SELECT * FROM produit WHERE loginEmploye = ? ');
			$reponse2->execute(array($this->getLogin()));
			while($data = $reponse2->fetch()){
				$nomProduit = $data['nomp'];
				$quantiteAjouter = $data['quantite_ajouter'];
				$ancienneQuantite = $data['ancienne_quantite'];
				$quantite = $data['quantite'];
				$modifiedAt = $data['modifiedAt'];
				$heure = $data['heure'];
				$tab = array($employe['nom'],$employe['prenom'],$nomProduit,$quantiteAjouter,$ancienneQuantite,$quantite,$modifiedAt,$heure);
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
						echo 'mot de passe incorect';
						return 1;
					}
					else{
						$dateJour = new \DateTime('now');
						$date = $dateJour->format('y-m-d H:i:s');
						$reponse = $baseDeDonnees->prepare('UPDATE employe SET dateConnexion = ?, heureConnexion = ? WHERE login = ?');
						$reponse->execute(array($date,$date,$login));
						$reponse2 = $baseDeDonnees->prepare('UPDATE pharmacie SET ouvert = ? WHERE loginDirecteur = ?');
						$reponse2->execute(array(1,$data['loginDirecteur']));
						echo 'mot de passe correct';
						return 2;
					}
				}
				else{
				echo 'employe suspendu';
					return 3;
				}
			
		}
		public function deconnecter(){
			$bd = $this->connecter();
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$req = $bd->prepare('SELECT * FROM employe WHERE login = ?');
			$req->execute(array($this->getLogin()));
			$data = $req->fetch();
			$reponse2 = $bd->prepare('UPDATE pharmacie SET ouvert =? WHERE loginDirecteur = ?');
			$reponse2->execute(array(0,$data['loginDirecteur']));
			$reponse = $bd->prepare('UPDATE employe SET dateDeconnexion = ?, heureDeconnexion = ? WHERE login = ?');
			$reponse->execute(array($date,$date,$this->getLogin()));
			return true;

		}
		
		public function reinitialiser($ancienMotDePasse, $nouveauMotDePasse)
		{
			$resultat = $this->check($this->getLogin(), 'employe');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE employe SET motDePasse = PASSWORD(?) WHERE login = ?');
				$reponse2->execute(array($nouveauMotDePasse, $this->getLogin()));
				echo 'modification reussi';
			}

		}
	}
?>