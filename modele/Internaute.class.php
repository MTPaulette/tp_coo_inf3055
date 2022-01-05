<?php
	/**
	 * 
	 */
	include_once('Personne.class.php');
	class Internaute extends Personne
	{
		
		function __construct($nom, $prenom, $tel, $adresse, $login, $password)
		{
			parent::__construct($nom, $prenom, $tel, $adresse, $login, $password);
		}


		public function connecter(){
		try {
			$bd = new PDO('mysql:host=localhost;dbname=tpcoo','root','');
			//echo "connexion reussi";
			} catch (PDOException $e) {
				die('Erreur'.$e->getmessage());
				echo "echec connexion";
			}
			return $bd;
		}

		function recherchePoduit($nom){

		}

		function payerCommande($commande){
			
		}

		function enregistrer($nom, $prenom, $tel, $adresse, $login, $password ){
			$bd = $this->connecter();
			$rep = $bd->prepare('SELECT nom FROM internaute WHERE login = ? AND motDePasse=PASSWORD(?)');
			$rep->execute(array($login, $password ));
			$nom = $rep->fetch();
			if(empty($nom)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('INSERT INTO internaute(nom, prenom, telephone, adresse, dateConnexion, login, motDePasse) VALUES(?,?,?,?,?,?,PASSWORD(?))');
				$reponse->execute(array($nom, $prenom, $tel, $adresse,$date, $login, $password));
				return true;
			}
			else{
				echo "____&client existant";
				return false;
			}
		}

		public function authentifier($login, $password){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT nom FROM internaute WHERE login = ? AND motDePasse = PASSWORD(?)');
			$p = $req->execute(array($login,$password));
			$param = $req->fetch();
			if(empty($param))
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