<?php
    include_once('SuperAdmin.class.php');
    include_once('Directeur.class.php');
    include_once('Employe.class.php');
    include_once('Produit.class.php');
    include_once('InternauteInscript.class.php');
    //class Main{
      $internaute = new InternauteInscript();
      //$internaute->creerCompte('Mabelle', 'Chris', 6909090, 'yaounde', 'mabelle', 'mabelle' );
      $internaute->setLogin('mabelle');
     $var = $internaute->recherche('diclo');
     print_r ($var); 
     // $admin = new SuperAdmin;
       //$admin->setLogin('Adams');
      // $valeur = $admin->recherchePharmacie('Pharmacie');
       //print_r ($valeur[1]);
       //$admin->creerPharmacie('maPharmacie2', 'simeyong2','Mohammed', 'Kabir', 690264775, 'douala', 'kabir', 'kabir')
       //$directeur = new Directeur();
       //$directeur->setLogin('pango');
      // $directeur->creerCompte('Ndang','Essi',690909090,'yaounde','essi2','essi');
       //$directeur->creerCompte('Paulette','Mayogue',690909090,'yaounde','yeki2','yeki');
       //$valeur = $directeur->reinitialiser('kabir','pango');
      // $valeur = $directeur->releveAjout('');
       //print_r($valeur);
       //print_r($valeur);
        $employe1 = new Employe();
       $employe2 = new Employe();
       $employe3 = new Employe();
       $employe4 = new Employe();
       $employe1->setLogin('essi');
       $employe2->setLogin('essi2');
       $employe3->setLogin('yeki');
       $employe4->setLogin('yeki2');

      //$var =  $employe2->reinitialiser('essi2','essi3');
      //print_r($var);
      /* $employe3->addProduit('parat', 'soigne', 100, 20, 'medoc');
       $employe2->addProduit('metro', 'soigne', 100, 20, 'medoc');
       $employe4->addProduit('diclo', 'soigne', 100, 20, 'medoc');*/
      // $employe1->authentifier('essi','essi');
      //$employe1->deconnecter();
    //}
?>