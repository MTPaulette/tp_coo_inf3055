<?php
	/**
	 * 
	 */

	include_once('Personne.class.php');
	class Employe extends Personne
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
		public function addProduit($nom, $description, $prix, $quantite, $type, $login, $password){
			
			$bd = $this->connecter();
			$reponse1 = $bd->prepare('SELECT quantite FROM produit WHERE nom = ?');
			$reponse1->execute(array($nom));
			$ad = $reponse1->fetch();
			if(!empty($ad)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$newQuantite = $ad['quantite'] + $quantite;
				$reponse = $bd->prepare('UPDATE produit SET quantite = ?, dateAjout = ?, heure = ?');
				$reponse->execute(array($newQuantite,$date,$date));
				return "modification reussi";
			}
			else{
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('SELECT id FROM employe WHERE login = ? AND motDePasse = PASSWORD(?)');
				$reponse->execute(array($login, $password));
				$id = $reponse->fetch();
				if(!empty($id)){
					$reponse3 = $bd->prepare('INSERT INTO produit(nom, description, prix, quantite, type, dateAjout, heure, idEmploye) VALUES(?,?,?,?,?,?,?,?)');
					$reponse3->execute(array($nom, $description, $prix, $quantite, $type, $date, $date, $id['id']));
					return "Ajout reussi";
				}
				else{
					return "employe non existant";
				}
				return "ajout echoue";
			}
		}

		public function deleteProduit($produit){

		}

		public function rechercher($produit){

		}
		public function vendre($produit){

		}

		public function consulterRelever(){
			
		}

		public function authentifier($login, $password){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT nom FROM employe WHERE login = ? AND motDePasse = PASSWORD(?)');
			$p = $req->execute(array($login,$password));
			$param = $req->fetch();
			if(empty($param))
			{
            			return false;
			}
			else
			{
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bdd->prepare('UPDATE employe SET dateConnexion = ?, heureConnexion = ? WHERE login = ? AND motDePasse = PASSWORD(?)');
				$reponse->execute(array($date,$date,$login,$password));
           			return true;
			}

		}

		public function deconnecter(){

		}	

		public  function modifierInfos($personne){

		}
	}
?>
