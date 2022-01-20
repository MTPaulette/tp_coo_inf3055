<?php

    $i = 1;

        echo "<div class='tableau'>
            <table class='table table-striped'>
                <thead>
                    <tr>";
                    echo "<th scope='col'>Numero</th>";
                    echo "<th scope='col'>NomEmploye</th>";
                    echo "<th scope='col'>PrenomEmploye</th>";
                    echo "<th scope='col'>Produit</th>";
                    echo "<th scope='col'>Prix</th>";
                    echo "<th scope='col'>Jour de la vente </th>";
                    echo "<th scope='col'>Heure de la vente</th>";
                echo "</tr>
                </thead>";
    foreach($_SESSION['releveVente'] as $vente) {
            echo "<tbody>
                    <tr>";
                echo "<th scope='row'>".$i++."</th>";
                echo "<td>".$vente[0]."</td>";
                echo "<td>".$vente[1]."</td>";
                echo "<td>".$vente[2]."</td>";

                echo "<td>".$vente[5]."</td>";
                
                echo "<td>".$vente[3]."</td>";
                echo "<td>".$vente[4]."</td>";
                echo "</tr>
                </tbody>";

    }
        echo "</table>
            </div>";
    

?>