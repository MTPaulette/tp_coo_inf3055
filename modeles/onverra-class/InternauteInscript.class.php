<?php
    require('../interfacte/Inscription.Interface.php');
    require('../interface/Connexion.Interface.php');
    include_once('Internaute.class.php');
    class InternauteInscript extends Internaute implements Inscription, Connexion{
        public function creerCompte($nom,$prenom,$telephone,$adresse,$login,$motDePasse){
            
        }
    }
?>