<?php
	


	include_once('Personne.class.php');
	/**
	 * 
	 */
	class SuperAdmin extends Personne
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
			$req->execute(array($login,$password));
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

		function addDirecteur($nom, $prenom, $tel, $adresse, $login, $password){
				$bd = $this->connecter();
				//verifier si le login et le mot de passe insérés n'existe pas déjà
				$reponse = $bd->prepare('SELECT id FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
				$reponse->execute(array($login, $password));
				$resultat = $reponse->fetch();
				if(empty($resultat)){
					$dateJour = new \DateTime('now');
					$date = $dateJour->format('y-m-d H:i:s');
					$reponse = $bd->prepare('INSERT INTO directeur(nom, prenom, telephone, adresse, dateAjout, heure, login, motDePasse) VALUES(?,?,?,?,?,?,?,PASSWORD(?))');
					$reponse->execute(array($nom, $prenom, $tel, $adresse, $date, $date, $login, $password));
					return true;
				}
				else{
					return false;
				}
				
			
			
		}


		//enregistrer une nouvelle pharmacie
		public function creerPharmacie($nom, $localisation,$ouvert,$etat, $loginS, $passwordS,$nomD, $prenomD, $telD, $adresseD, $loginD, $passwordD){
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT id FROM superAdmin WHERE login = ? AND motDePasse = ?');
			$reponse->execute(array($loginS, $passwordS));
			$idSuperAdmin = $reponse->fetch();
			if(!empty($idSuperAdmin)){
				//ajout du directeur de la pharmacie
				$valeur = $this->addDirecteur($nomD, $prenomD, $telD, $adresseD, $loginD, $passwordD);
				if($valeur){
					$reponse2 = $bd->prepare('SELECT id FROM directeur WHERE login = ? AND motDePasse = PASSWORD(?)');
					$reponse2->execute(array($loginD, $passwordD));
					$idDirecteur = $reponse2->fetch();
					if(!empty($idDirecteur)){
						$dateJour = new \DateTime('now');
						$date = $dateJour->format('y-m-d H:i:s');
						$reponse3 = $bd->prepare('INSERT INTO pharmacie(nom, localisation, dateCreation, ouvert, etat, idDirecteur, idSuperAdmin) VALUES (?,?,?,?,?,?,?)');
						$reponse3->execute(array($nom, $localisation, $date, $ouvert,$etat,$idDirecteur['id'],$idSuperAdmin['id']));
						
						return "creation reussi";
					}
					else{
						
						return "echec creation";
					}
					return "ajout de directeur reussir";
				}
				else{
					return "ajout de directeur echoué";
				}
				return "admin exist";
			}
			else{
				
				return "admin n'existe pas";
			}
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
