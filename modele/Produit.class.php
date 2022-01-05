<?php
	/**
	 * 
	 */
	
	class Produit
	{
		$nom;
		$description;
		$prix;
		$type;
		$quantite;
		function __construct($nom, $description, $prix, $type, $quantite)
		{
			$this->nom = $nom;
			$this->description = $description;
			$this->prix = $prix;
			$this->type = $type;
			$this->quantite = $quantite;
		}

	}
?>