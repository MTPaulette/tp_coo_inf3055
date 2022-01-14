<?php
	/**
	 * 
	 */
	require('../interface/Connexion.interface.php');
	include_once('Personne.class.php');
	class SuperAdmin extends Personne implements Connexion
	{
		

		//rechrche
		private function check($login, $table){
			$bd = $this->connecter();
			$reponse = $bd->prepare("SELECT * FROM {$table} WHERE login = ?");
			$reponse->execute(array($login));
			$resultat = $reponse->fetch(); 
			return $resultat;
		}


		//authentification du superAdmin
		public function authentifier($login, $password){
			$bdd = $this->connecter();
			$req = $bdd->prepare('SELECT login FROM superadmin WHERE login = ? AND motDePasse = ?');
			$req->execute(array($login,$password));
			$param = $req->fetch();
			if(empty($param))
			{
            	return false;
			}
			else
			{
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bdd->prepare('UPDATE superadmin SET date_connexion = ?');
				$reponse->execute(array($date));
           		return true;
			}

		}

		//deconnecion
		public function deconnecter(){
			$bd = $this->connecter();
			$dateJour = new \DateTime('now');
			$date = $dateJour->format('y-m-d H:i:s');
			$reponse = $bd->prepare('UPDATE superadmin SET date_deconnexion = ?');
			$reponse->execute(array($date));
		}	

		//modification  des données
		public  function reinitialiser($ancienMotDepasse, $nouveauModePasse){
			
			/*$reponse = $bd->prepare('SELECT * FROM superadmin WHERE motDePasse = ? AND login = ? ');
			$reponse->execute(array($ancienMotDepasse, $this->getLogin()));*/
			$resultat = $this->check($this->getLogin(), 'superadmin');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE superadmin SET motDePasse = ? WHERE login = ?');
				$reponse2->execute(array($nouveauModePasse, $this->getLogin()));
				echo 'modification reussi';
			}
			
		}
		//ajout d'un directeur
		private function  addDirecteur($nom, $prenom, $tel, $adresse, $login, $password){
				
				//vérifier si le mot de passe et le login entrés par le directeur n'existent pas déjà
				
				$resultat = $this->check($login, 'directeur');
				if(empty($resultat)){
					$bd = $this->connecter();
					//recupérer la date et l'heure du jour
					$dateJour = new \DateTime('now');
					$date = $dateJour->format('y-m-d H:i:s');
					//insertion du directeur
					$reponse = $bd->prepare('INSERT INTO directeur(nom, prenom, telephone, adresse, createdAt, heure, login, motDePasse, loginSuperAdmin) VALUES(?,?,?,?,?,?,?,PASSWORD(?),?)');
					$reponse->execute(array($nom, $prenom, $tel, $adresse, $date, $date, $login, $password,$this->getLogin()));
					return true;
				}
				else{
					return false;
				}
				
			
			
		}


		//enregistrer une nouvelle pharmacie
		public function creerPharmacie($nom, $localisation,$nomD, $prenomD, $telD, $adresseD, $loginD, $passwordD){
			
			//recupérer l'identifant du superAdmin
			
			$SuperAdmin = $this->check($this->getLogin(), 'superadmin');
			if(!empty($SuperAdmin)){
				//ajouter le directeur de la pharmacie
				$valeur = $this->addDirecteur($nomD, $prenomD, $telD, $adresseD, $loginD, $passwordD);
				if($valeur){
					$bd = $this->connecter();
					//recupérer l'identifiant du directeur ajouter
					$reponse2 = $bd->prepare('SELECT * FROM directeur WHERE login = ?');
					$reponse2->execute(array($loginD));
					$Directeur = $reponse2->fetch();
					//$this->check($loginD,$passwordD, 'directeur');
					if(!empty($Directeur)){
					
						//recupération de la date du jour
						$dateJour = new \DateTime('now');
						$date = $dateJour->format('y-m-d H:i:s');
						//création de la pharmacie
						$reponse3 = $bd->prepare('INSERT INTO pharmacie(nom, localisation, createdAt, ouvert, etat, loginDirecteur, loginSuperAdmin) VALUES (?,?,?,?,?,?,?)');
						$reponse3->execute(array($nom, $localisation, $date, 1,'disponible',$Directeur['login'],$SuperAdmin['login']));
						echo 'creation de la pharmacie et du directeur reussi';
						return 1;
					}
					else{
						echo 'en cas décgec de création de la pharmacie';
						return 2;
					}
					echo 'ajout du directeur reussi';
					return 3 ;
				}
				else{
					echo 'en cas déchec dajout de directeur';
					return 4;
				}
				echo 'lorsquon trouve ladmin';
				return 5;
			}
			else{
				echo 'lorsque ladmin nexiste pas';
				return 6;
			}
		}


		function suspendrePharmacie($nom){
			$bd = $this->connecter();
			try {
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('UPDATE pharmacie SET etat = ?, modifiedAt = ? WHERE nom = ?');
				$reponse->execute(array('suspendue',$date,$nom));
				echo 'reussi';
				return true;
			} catch (PDOException $e) {
				$e->getmessage();
				echo 'echec';
				return false;
				
			}
			

		}
		function activerPharmacie($nom){
			$bd = $this->connecter();
			try {
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('UPDATE pharmacie SET etat = ?, modifiedAt = ? WHERE nom = ?');
				$reponse->execute(array('disponible',$date,$nom));
				return true;
			} catch (PDOException $e) {
				$e->getmessage();
				return false;
				
			}
		}
		function supprimerPharmacie($nomPharmacie){
			$bd = $this->connecter();
			try {
				//selection le directeur à qui appartien la pharmacie
				$reponse = $bd->prepare('SELECT loginDirecteur FROM pharmacie WHERE nom = ?');
				$reponse->execute(array($nomPharmacie));
				$loginDirecteur = $reponse->fetch();
				//supprimer la pharmacie
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse2 = $bd->prepare('UPDATE pharmacie SET etat = ?,deleteAt = ? WHERE nom = ?');
				$reponse2->execute(array('supprimer',$date ,$nomPharmacie));
				//supprimer le directeur à qui appartien la pharmacie
				$reponse3 = $bd->prepare('UPDATE directeur SET deleteAt = ? WHERE login = ?');
				$reponse3->execute(array($date,$loginDirecteur['loginDirecteur']));
				return true;
			} catch (PDOException $e) {
				$e->getmessage();
				return false;
				
			}
		}

		function recherchePharmacie($nomPharmacie){
			$bd = $this->connecter();
			$reponse = $bd->prepare('SELECT * FROM pharmacie WHERE nom LIKE ?');	
			$reponse->execute(array('%'.$nomPharmacie.'%'));
			$pharmacie = $reponse->fetch();
			if(!empty($pharmacie)){
				return $pharmacie;
			}
			else{
				return null;
			}
		}
		
	}
?>