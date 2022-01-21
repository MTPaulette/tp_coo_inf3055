<?php
    $i = 1;

    echo "<div class='tableau'>
    <table class='table table-striped'>
        <thead>
            <tr>";
            echo "<th scope='col'>Numero</th>";
            echo "<th scope='col'>Nom et prenom</th>";
            echo "<th scope='col'>Telephone</th>";
            echo "<th scope='col'>Adresse</th>";
            echo "<th scope='col'>Etat</th>";
            echo "<th scope='col'>Créé le</th>";
            echo "<th scope='col'>Directeur</th>";
            echo "<th scope='col'></th>";
        echo "</tr>
        </thead>";
foreach($_SESSION['tousActifs_directeur'] as $ajout) {
    echo "<tbody>
            <tr>";
        echo "<th scope='row'>".$i++."</th>";
        echo "<td>".$ajout["nom"]." ".$ajout["prenom"]."</td>";
        echo "<td>".$ajout['telephone']."</td>";
        echo "<td>".$ajout['adresse']."</td>";
        echo "<td>".$ajout['etat']."</td>";
        echo "<td>".$ajout['createdAt']."</td>";
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
                                <form class='form-inline' action='../../../controllers/php/directeur/activerEmploye.php'  method='post' name='rechercher'>";
                                echo "<input type='hidden' name='employeSelectionne' value=".$ajout['login'].">";
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
                                <form class='form-inline' action='../../../controllers/php/directeur/supprimerEmploye.php'  method='post' name='rechercher'>";
                                echo "<input type='hidden' name='employeSelectionne' value=".$ajout['login'].">";
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