<?php

    $i = 1;

        echo "<div class='tableau'>
            <table class='table table-striped'>
                <thead>
                    <tr>";
                    echo "<th scope='col'>Numero</th>";
                    echo "<th scope='col'>Produit</th>";

                    echo "<th scope='col'>Prix Total</th>";
                    echo "<th scope='col'>Quantite</th>";

                    echo "<th scope='col'>Jour de la vente </th>";
                    echo "<th scope='col'>Heure de la vente</th>";
                    echo "<th scope='col'>Employe</th>";
                    echo "<th scope='col'>Pharmacie</th>";
                echo "</tr>
                </thead>";
    foreach($_SESSION['releveVente'] as $vente) {
            echo "<tbody>
                    <tr>";
                echo "<th scope='row'>".$i++."</th>";
                echo "<td>".$vente['nomProduit']."</td>";
                echo "<td>".$vente['prix']." francs CFA</td>";
                echo "<td>".$vente['quantite']."</td>";

                echo "<td>".$vente['dateVente']."</td>";
                
                echo "<td>".$vente['heure']."</td>";
                echo "<td>".$vente["loginEmploye"]."</td>";
                echo "<td>".$vente['nomPharmacie']."</td>";
                echo "</tr>
                </tbody>";

    }
        echo "</table>
            </div>";
    

?>