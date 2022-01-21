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
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"-->
	<link rel="stylesheet" type="text/css" href="../../styles/css/searchComponent.css" />
    <link rel="stylesheet" href="../../styles/css/footer.css">
	
	
	<script src="../../js/modernizr.custom.js"></script>
	<title>dashbord-adminPharmacie</title>
</head>
<body>
		<div class="main">
			<?php include("../../components/superadmin/header.php"); ?> 

			<div class="main-content">
				<h1 style='color: red;'>Une erreur s'est produite. 
					<span> Veuillez verifier une des actions suivantes:
						
					</span>
				</h1>
				<h5 style='color: #74818e;'>
				<ol>
					<li>saisir le bon mot de passe</li>
					<li>saisir le bon login</li>
					<li>verifier changer de login au moment de la creation en cas de doublon</li>
					<li>la photo doit avoir l'une des extensions suivantes: png, jpg, jpeg, PNG, JPG et JPEG</li>
					<li>une erreur de connexion à la base de données</li>
				</ol></h5>
			</div>
		
			
				<?php include("../../components/footer.html"); ?> 			
		</div><!-- /container -->

		<script src="../../plugins/jquery-3.3.1.slim.min.js"></script>
    	<script src="../../plugins/bootstrap.bundle.min.js"></script>
		<script src="../../js/classie.js"></script>
		<script src="../../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html