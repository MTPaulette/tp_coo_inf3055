<?php
    include_once('Personne.class.php');
    class Internaute extends Personne{
        

        public function connect(){
           $bd =  $this->connecter();
           return $bd;
        }
    }
    
?>