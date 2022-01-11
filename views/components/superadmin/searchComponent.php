
    <div class="search-dark">
        <div class="img">
            <img src="../../public/Folder.jpg" alt="">
        </div>
        <div class="card-body">
            <?php
                foreach($_SESSION['search'] as $search) {
                echo '<span> description '.var_dump(($search)).'</span></br></br></br></br>';}
            ?>
            <!--h5 class="card-title"><?php echo '<span> description '.$_SESSION['search']['localisation'].'</span>';?></h5-->
            <p class="card-text">Lorem ipsum dolor sit amet consectxercitationem dolores ipsa esse neque officia.</p>
            <a href="#" class="btn btn-success">acheter</a>
            <a href="#" class="btn btn-danger">supprimer</a>
        </div>
    </div>