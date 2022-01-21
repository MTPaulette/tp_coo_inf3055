<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/InternauteInscript.class.php');

    //echo $_POST['search'];
    
    if(isset($_POST['search'])) {
        
        $search = $_POST['search'];
        $internaute = new InternauteInscript();
        //$internaute->setLogin($_SESSION['internaute']);
        $i = $internaute->recherche($search);
        //echo 'bjr';
        var_dump($i);

        if(!empty($i)) {
           // echo 'bonjour';
            $_SESSION['internauteRecherche'] = $i;
           header("Location:../../../views/pages/internaute/rechercherProduit.php");
        } else {
            //header("Location:../../../views/pages/internaute/404.php");
        }
    }

?>