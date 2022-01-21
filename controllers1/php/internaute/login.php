<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Employe.class.php');

    if(isset($_POST['login'])and isset($_POST['password'])){
        
    
        $login    = $_POST['login'];
        $password = $_POST['password'];

        $employe = new Employe();
        $employe->setLogin($login);
        $e = $employe->authentifier($login,$password);
        
        if(!empty($e)) {
            $_SESSION['employe'] = $employe->getLogin();
            header("Location:../../../views/pages/employe/dashboard.php");
        } else {
            header("Location:../../../views/pages/employe/login.php");
        }

    }

?>