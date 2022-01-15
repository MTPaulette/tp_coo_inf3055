<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Directeur.class.php');

    if(isset($_POST['login'])and isset($_POST['password'])){
        
    
        $login    = $_POST['login'];
        $password = $_POST['password'];

        $directeur = new Directeur();
        $e = $directeur->authentifier($login,$password);
        
        if(!empty($e)) {
            echo "njr";
            $_SESSION['directeur'] = $e->getlogin();
            //var_dump($_SESSION['directeur']->getLogin());
            header("Location:../../../views/pages/directeur/dashboard.php");
        } else {
            header("Location:../../../views/pages/directeur/login.php");
        }

    }

?>