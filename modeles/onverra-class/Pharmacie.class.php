<?php
    class pharmacie{
        private $nom;
        private $localisation;
        private $ouvert;
        private $etat;

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getLocalisation()
        {
            return $this->localisation;
        }
        public function setLocalisation($localisation){
            $this->localisation = $localisation;
        }
        public function getOuvert(){
            return $this->ouvert;
        }
        public function setOuvert($ouvert){
            $this->ouvert = $ouvert;
        }
        public function getEtat(){
            return $this->etat;
        }
        public function setEtat($etat){
            $this->etat = $etat;
        }
    }
?>