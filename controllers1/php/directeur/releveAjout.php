<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Directeur.class.php');

        $directeur = new Directeur();
        $directeur->setLogin($_SESSION['directeur']);
        $e = $directeur->releveAjout();
        //var_dump($e);

        if($e) {
            $_SESSION['releveAjout'] = $e;
            header("Location:../../../views/pages/directeur/releveAjout.php");
        } else {
            header("Location:../../../views/pages/directeur/404.php");
        }

?>