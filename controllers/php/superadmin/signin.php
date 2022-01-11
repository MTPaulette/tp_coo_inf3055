
<?php

        ini_set('display_errors', 1);
        error_reporting(E_ALL|E_STRICT);
        require('../../../modeles/SuperAdmin.class.php');

        if(isset($_POST['nom'])and isset($_POST['prenom'])and isset($_POST['telephone'])
            and isset($_POST['adresse'])and isset($_POST['login'])and isset($_POST['password'])){
            $nom          = $_POST['nom'];
            $prenom          = $_POST['prenom'];
            $telephone          = $_POST['telephone'];
            $adresse        = $_POST['adresse'];
            $login        = $_POST['login'];
            $motDePasse     = $_POST['password'];

            
            $superAdmin = new SuperAdmin($nom, $prenom, $telephone,$adresse, $login, $motDePasse);
            $e = $superAdmin->enregistrer($nom, $prenom, $telephone,$adresse, $login, $motDePasse);

            if($e) {
				//redirection vers la page de connexion pour un directeur
                header("Location:../../../views/pages/superadmin/login.php");
				//header("Location:http://localhost/tp_inf3055_coo_dr_monthe/tp_coo_pharmacie/views/pages/directeur/login.php");
            }else {

				//on reste sur la page d'enregistrement				
                header("Location:../../../views/pages/superadmin/signin.php");

            }
        }
    ?>