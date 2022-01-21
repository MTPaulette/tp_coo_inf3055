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
        //var_dump($e);
        
        
        if(!empty($e)) {
            $_SESSION['directeur'] = $e->getlogin();
            header("Location:../../../views/pages/directeur/dashboard.php");
        } else {
            header("Location:../../../views/pages/directeur/login.php");
        }

    }

?>