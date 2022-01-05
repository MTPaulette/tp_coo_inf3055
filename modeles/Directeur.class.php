<?php

	/**
	 * 
	 */
	include_once('Personne.class.php');
	class Directeur extends Personne
	{
		
		function __construct($nom, $prenom, $tel, $adresse, $login, $password)
		{
			parent::__construct($nom, $prenom, $tel, $adresse, $login, $password);
			echo "<h1>directeur</h1>";
		}


		public function connecter(){
		try {
			$bd = new PDO('mysql:host=localhost;dbname=tpcoo','root','');
			echo "connexion reussi";
			} catch (PDOException $e) {
				die('Erreur'.$e->getmessage());
			echo "echec connexion";
		}
		return $bd;
		}

		function enregistrer($nom, $prenom, $tel, $adresse, $login, $password ){
			$bd = $this->connecter();
			$rep = $bd->prepare('SELECT login FROM directeur WHERE login = ? /* AND motDePasse=PASSWORD(?) */');
			$rep->execute(array($login /*, $password */));
			$nom = $rep->fetch();

			if(empty($nom)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('INSERT INTO directeur(nom, prenom, telephone, adresse, dateConnexion, login, motDePasse) VALUES(?,?,?,?,?,?,PASSWORD(?))');
				$reponse->execute(array($nom, $prenom, $tel, $adresse,$date, $login, $password));
				//echo "<h1>enregistre</h1>";
				return true;
			}
			else{
				//echo "____&client existant";
				return false;
			}
		}

		public function authentification($login, $motDePasse){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT * FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
			$p = $req->execute(array($login,$motDePasse));
			$param = $req->fetch();
			if(!$param)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		public function deconnecter(){

		}	

		public  function modifierInfos($personne){

		}

		
	}

	
?>