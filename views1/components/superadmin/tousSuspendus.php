<?php
    $i = 1;

        echo "<div class='tableau'>
            <table class='table table-striped'>
                <thead>
                    <tr>";
                    echo "<th scope='col'>Numero</th>";
                    echo "<th scope='col'>Pharmacie</th>";
                    echo "<th scope='col'>Localisation</th>";
                    echo "<th scope='col'>Etat</th>";
                    echo "<th scope='col'>Directeur</th>";
                    echo "<th scope='col'></th>";
                echo "</tr>
                </thead>";
    foreach($_SESSION['tousSuspendus_superadmin'] as $ajout) {
            echo "<tbody>
                    <tr>";
                echo "<th scope='row'>".$i++."</th>";
                echo "<td>".$ajout["nom"]."</td>";
                echo "<td>".$ajout['localisation']."</td>";
                echo "<td>".$ajout['etat']."</td>";
                echo "<td>".$ajout['loginDirecteur']."</td>";
                echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#activer'>activer</button>
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
                                echo "<input type='hidden' name='directeurSelectionne' value=".$ajout['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-success'>activer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
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
                                <form class='form-inline' action='../../../controllers/php/superadmin/supprimerDirecteur.php'  method='post' name='rechercher'>";
                                echo "<input type='hidden' name='directeurSelectionne' value=".$ajout['nom'].">";
                                echo "<div class='form-group mx-sm-3 mb-2'>
                                        <input type='password' class='form-control' id='password' name='password' placeholder=''>
                                        <button type='submit' class='btn btn-danger'>supprimer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div></td>";
                echo "</tr>
                </tbody>";

    }
        echo "</table>
            </div>";
    

?>