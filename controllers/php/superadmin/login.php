<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');

    if(isset($_POST['login'])and isset($_POST['password'])){
        
    
        $login    = $_POST['login'];
        $password = $_POST['password'];

        $superadmin = new SuperAdmin();
        $e = $superadmin->authentifier($login,$password);
/*
        if(!$e) {
            header("Location:../../../views/pages/superadmin/login.php");
        } else {
            $_SESSION['superadmin'] = $e;
            header("Location:../../../views/pages/superadmin/dashboard.php");
        }*/
        
        if($e) {
            $_SESSION['superadmin'] = $login;
            //var_dump($_SESSION['superadmin']->getLogin());
            header("Location:../../../views/pages/superadmin/dashboard.php");
        } else {
            header("Location:../../../views/pages/superadmin/login.php");
        }

    }

?>