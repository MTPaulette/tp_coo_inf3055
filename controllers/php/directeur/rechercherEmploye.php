<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Directeur.class.php');

    
    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $directeur = new Directeur();
        $directeur->setLogin($_SESSION['directeur']);
        $e = $directeur->rechercherEmploye($search);
        var_dump($e);

        if($e) {
            $_SESSION['searchdirecteur'] = $e;
            header("Location:../../../views/pages/directeur/rechercherEmploye.php");
        } else {
            header("Location:../../../views/pages/directeur/404.php");
        }

    }

?>