<?php

	/**
	 * 
	 */
	include_once('Personne.class.php');
	class Superadmin extends Personne
	{
		
		function __construct($nom, $prenom, $tel, $adresse, $login, $password)
		{
			parent::__construct($nom, $prenom, $tel, $adresse, $login, $password);
			echo "<h1>superadmin</h1>";
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
			$rep = $bd->prepare('SELECT nom FROM superadmin WHERE login = ? /* AND motDePasse=PASSWORD(?) */');
			$rep->execute(array($login /*, $password */));
			$nom = $rep->fetch();

			if(empty($nom)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('INSERT INTO superadmin(nom, prenom, telephone, adresse, dateConnexion, login, motDePasse) VALUES(?,?,?,?,?,?,PASSWORD(?))');
				$reponse->execute(array($nom, $prenom, $tel, $adresse,$date, $login, $password));
				//echo "<h1>enregistre</h1>";

				//redirection vers la page de connexion pour un superadmin
				header("Location:http://localhost/tp_cms/html/dashboard/index.php");
				return true;
			}
			else{
				//echo "____&client existant";
				return false;
			}
		}

		public function authentification($login, $motDePasse){
			$bdd = connecter();
			$req = $bdd->prepare('SELECT * FROM superadmin WHERE login = ? AND motDePasse = PASSWORD(?)');
			$p = $req->execute(array($login,$password));
			$param = $req->fetch();
			if(!$param)
			{
				header("Location:http://localhost/tp_cms/html/dashboard/index.php");
			}
			else
			{
				header("Location:http://localhost/tp_cms/html/dashboard/presentation.php");
				$_SESSION['enseignant'] = $login;
				$_SESSION['theme'] = 1;
				echo '<p>la variable de session est'.$_SESSION['enseignant'].'</p>';
			}
		}

		public function deconnecter(){

		}	

		public  function modifierInfos($personne){

		}

		
	}

	
?>