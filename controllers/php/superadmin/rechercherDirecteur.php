<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');


    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $superadmin = new SuperAdmin();
        $superadmin->setLogin($_SESSION['superadmin']);
        $e = $superadmin->recherchePharmacie($search);
        $_SESSION['search'] = $e;
        var_dump($e);

        
        if($e) {
            header("Location:../../../views/pages/superadmin/searchResult.php");
        } else {
            echo ("aucun result");
            /*
            header("Location:../../../views/pages/superadmin/login.php");
            */
        }

    }

?>