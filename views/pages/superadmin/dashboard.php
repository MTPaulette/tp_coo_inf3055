<?php session_start() ;
	if(!$_SESSION['superadmin']) {
    	header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html  lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../styles/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/css/global.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/css/menu.css" />
    <link rel="stylesheet" href="../../plugins/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../styles/css/ajouterProduit.css" />
	
	<script src="../../plugins/jquery1.1.min.js"></script>
	<!--script src="../../../controllers/ajax/superadmin/search.js"></script-->
    <link rel="stylesheet" href="../../styles/css/footer.css">
	
	
	<script src="../../js/modernizr.custom.js"></script>
	<title>dashbord-adminPharmacie</title>
</head>
<body>
		<div class="main">
			<?php include("../../components/superadmin/header.php"); ?> 
 

			<div class="main-content">
				<h1>Menu du site du Google Nexus 7<span>Menu barre lat�rale comme sur le site <a href="http://www.google.com/nexus/index.html">Google Nexus 7</a> en haut � gauche :-)</span></h1>
			</div>

			<div id="ajaxSearch">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione nesciunt molestiae ex similique. Facere magnam autem dolore perspiciatis perferendis pariatur neque numquam ex maxime, modi, sint sapiente? Eveniet, culpa similique.
			</div>
					
				<?php include("../../components/footer.html"); ?> 			
		</div>

    	<script src="../../plugins/bootstrap.bundle.min.js"></script>
		<script src="../../../controllers/ajax/superadmin/searchComponent.js"></script>
		
		<script src="../../js/classie.js"></script>
		<script src="../../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html>
