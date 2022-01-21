<?php

    $src = '../../public/employe/upload/';
    foreach($_SESSION['produitRecherche'] as $search) {

        echo "<div class='mysearch-dark row no-gutters'>";
            echo "<div class='img'>";
                if(!$search['photo']) {
                    echo "<p class='pasDePhoto'><img src=''></p>";
                }else {
                    echo "<img src=".$src.$search['photo']." alt=''>";
                }
            echo "</div>";
            echo "<div class='card-body'>";


            echo "<h5 class='card-title'> Nom: ".$search['nomp']."</h5>";
            echo "<p class='card-text'>Description: ".$search['description']."</p>";
            echo "<p class='card-text'>Prix: ".$search['prix']."Francs CFA</p>";
            echo "<p class='card-text'> <small class='text-muted'>Quantite en stock: ".$search['quantite']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'>Type du produit: ".$search['type']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'>Pharmacie: ".$search['nomPharmacie']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'> ajouté le: ".$search['createdAt']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'> modifié le: ".$search['modifiedAt']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'> par: ".$search['loginEmploye']."</small></p>";


                /*modal pour la confirmation de l'activation */
                
                echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#activer'>activer</button>
                <div class='modal' id='activer'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline' action='../../../controllers/php/employe/activerProduit.php'  method='post' name='rechercher'>";
                                echo "<input type='hidden' name='produitSelectionne' value=".$search['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-success'>activer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";

                /*modal pour la confirmation de la suspendre */
                
                echo "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#suspendre'>suspendre</button>";
                echo "<div class='modal' id='suspendre'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline' action='../../../controllers/php/employe/suspendreProduit.php'  method='post'>";
                                echo "<input type='hidden' name='produitSelectionne' value=".$search['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-secondary'>suspendre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";


                /*modal pour la confirmation de la suppression */
                
                echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#supprimer'>supprimer</button>
                <div class='modal' id='supprimer'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline' action='../../../controllers/php/employe/supprimerProduit.php'  method='post'>";
                                echo "<input type='hidden' name='produitSelectionne' value=".$search['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-danger'>supprimer</button>
                                    </div>
            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";

            echo "</div>";
            echo "</div>";

    }
?>