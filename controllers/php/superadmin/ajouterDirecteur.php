<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/SuperAdmin.class.php');


    if(isset($_POST['nomp'])and isset($_POST['localisation'])and isset($_POST['nomD'])and   isset($_POST['prenom'])and isset($_POST['telephone'])
    and isset($_POST['adresse'])and isset($_POST['login'])and isset($_POST['password'])and isset($_POST['titre']) and isset($_FILES['fic'])) {
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
        $superadmin->setLogin($_SESSION['superadmin']);
        $e = $superadmin->creerPharmacie($nomp, $localisation,$nomD, $prenom, $telephone,$adresse, $login, $motDePasse);

        if($e) {
            header("Location:../../../views/pages/superadmin/dashboard.php");
        } else {
            header("Location:../../../views/pages/superadmin/login.php");
        }

    

    //enregistrement de la photo d'une phramacie
    echo 
    /*
        $titre = $_POST['nomp'];
          $dossier = 'upload/';
          $extension = substr(strrchr($_FILES['fic']['name'], "."),1);
          $extensions = array('jpeg', 'png', 'jpg');
          //Ensuite on teste
          if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
          {
              echo 'Vous devez uploader un fichier de type png, jpeg ou jpg';
          }else {
            $fileNewName = $_SESSION['superadmin'].'_'.$titre.'.'.$extension;
            $fichier = $titre;
            if(move_uploaded_file($_FILES['fic']['tmp_name'], $dossier . $fileNewName)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {

              $ret        = false;
              $img_blob   = '';
              $img_taille = 0;
              $taille_max = 2000000000;
                $img_taille = $_FILES['fic']['size'];
                
                if ($img_taille > $taille_max) {
                  echo "Trop gros !";
                  return false;
                }
                
                  echo 'Upload effectué avec succès !';
                  echo $fileNewName;
                  //header("Location:http://localhost/tp_cms/html/dashboard/upload/".$fichier);
                  $src = 'upload/'.$fileNewName;
                  echo $src;
                  echo "'<img src='$src' >'";
                  modifierCours($titre,$contenu, $fileNewName);
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                  echo 'Echec de l\'upload !';
            }
          }
          */
    }
?>


<!--?php
/*
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require("../../php/traitement.php");
    if(isset($_POST['titre'])and isset($_POST['contenu'])and isset($_FILES['fic'])){

		  $titre   = $_POST['titre'];
      $contenu   = $_POST['contenu'];
      }
?>