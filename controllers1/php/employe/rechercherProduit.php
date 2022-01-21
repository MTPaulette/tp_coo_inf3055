<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Employe.class.php');

    
    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];

        $employe = new Employe();
        $employe->setLogin($_SESSION['employe']);
        $e = $employe->rechercher($search);
        //var_dump($e);

        if($e) {
            $_SESSION['produitRecherche'] = $e;
            header("Location:../../../views/pages/employe/rechercherProduit.php");
        } else {
            header("Location:../../../views/pages/employe/404.php");
        }

    }

?>