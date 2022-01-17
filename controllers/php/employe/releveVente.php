<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Employe.class.php');

        $employe = new Employe();
        $employe->setLogin($_SESSION['employe']);
        $e = $employe->releveVente();
       // var_dump($e);

        if(!empty($e)) {
            $_SESSION['releveVente'] = $e;
            header("Location:../../../views/pages/employe/releveVente.php");
        } else {
            header("Location:../../../views/pages/employe/404.php");
        }

?>