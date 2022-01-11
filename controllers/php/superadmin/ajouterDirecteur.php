<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');


    if(isset($_POST['nomp'])and isset($_POST['localisation'])and isset($_POST['nomD'])and   isset($_POST['prenom'])and isset($_POST['telephone'])
    and isset($_POST['adresse'])and isset($_POST['login'])and isset($_POST['password'])) {
    $nomp          = $_POST['nomp'];
    $localisation          = $_POST['localisation'];
    $nomD          = $_POST['nomD'];
    $prenom          = $_POST['prenom'];
    $telephone          = $_POST['telephone'];
    $adresse        = $_POST['adresse'];
    $login        = $_POST['login'];
    $motDePasse     = $_POST['password'];

    //$directeur = new Directeur($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
    $superadmin = new SuperAdmin();
    $e = $directeur->creerPharmacie($nomp, $localisation,$nomD, $prenom, $telephone,$adresse, $login, $motDePasse);
   // public function creerPharmacie($nom, $localisation, $loginS, $passwordS,$nomD, $prenomD, $telD, $adresseD, $loginD, $passwordD){

    var_dump($e) ;
        
        if($e) {
            $_SESSION['superadmin'] = $login;
            header("Location:../../../views/pages/superadmin/dashboard.php");
        } else {
            header("Location:../../../views/pages/superadmin/login.php");
        }
        

    }

?>