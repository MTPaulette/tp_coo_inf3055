<?php
    class Produit 
    {
        private $nom;
		private $description;
		private $prix;
		private $type;
        private $quantite;
        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getDescription(){
            return $this->description = $description;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function getPrix(){
            return $this->prix;
        }
        public function setPrix($prix){
            $this->prix = $prix;
        }
        public function getType(){
            return $this->type;
        }
        public function setType($type){
            $this->type = $type;
        }
        public function getQuantite(){
            return $this->quantite;
        }
        public function setQuantite($quantite){
            $this->quantite = $quantite;
        }
    }
    
?>