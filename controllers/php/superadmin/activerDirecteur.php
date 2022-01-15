<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');

    if(isset($_POST['password'])) {
        $motDePasse = $_POST['password'];
        $selectionne = $_POST['directeurSelectionne'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $superadmin = new SuperAdmin();
        $e = $superadmin->activerPharmacie($motDePasse, $selectionne);

        var_dump($e);
/*
        $_SESSION['searchSuperAdmin'] = $e;

        if($e) {
            header("Location:../../../views/pages/superadmin/searchComponent.php");
        } else {
            echo ("aucun result");
            /*
            header("Location:../../../views/pages/superadmin/login.php");
            
        }
        */
    }
    

?>