<?php
	abstract Class Personne{
		private $nom;
		private $prenom;
		private $telephone;
		private $motDepasse;
		private $login;
		private $adresse;

		function __construct($nouveauNom, $nouveauPrenom, $nouveauTel, $nouveauPassword, $nouveauLogin, $nouveauAdresse){
			$this->nom = $nouveauNom;
			$this->prenom = $nouveauPrenom;
			$this->telephone = $nouveauTel;
			$this->motDePasse = $nouveauPassword;
			$this->login = $nouveauLogin;
			$this->adresse = $nouveauAdresse;
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

		public function setMotDePasse($nouveauPassword){
			$this->motDePasse = $nouveauPassword;
		}

		public function setLogin($nouveauLogin){
			$this->login = $nouveauLogin;
		}

		public function setAdresse($nouveauAdresse){
			$this->adresse = $nouveauAdresse;
		}

		public abstract function authentification($login, $password);

		public abstract function deconnecter();		

		public abstract function modifierInfos($personne);

		
	}


?>