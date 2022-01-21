<?php
    require_once(__DIR__.'/../interface/Inscription.Interface.php');
    require_once(__DIR__.'/../interface/Connexion.Interface.php');
    include_once(__DIR__.'/Internaute.class.php');
    class InternauteInscript extends Internaute implements Inscription, Connexion{
        public function creerCompte($nom, $prenom, $tel, $adresse,$photo, $login, $password ){
			$bd = $this->connecter();
			
			$rep = $bd->prepare('SELECT nom FROM internaute WHERE login = ? ');
			$rep->execute(array($login));
			$nom = $rep->fetch();
			if(empty($nom)){
				$dateJour = new \DateTime('now');
				$date = $dateJour->format('y-m-d H:i:s');
				$reponse = $bd->prepare('INSERT INTO internaute(nom, prenom, telephone, adresse,createdAt, dateConnexion, login, motDePasse) VALUES(?,?,?,?,?,?,?,PASSWORD(?))');
                $reponse->execute(array($nom, $prenom, $tel, $adresse,$date,$date, $login, $password));
                echo "Reussi";
				return true;
			}
			else{
				echo "____&client existant";
				return false;
			}
        }
        public function authentifier($login, $motDePasse){
            $bdd = $this->connecter();
			$req = $bdd->prepare('SELECT login FROM internaute WHERE login = ? AND motDePasse = PASSWORD(?)');
			$req->execute(array($login,$motDePasse));
			$param = $req->fetch();
			if(empty($param))
			{
            	return false;
			}
			else
			{
           		return $param['login'];
			}
        }
        public function payerCommende(){

        }
        public function deconnecter(){

        }
        private function check($login, $table){
			$bd = $this->connecter();
			$reponse = $bd->prepare("SELECT * FROM {$table} WHERE login = ? ");
			$reponse->execute(array($login));
			$resultat = $reponse->fetch(); 
			return $resultat;
		}
        public function reinitialiser($ancienMotDepasse, $nouveauMotDePasse){
            $resultat = $this->check($this->getLogin(), 'internaute');
			if(empty($resultat)){
				echo 'le mot de passe entré est incorrecte';
			}
			else{
				$bd = $this->connecter();
				$reponse2 = $bd->prepare('UPDATE internaute SET motDePasse = ? WHERE login = ?');
				$reponse2->execute(array($nouveauMotDePasse, $this->getLogin()));
				echo 'modification reussi';
			}
		}
		public function afficheproduit(){
			$bd = $this->connecter();
			$listeProduit = array();
			//recuperer le nom et la localisation ouverte et non suspendue
			$reponse = $bd->prepare('SELECT nom , localisation FROM pharmacie WHERE ouvert = ? AND etat = ?');
			$reponse->execute(array(1,'disponible'));
			while($resultat = $reponse->fetch()){
				$nomPharmacie = $resultat['nom'];
				$localisation = $resultat['localisation'];
				//je recupère le produit se trouvant dans une pharmacie ouverte 
				$reponse2 = $bd->prepare('SELECT * FROM produit WHERE  nomPharmacie = ?  AND quantite > ?');
				$reponse2->execute(array($nomPharmacie,0));
				while($produit = $reponse2->fetch()){
					//je stock le produit dans une liste
					$liste = array($produit['photo'],$produit['nomp'],$produit['prix'],$prouit['quantite'],$produit['nomPharmacie'],$localisation);
					$listeProduit[] = $liste;
					
				}
				//else{
					
				//}
				
			}
			return $listeProduit;
		}

		public function recherche($nomProduit){
			$bd = $this->connecter();
			$listeProduit = array();
			//recuperer le nom et la localisation ouverte et non suspendue
			$reponse = $bd->prepare('SELECT nom , localisation FROM pharmacie WHERE ouvert = ? AND etat = ?');
			$reponse->execute(array(1,'disponible'));
			while($resultat = $reponse->fetch()){
				$nomPharmacie = $resultat['nom'];
				$localisation = $resultat['localisation'];
				//je recupère le produit se trouvant dans une pharmacie ouverte 
				$reponse2 = $bd->prepare('SELECT * FROM produit WHERE nomP LIKE ? AND nomPharmacie = ?  AND quantite > ?');
				$reponse2->execute(array('%'.$nomProduit.'%',$nomPharmacie,0));
				while($produit = $reponse2->fetch()){
					//je stock le produit dans une liste
					$liste = array($produit['nomp'],$produit['prix'],$produit['photo'],$produit['quantite'],$produit['type'],$produit['description'],$produit['nomPharmacie'],$localisation);
					$listeProduit[] = $liste;
					
				}
				//else{
					
				//}
				
			}
			return $listeProduit;

		}
    }
?>
