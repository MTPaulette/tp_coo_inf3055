<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');


        $superadmin = new SuperAdmin();
        $superadmin->setLogin($_SESSION['superadmin']);
        $e = $superadmin->tousActifs();

        //var_dump($e);

       

        if($e) {
            $_SESSION['tousActifs'] = $e;
            header("Location:../../../views/pages/superadmin/tousActifs.php");
        } else {
            header("Location:../../../views/pages/superadmin/404.php");
            
        }
        
    

?>