<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');

    echo "bjjjjjjjjjjjjjjjrrrrrrrrrrrrrrrrrrrr";

    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];

        //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
        $superadmin = new SuperAdmin();
        $superadmin->setLogin($_SESSION['superadmin']);
        $e = $superadmin->recherchePharmacie($search);
        

        if($e) {
            $_SESSION['searchSuperAdmin'] = $e;
            //return $e;
            header("Location:../../../views/pages/superadmin/searchComponent.php");
        } else {
           header("Location:../../../views/pages/superadmin/404.php");
           //echo 'failed';
           //echo ('je suis  la mauvaise reponse'.$search);
        }
    }

?>