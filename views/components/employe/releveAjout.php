<?php
    $i = 1;

        echo "<div class='tableau'>
            <table class='table table-striped'>
                <thead>
                    <tr>";
                    echo "<th scope='col'>Numero</th>";
                    echo "<th scope='col'>Produit</th>";
                    echo "<th scope='col'>Description</th>";
                    echo "<th scope='col'>Prix</th>";
                    echo "<th scope='col'>Type</th>";
                    echo "<th scope='col'>Ancienne qte</th>";
                    echo "<th scope='col'>Qte ajoutée</th>";
                    echo "<th scope='col'>Employe</th>";
                    echo "<th scope='col'>Pharmacie</th>";
                    echo "<th scope='col'>Date</th>";
                    echo "<th scope='col'>Heure</th>";
                echo "</tr>
                </thead>";
    foreach($_SESSION['releveAjout'] as $ajout) {
            echo "<tbody>
                    <tr>";
                echo "<th scope='row'>".$i++."</th>";
                echo "<td>".$ajout['nomp']."</td>";
                echo "<td>".$ajout['description']."</td>";
                echo "<td>".$ajout['prix']."francs CFA</td>";
                echo "<td>".$ajout['type']."</td>";
                echo "<td>".$ajout['ancienne_quantite']."</td>";
                echo "<td>".$ajout['quantite_ajouter']."</td>";
                echo "<td>".$ajout['loginEmploye']."</td>";
                echo "<td>".$ajout['nomPharmacie']."</td>";
                echo "<td>".$ajout['modifiedAt']."</td>";
                echo "<td>".$ajout['heure']."</td>";
                echo "</tr>
                </tbody>";

    }
        echo "</table>
            </div>";
    

?>