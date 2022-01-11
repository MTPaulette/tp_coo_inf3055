<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/Directeur.class.php');

    if(isset($_POST['login'])and isset($_POST['password'])){

        $login    = $_POST['login'];
        $password = $_POST['password'];

        $directeur = new Directeur();
        $e = $directeur->authentifier($login,$password);
        
        if($e) {
            $_SESSION['directeur'] = $login;
            header("Location:../../../views/pages/directeur/dashboard.php");
            //echo '<p>la variable de session est'.$_SESSION['directeur'].'</p>';
        } else {
            header("Location:../../../views/pages/directeur/login.php");
        }

    }

?>