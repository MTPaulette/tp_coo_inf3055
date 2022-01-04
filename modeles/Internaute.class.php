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

		function enregistrer($nom, $prenom, $tel, $adresse, $login, $password ){
			$bd = $this->connecter();
			$rep = $bd->prepare('SELECT nom FROM internaute WHERE login = ? AND motDePasse=?');
			$rep->execute(array($login, $password ));
			$nom = $rep->fetch();
			if(empty($nom)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('INSERT INTO internaute(nom, prenom, telephone, adresse, dateConnexion, login, motDePasse) VALUES(?,?,?,?,?,?,?)');
				$reponse->execute(array($nom, $prenom, $tel, $adresse,$date, $login, $password));
				return true;
			}
			else{
				echo "____&client existant";
				return false;
			}
		}

		public function authentification($login, $motDePasse){
			$bdd = connecter();
			$req = $bdd->prepare('SELECT * FROM internaute WHERE login = ? AND motDePasse = PASSWORD(?)');
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