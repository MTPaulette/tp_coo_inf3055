
<?php
    $src = '../../public/superadmin/upload/';
  // var_dump( ($_SESSION['searchSuperAdmin']));
    echo "<p id='error'></p>";
    foreach($_SESSION['searchSuperAdmin'] as $search) {
       
        echo "<div class='mysearch-dark row no-gutters'>";
            echo "<div class='img'>";
                if(!$search['photo']) {
                    echo "<p class='pasDePhoto'><img src=''></p>";
                }else {
                    echo "<img src=".$src.$search['photo']." alt=''>";
                }
            echo "</div>";
            echo "<div class='card-body'>";


            echo "<h5 class='card-title'> Nom: ".$search['nom']."</h5>";
            echo "<p class='card-text'>Localisation: ".$search['localisation']."</p>";
            echo "<p class='card-text'>Directeur: ".$search['loginDirecteur']."</p>";
            echo "<p class='card-text'> <small class='text-muted'>Etat: ".$search['etat']."</small></p>";
            echo "<p class='card-text'> <small class='text-muted'> créé le: ".$search['createdAt']."</small></p>";

                /*modal pour la confirmation de l'activation */
                echo "<button type='button' class='btn btn-success' id='btn-activer' data-toggle='modal' data-target='#activer'>activer</button>
                <div class='modal' id='activer'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline' action='../../../controllers/php/superadmin/activerDirecteur.php'  method='post' name='rechercher'>";
                                echo "<input type='hidden' name='directeurSelectionne' value=".$search['nom'].">";
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
                echo "<button type='button' class='btn btn-secondary' id='btn-suspendre' data-toggle='modal' data-target='#suspendre'>suspendre</button>";
                echo "<div class='modal' id='suspendre'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline' action='../../../controllers/php/superadmin/suspendreDirecteur.php'  method='post'>";
                                echo "<input type='hidden' name='directeurSelectionne' value=".$search['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-secondary'>suspendre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";


                /*modal pour la confirmation de la suppression

                action='../../../controllers/php/superadmin/supprimerDirecteur.php'
                */
                echo "<button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#supprimer'>supprimer</button>
                <div class='modal' id='supprimer'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h5 class='modal-title attention'>ATTENTION!!!!</h5>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>
                                <span class='msg'>Vous vous apprettez à effectuer une operation sensible. Veuillez entrer votre mot de passe pour confirmer</span>
                                <form class='form-inline'   method='post'>";
                                echo "<input type='hidden' name='directeurSelectionne' id='hidden-delete-password' value=".$search['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='input-password-delete' name='password' placeholder=''>
                                        <button type='submit' id='btn-supprimer' class='btn btn-danger' onclick='supprimer(this)'>supprimer</button>
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