<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');
    header("Location:http://localhost/tp_inf3055_coo_dr_monthe/tp_coo_pharmacie/views/pages/superadmin/login.php");
    
    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $superadmin = new SuperAdmin();
        $superadmin->setLogin($_SESSION['superadmin']);
        $e = $superadmin->recherchePharmacie($search);
        $_SESSION['searchSuperAdmin'] = $e;
        var_dump($e);

        if($e) {
            header("Location:../../../views/pages/superadmin/searchComponent.php");
        } else {
            echo ("aucun result");
            /*
            header("Location:../../../views/pages/superadmin/login.php");
            */
        }

    }else {
        echo "ddddddddddddddddddddddddd";
    }

?>