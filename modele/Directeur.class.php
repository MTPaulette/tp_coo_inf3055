<?php
	/**
	 * 
	 */
	require ('../Controleur/all_use_cases.php');
	include_once('Personne.class.php');
	class Directeur extends Personne
	{
		
		function __construct($nom, $prenom, $tel, $adresse, $login, $password)
		{
			parent::__construct($nom, $prenom, $tel, $adresse, $login, $password);
		}
		public function Directeur($nom, $prenom, $tel, $adresse, $login, $password)
		{
			setNom($nom);
			setPrenom($prenom);
			setTelephone($tel);
			setAdresse($adresse);
			setLogin($login);
			setMotDePasse($password);
		}

		public function addEmploye($nom, $prenom, $tel, $adresse, $etat, $login, $motDePasse){
			
			if (!empty(isset($nom))) {
				if (!empty(isset($prenom))) {
					if (!empty(isset($tel))) {
						if (!empty(isset($adresse))) {
							if (!empty(isset($etat))) {
								if (!empty(isset($login))) {
									if (!empty(isset($motDePasse))) {

										
										$baseDeDonnees = connecter();
										$req = $baseDeDonnees->prepare('INSERT INTO employe(nom, prenom, tel, adresse, etat, login, motDePasse) VALUES(?, ?, ?, ?, ?, ?, ?)');
										$req->execute(array($nom, $prenom, $tel, $adresse, $etat, $login, $motDePasse));
										if ($req == true) {
											?>
											<script type="text/javascript">alert("Employé ajouté avec succès!");</script>
											<?php

										}
										else{
											?>
											<script type="text/javascript">alert("Erreur lors de l'enregistrement de l'employé !");</script>
											<?php
										}


									}
									else{
										?>
											<script type="text/javascript">alert("Mot de passe non défini");</script>
										<?php
									}
								}
								else{
									?>
										<script type="text/javascript">alert("Login non défini!");</script>
									<?php
								}
							}
							else{
							?>
								<script type="text/javascript">alert("Etat non défini!");</script>
							<?php	
							}
						}
						else{
							?>
							<script type="text/javascript">alert("Adresse non défini !");</script>
							<?php
						}
					}
					else{
						?>
							<script type="text/javascript">alert("Numéro de téléphone non défini !");</script>
						<?php
					}
				}
				else{
					?>
						<script type="text/javascript">alert("Prénom non défini !");</script>
					<?php
				}
			}
			else{
					?>
						<script type="text/javascript">alert("Nom non défini !");</script>
					<?php
				}
		}

		public function deleteEmploye($login){
			$baseDeDonnees = connecter();
			//$req = $baseDeDonnees->prepare("DELETE FROM `employe` WHERE `employe`.`nom` =? ");
			$req = $baseDeDonnees->prepare("UPDATE `employe` SET `etat` = 'Supprimé' WHERE `employe`.`login` =?");
			$req->execute(array($login));
			if ($req == true) {
				return true;
			}
			else{
				return false;
			}
		}

		public function suspendreEmploye($login){
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare("UPDATE `employe` SET `etat` = 'Suspendu' WHERE `employe`.`login` =?");
			$req->execute(array($login));
			if($req == true){
				return true;
			}
			else{
				return false;
			}
		}

		public function rechercherEmploye($nom){
			
		}

		public function authentifier($login, $motDePasse)
		{
			if (!empty(isset($login) AND isset($motDePasse))) {
				$baseDeDonnees = connecter();
					$req = $baseDeDonnees->prepare('SELECT * FROM directeur WHERE login = ? AND motDePasse = ?');
					$req->execute(array($login, $motDePasse));
					if ($req == true) {
						$data = $req->fetch();
						session_start();
						$_SESSION['idDirecteur'] = $data['id'];
						$_SESSION['login'] = $login;
						$_SESSION['motDePasse'] = $motDePasse;
						return true;
					}
					else{
						return false;
					}
				}
			else{
				?>
					<script type="text/javascript">alert("Login ou mot de passe incorrect");</script>
				<?php
			}
		}
		public function deconnecter($url_connexion)
		{
			session_destroy();
			header("Location: $url_connexion");
		}
		public function modifierInfos($directeur)
		{
			$nom = $directeur->nom;
			$prenom = $directeur->prenom;
			$tel = $directeur->tel;
			$adresse = $directeur->adresse;
			$login = $directeur->login;
			$motDePasse = $directeur->motDePasse;
			$baseDeDonnees = connecter();
			$req = $baseDeDonnees->prepare("UPDATE `directeur` SET `nom` = ?, `prenom` = ?, `tel` = ?, `adresse` = ?, `login` = ?, `motDePasse` = ? WHERE `directeur`.`id` = ?");
			$req->execute(array($nom, $prenom, $tel, $adresse, $login, $motDePasse));
			if($req == true){
				return true;
			}
			else{
				return false;
			}

		}
		public function consulterReleverVente()
		{
			$releve = array();
			$baseDeDonnees = connecter();
			$req1 = $baseDeDonnees->prepare("SELECT * FROM vente ");
			$data = $req1->fetch();
			while($data = $req1->fetch()){
				$idProduit = $data['idProduit'];
				$idEmploye = $data['idEmploye'];
				$req2 = $baseDeDonnees->prepare("SELECT nom FROM produit WHERE id = ?");
				$req2->execute(array($idProduit));
				$req3 = $baseDeDonnees->prepare("SELECT nom FROM employe WHERE id = ?");
				$req3->execute(array($idEmploye));
				while($data2 = $req2->fetch() and $data3 = $req3->fetch()){
					$nomProduit = $data2['nom'];
					$nomEmploye = $data3['nom'];
					$dateVente = $data['dateVente'];
					$heure = $data['heure'];
					$quantite = $data['quantite'];
					$prix = $data['prix'];
					$tab = array($nomProduit,$nomEmploye,$dateVente,$heure,$quantite,$prix);
					$releve->append($tab);
				}
			}
			return $releve;
		}
	}
?>