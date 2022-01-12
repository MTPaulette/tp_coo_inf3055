
<?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL|E_STRICT);
        require('../../../modeles/Employe.class.php');
        if(isset($_POST['nom'])and isset($_POST['prenom'])and isset($_POST['telephone'])
            and isset($_POST['adresse'])and isset($_POST['login'])and isset($_POST['password'])){
            $nom          = $_POST['nom'];
            $prenom          = $_POST['prenom'];
            $telephone          = $_POST['telephone'];
            $adresse        = $_POST['adresse'];
            $login        = $_POST['login'];
            $motDePasse     = $_POST['password'];

            
            $employe = new Employe($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
            $employe->enregistrer($nom, $prenom, $telephone,$adresse, $login, $motDePasse);

            echo "<h1>Enrégistrement de <b>$login </b> effectué avec succès</h1>";
        }
    ?>