<?php
	/**
	 * 
	 */
	//require ('../interface/Connexion.Interface.php');
	require ('../interface/Consultation.Interface.php');
	require ('../interface/Inscription.Interface.php');
	include_once('Personne.class.php');
	class Directeur extends Personne implements Connexion,Consultation,Inscription
	{
		
		private function creerDirecteur($nom, $prenom, $tel, $adresse, $login, $password)
		{
			$directeur = new Directeur();
			$directeur->setNom($nom);
			$directeur->setPrenom($prenom);
			$directeur->setTelephone($tel);
			$directeur->setAdresse($adresse);
			$directeur->setLogin($login);
			$directeur->setMotDePasse($password);
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

		public function creerCompte($nom,$prenom,$telephone,$adresse,$login,$motDePasse){
			
			//recherche si le login et mot de passe existe
			$resulat = $this->check($login,'employe');
			$loginDirecteur = $this->check($this->getLogin(),'directeur');
			if(empty($resulat) and !empty($loginDirecteur)){
				$bd = $this->connecter();
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse2 = $bd->prepare('INSERT INTO employe(nom,prenom, telephone, adresse, etat, createAt, login, motDePasse, loginDirecteur) VALUES(?,?,?,?,?,?,?,PASSWORD(?),?)');
				$reponse2->execute(array($nom, $prenom,$telephone,$adresse,'poste',$date,$login,$motDePasse,$loginDirecteur['login']));
				echo "ajout reussi";
				return true;
			}
			else{
				echo "echer";
				return false;
			}
		}

		public function deleteEmploye($login){
			$baseDeDonnees =$this->connecter();
			//$req = $baseDeDonnees->prepare("DELETE FROM `employe` WHERE `employe`.`nom` =? ");
			$req = $baseDeDonnees->prepare('UPDATE employe SET etat = ? WHERE login =?');
			$req->execute(array('supprime',$login));
			if ($req == true) {
				return true;
			}
			else{
				return false;
			}
		}

		public function suspendreEmploye($login){
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare('UPDATE employe SET etat = Suspendu WHERE login =?');
			$req->execute(array('suspendu',$login));
			if($req == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function rechercherEmploye($nom){
			
		}


		/**
		 * fonction qui gere l'authentification du directeur
		 */
		public function authentifier($login, $motDePasse)
		{
				$baseDeDonnees = $this->connecter();
				$reponse = $baseDeDonnees->prepare('SELECT etat, modifiedAt FROM pharmacie WHERE loginDirecteur = ?');
				$reponse->execute(array($login));
				$resultat = $reponse->fetch();
				if($resultat['etat']=='disponible' and empty(resultat['deletAt'])){
					$req = $baseDeDonnees->prepare('SELECT * FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
					$req->execute(array($login, $motDePasse));
					$data = $req->fetch();
					if (empty($data)) {
						//echo 'mot de passe incorect';
						return 1;
					}
					else{
						echo 'mot de passe correct';

						return $this->creerDirecteur($data['nom'],$data['prenom'],$data['telephone'],$data['adresse'],$data['login'],$data['motDePasse']);
					}
				}
				else{
					//echo 'login incorect ou pharmacie suspendu';
					return 3;
				}
			
		}

		public function deconnecter()
		{
			
		}

		public function reinitialiser($ancienMotDePasse, $nouveauMotDePasse)
		{
			$resultat = $this->check($this->getLogin(),$ancienMotDepasse, 'directeur');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE directeur SET motDePasse = ? WHERE login = ?');
				$reponse2->execute(array($nouveauModePasse, $this->getLogin()));
				echo 'modification reussi';
			}

		}

		public function releveVente($date)
		{
			$releve = array();
			$baseDeDonnees = $this->connecter();
				$req1 = $baseDeDonnees->prepare("SELECT * FROM nouvelleVente ");
				$data = $req1->fetch();
				while($data = $req1->fetch()){
					$nomProduit = $data['nomProduit'];
					$loginEmploye = $data['loginEmploye'];
					$req2 = $baseDeDonnees->prepare("SELECT nom FROM produit WHERE nom = ?");
					$req2->execute(array($nomProduit));
					$req3 = $baseDeDonnees->prepare("SELECT nom FROM employe WHERE login = ?");
					$req3->execute(array($loginEmploye));
					while($data2 = $req2->fetch() and $data3 = $req3->fetch()){
						$nomProduit = $data2['nom'];
						$nomEmploye = $data3['nom'];
						$dateVente = $data['dateVente'];
						$heure = $data['heure'];
						$quantite = $data['quantite'];
						$prix = $data['prix'];
						$nomPharmacie = $data['nomPharmacie'];
						$tab = array($nomProduit,$nomEmploye,$dateVente,$heure,$quantite,$prix,$nomPharmacie);
						$releve->append($tab);
					}
				}
				$reponse = $baseDeDonnees->prepare('DELETE * FROM nouvelleVente');
				$reponse->execute();
			
			
			
			return $releve;
		}

		public function releveAjout($date){
			     
		}
	}
?>
