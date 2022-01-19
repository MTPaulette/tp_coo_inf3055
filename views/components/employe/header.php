<div class="main">
	<div>
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Recherche" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search">
										<!--img src="../../plugins/icons/search.svg"-->
										<span>Recherche</span>
									</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-download">Gestion des Produits</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-addE" href="../../pages/employe/ajouterProduit.php">Ajouter P</a></li>
										<li><a class="gn-icon gn-icon-addE" href="../../pages/employe/vendreProduit.php">Vendre P</a></li>
										<li><a class="gn-icon gn-icon-deleteE">Supprimer p</a></li>
										<li><a class="gn-icon gn-icon-suspendE">Suspendre E</a></li>
										<li><a class="gn-icon gn-icon-restoreE">Restaurer E</a></li>
									</ul>
								</li>
								<li>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-listol" href="../../../controllers/php/employe/releveVente.php">Relevé des ventes</a></li>
										<li><a class="gn-icon gn-icon-liststars"  href="../../../controllers/php/employe/releveAjout.php">Relevé des ajouts</a></li>
									</ul>
								</li>
								<li>
									<a class="gn-icon gn-icon-parameter">Parametre</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-logout" href="../../../controllers/php/employe/logout.php">Deconnexion</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<span class="welcome" style="margin-left: 37%"> <?php echo '<span> Hello '.$_SESSION['employe'].'</span>';?>  </span>
				
				<li><a href="../../pages/internaute/Accueil.html">Pharmacie</a></li>
			</ul>
			
			<!--ul >
				<form class="form-inline" action="../../../controllers/php/employe/rechercherProduit.php"  method="post" name="rechercher">
					<div class="form-group mx-sm-3 mb-2">
					<label for="search" class="sr-only">recherche</label>
					<input type="search" class="form-control" id="search" name="search" placeholder="rechercher">
					</div>
					<button type="submit" class="btn btn-primary mb-2 gn-icon-search"></button>
				</form>

			</ul--></div>
		</div>

<div class="research" style="">
	<div class="searchBlock">
		<form class="form-inline" action="../../../controllers/php/employe/rechercherProduit.php"  method="post" name="rechercher">
			<div class="form-group mx-sm-3 mb-2">
			<label for="search" class="sr-only">recherche</label>
			<input type="search" class="form-control" id="search" name="search" placeholder="rechercher">
			</div>
			<button type="submit" class="btn btn-primary mb-2 gn-icon-search"></button>
		</form>
	</div>
</div>