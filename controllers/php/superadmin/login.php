<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/SuperAdmin.class.php');

    if(isset($_POST['login'])and isset($_POST['password'])){
        
        

        $login    = $_POST['login'];
        $password = $_POST['password'];

        $superadmin = new SuperAdmin('Nsangou', 'Andamou', 690264775,'yaounde','Adams','Alim');
        $e = $superadmin->authentification($login,$password);
       // $e = superadmin::authentification($login,$password);
        
        if($e) {
            $_SESSION['superadmin'] = $login;
            header("Location:../../../views/pages/superadmin/dashboard.php");
            //echo '<p>la variable de session est'.$_SESSION['superadmin'].'</p>';
        } else {
            header("Location:../../../views/pages/superadmin/login.php");
        }
        

    }

?>