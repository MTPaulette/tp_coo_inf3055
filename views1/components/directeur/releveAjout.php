<?php
    $i = 1;

        echo "<div class='tableau'>
            <table class='table table-striped'>
                <thead>
                    <tr>";
                    echo "<th scope='col'>Numero</th>";
                    echo "<th scope='col'>NomEmploye</th>";
                    echo "<th scope='col'>PrenomEmploye</th>";
                    echo "<th scope='col'>produit</th>";
                    echo "<th scope='col'>Ancienne qte</th>";
                    echo "<th scope='col'>Qte ajoutée</th>";
                    echo "<th scope='col'>Nouvelle qte</th>";
                    echo "<th scope='col'>Type</th>";
                    echo "<th scope='col'>Prix</th>";
                    echo "<th scope='col'>Date</th>";
                echo "</tr>
                </thead>";
    foreach($_SESSION['releveAjout'] as $ajout) {
            echo "<tbody>
                    <tr>";
                echo "<th scope='row'>".$i++."</th>";
                echo "<td>".$ajout[0]."</td>";
                echo "<td>".$ajout[1]."</td>";
                echo "<td>".$ajout[2]."</td>";
                echo "<td>".$ajout[3]."</td>";
                echo "<td>".$ajout[4]."</td>";
                echo "<td>".$ajout[5]."</td>";
                echo "<td>".$ajout[6]."</td>";
                echo "<td>".$ajout[7]."</td>";
                echo "<td>".$ajout[8]."</td>";
                echo "</tr>
                </tbody>";

    }
        echo "</table>
            </div>";
    

?>