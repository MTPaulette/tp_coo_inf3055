			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Recherche" type="search" class="gn-search">

									<!--form action="login.php?"  method="post" name="connexion"></form-->
									<a class="gn-icon gn-icon-search">
										<!--img src="../../plugins/icons/search.svg"-->
										<span>Recherche</span>
									</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-download">Gestion Employe</a>
									<ul class="gn-submenu">										
										<li><a class="gn-icon gn-icon-addE" href="../../pages/superadmin/ajouterDirecteur.php">Ajouter D</a></li>
										<li><a class="gn-icon gn-icon-deleteE">Supprimer D</a></li>
										<li><a class="gn-icon gn-icon-suspendE">Suspendre D</a></li>
										<li><a class="gn-icon gn-icon-restoreE">Restaurer D</a></li>
									</ul>
								</li>
								<li>
									<a class="gn-icon gn-icon-stat">Statistique</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Relevé des ventes</a></li>
										<li><a class="gn-icon gn-icon-pictures">Relevé des ajouts</a></li>
									</ul>
								</li>
								<li>
									<a class="gn-icon gn-icon-parameter">Parametre</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Modifier infos</a></li>
										<li><a class="gn-icon gn-icon-logout" href="../../pages/superadmin/logout.php">Deconnexion</a></li>
									</ul>
								</li>
								<li><a class="gn-icon gn-icon-help">Aide</a></li>
							</ul>
						</div><!-- /gn-scroller $_SESSION['superadmin']->getLogin()-->
					</nav>
				</li>
				<span class="welcome" style="margin-left: 37%"> <?php echo '<span> welcome '.$_SESSION['superadmin'].'</span>';?>  </span>
				
				<li><a href="">Pharmacie</a></li>
				
			</ul>

	<div class="research" style="">
		<form class="form-inline" action="../../../controllers/php/superadmin/rechercherDirecteur.php"  method="post" name="rechercher">
			<div class="form-group mx-sm-3 mb-2">
			<label for="search" class="sr-only">recherche</label>
			<input type="search" class="form-control" id="search" name="search" placeholder="rechercher">
			</div>
			<button type="submit" class="btn btn-primary mb-2 gn-icon-search"></button>
		</form>
	</div>