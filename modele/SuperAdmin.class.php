<?php
	


	include_once('Personne.class.php');
	/**
	 * 
	 */
	class SuperdAdmin extends Personne
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
		//authentification du superAdmin
		public function authentifier($login, $password){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT nom FROM superAdmin WHERE login = ? AND motDePasse = PASSWORD(?)');
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

		//enregistrer une nouvelle pharmacie
		public function creerPharmacie($pharmacie){

		}


		function suspendrePharmacie($pharmacie){

		}
		function supprimerPharmacie($pharmacie){

		}

		function recherchePharmacie($pharmacie){
			
		}
		//deconnecion
		public function deconnecter(){

		}	

		//modification  des données
		public  function modifierInfos($personne){

		}


	}
?>