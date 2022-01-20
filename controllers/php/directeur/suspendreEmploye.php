<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Directeur.class.php');

    if(isset($_POST['password'])) {
        $motDePasse = $_POST['password'];
        $selectionne = $_POST['employeSelectionne'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $directeur = new Directeur();
        $directeur->setLogin($_SESSION['directeur']);
        $e = $directeur->suspendreEmploye($motDePasse, $selectionne);
        
        if($e) {
            header("Location:../../../views/pages/directeur/rechercherEmploye.php");
        } else {
            header("Location:../../../views/pages/directeur/erreur.php");
        }
    }
    

?>