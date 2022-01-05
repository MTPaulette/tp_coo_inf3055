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
		}

		public function connecter(){
		try {
			$bd = new PDO('mysql:host=localhost;dbname=tpcoo','root','');
			//echo "connexion reussi";
			} catch (PDOException $e) {
				die('Erreur'.$e->getmessage());
				//echo "echec connexion";
			}
			return $bd;
		}

		public function addEmploye($nom, $prenom,$tel, $adresse,$etat,$login,$password,$loginD,$passwordD){
			$bd = $this->connecter();
			//recherche si le login et mot de passe existe
			$reponse = $bd->prepare('SELECT nom FROM employe WHERE login = ? AND motDePasse = PASSWORD(?)');
			$reponse->execute(array($login,$password));
			$resulat = $reponse->fetch();
			//recherche pour recupérer l'id du directeur
			$reponse2 = $bd->prepare('SELECT id FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
			$reponse2->execute(array($loginD,$passwordD));
			$idDirecteur = $reponse2->fetch();
			if(empty($resulat) and !empty($idDirecteur)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse2 = $bd->prepare('INSERT INTO employe(nom,prenom, telephone, adresse, etat, dateConnexion, heureConnexion, login, motDePasse, idDirecteur) VALUES(?,?,?,?,?,?,?,?,?,?)');
				$reponse2->execute(array($nom, $prenom,$tel,$adresse,$etat,$date,$date,$login,$password,$idDirecteur['id']));
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteEmploye($employe){

		}

		public function suspendreEmploye($employe){

		}

		public function rechercherEmploye($employe){
			
		}

		public function authentifier($login, $password){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT nom FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
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
