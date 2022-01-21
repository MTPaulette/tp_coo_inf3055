<?php
	/**
	 * 
	 */
	require(__DIR__."/../interface/Bd.interface.php");
	abstract Class Personne implements Bd
	{
		
		private $nom;
		private $prenom;
		private $telephone;
		private $motDepasse;
		private $login;
		private $adresse;

	
		
		//connexion à la bd
		public function connecter(){
		try {
			$bd = new PDO('mysql:host=localhost;dbname=tp_coo_inf3055','root','');
			} catch (PDOException $e) {
				die('Erreur'.$e->getmessage());
			}
			return $bd;
		}


		public function getNom(){
			return $this->nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function getTelephone(){
			return $this->telephone;
		}

		public function getMotDePasse(){
			return $this->motDePasse;
		}

		public function getLogin(){
			return $this->login;
		}

		public function getAdresse(){
			return $this->adresse;
		}

		public function setNom($nouveauNom){
			$this->nom = $nouveauNom;
		}

		public function setPrenom($nouveauPrenom){
			$this->prenom = $nouveauPrenom;
		}

		public function setTelephone($nouveauTel){
			$this->telephone = $nouveauTel;
		}

		public function setMotDePasse($nouveauMotDePasse){
			$this->motDePasse = $nouveauMotDePasse;
		}

		public function setLogin($nouveauLogin){
			$this->login = $nouveauLogin;
		}

		public function setAdresse($nouveauAdresse){
			$this->adresse = $nouveauAdresse;
		}
	}
?>
