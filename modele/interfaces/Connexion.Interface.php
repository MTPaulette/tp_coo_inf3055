<?php
	interface Connexion
	{
		public function authentifier($login, $motDePasse);
		public function deconnecter();
		public function reinitialiser($ancienMotDePasse, $nouveauMotDePasse);
		
	}
?>