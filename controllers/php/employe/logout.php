
<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Employe.class.php');

        $employe = new Employe();
        $employe->setLogin($_SESSION['employe']);
        $e = $employe->deconnecter();
        
        if($e) {
            session_destroy();
            header("Location:../../../views/pages/employe/login.php");
        }

?>