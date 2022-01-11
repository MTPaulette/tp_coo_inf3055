<?php
    include_once('SuperAdmin.class.php');
    include_once('Directeur.class.php');
    include_once('Employe.class.php');
    include_once('Produit.class.php');
    //class Main{
        //$admin = new SuperAdmin();
        //$admin->setLogin('Adams');
        //$directeur  = new Directeur();
        //$directeur->setLogin('idr');
        //$directeur->deleteEmploye('pangolin');
        //$directeur->authentifier('idr','Alima');
        $produit  = new Produit();
        $produit->setNom('parat');
        $employe = new Employe();
        $employe->setLogin('pango');
        $valeur = $employe->vendre($produit,8);
        if($valeur){
            echo 'ventre reussi';
        }
        //$employe->authentifier('pango','1234');
        //$employe->addProduit('metro','soigne les maux de tête',100,10,'medoc');
        //$tab = array();
        //$tab = $employe->releveAjout('2012');
       // print_r($tab);
        //$employe->deconnecter();
        //$produit = array();
        //$produit = $employe->rechercher('para');
        //echo 'quantite = ';print_r($produit['quantite']);
        //$directeur->creerCompte('Nsangou','Admou',690264775,'yaounde','pango','1234');
       //$valeur =  $admin->reinitialiser('Adams','Alima');
       //$valeur2 = $admin->addDirecteur('Nsangou','Adamou',690264775,'yaounde','Adamou','Alima');
      //$valeur2 = $admin->creerPharmacie('maPharmacie2','simeyong',1,'disponible','Adams','Alima','nsagou','Adamou',690264775,'Yaounde','idr','Alima');

      /* if($valeur2){
           echo 'bonjour';
       } 
       else{
           echo 'idiot';
       }*/
    //}
?>