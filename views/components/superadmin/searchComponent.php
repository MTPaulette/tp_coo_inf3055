
<?php
    $src = '../../public/superadmin/upload/';
    foreach($_SESSION['searchSuperAdmin'] as $search) {
        echo "<div class='mysearch-dark'>";
            echo "<div class='img'>";
                /*echo "<p class='icon'><img src='./../../plugins/icons/person-circle.svg'></p>";*/
                if(!$search['photo']) {
                    echo "<p class='pasDePhoto'><img src=''></p>";
                }else {
                    echo "<img src=".$src.$search['photo']." alt=''>";
                }
            echo "</div>";
            echo "<div class='mycard-body'>";
                echo '<h5> Nom: '.$search['nom'].'</h5>';
                echo "<h5 class='mycard-title'>Localisation: ".$search['localisation']."</h5>";
                echo "<h5 class='mycard-title'>Directeur: ".$search['loginDirecteur']."</h5>";
                echo "<h5 class='mycard-title'><span> creé le: ".$search['createdAt']."</span></h5>";


                /*modal pour la confirmation de la confirmation */
                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>open modal</button>
                <div class='modal' id='myModal'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
            
                            <div class='modal-header'>
                                <h4 class='modal-title'>modal heading</h4>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
            
                            <div class='modal-body'>modal body</div>
            
                            <div class='modal-footer'>
                                <button type='button' class='btn-danger' data-dismiss='modal'>close</button>
                            </div>
                        </div>
                    </div>
                </div>";

    }
?>