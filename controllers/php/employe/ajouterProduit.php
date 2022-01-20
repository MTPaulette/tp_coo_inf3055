<?php session_start() ?>
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require('../../../modeles/classes/Employe.class.php');

    //var_dump($_FILES['file']);

    if(isset($_POST['nom'])and isset($_POST['prix']) and isset($_POST['quantite'])
    and isset($_POST['type'])and isset($_POST['description'])and isset($_FILES['file'])) {

        $nom          = $_POST['nom'];
        $prix          = $_POST['prix'];
        $quantite          = $_POST['quantite'];
        $type        = $_POST['type'];
        $description        = $_POST['description'];  

        //enregistrement de la photo d'une phramacie
    
        $titre = $_POST['nom'];
        $dossier = './../../../views/public/employe/upload/';
        /*$dossier = './upload/';*/
        $extension = substr(strrchr($_FILES['file']['name'], "."),1);
        $extensions = array('jpeg', 'png', 'jpg', 'JPEG', 'PNG', 'JPG');
          //Ensuite on teste
          if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
          {
              echo 'Vous devez uploader un fichier de type png, jpeg ou jpg';
              $successUpload = false;
          }else {
            $fileNewName = $_SESSION['employe'].'_'.$titre.'.'.$extension;
            $fichier = $titre;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fileNewName)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {

              $ret        = false;
              $img_blob   = '';
              $img_taille = 0;
              $taille_max = 2000000000;
                $img_taille = $_FILES['file']['size'];
                
                if ($img_taille > $taille_max) {
                  echo "Trop gros !";
                  $successUpload = false;
                }
                
                  echo 'Upload effectué avec succès !';
                  echo $fileNewName;
                  //header("Location:http://localhost/tp_cms/html/dashboard/upload/".$fichier);
                  //$src = './../../../views/public/employe/upload/'.$fileNewName;
                $successUpload = true;
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                  echo 'Echec de l\'upload !';
                  $successUpload = false;
            }
          }

        //ajout du employe dans la base de données
      
        if($successUpload) {
          $employe = new Employe();
          $employe->setLogin($_SESSION['employe']);
          $e = $employe->ajouterProduit($nom, $description, $prix,$fileNewName, $quantite, $type);
         // var_dump($e);
      }
      
      if($e) {
          header("Location:../../../views/pages/employe/dashboard.php");
      } 
      else {
          header("Location:../../../views/pages/employe/erreur.php");
      }
      
    }
?>

