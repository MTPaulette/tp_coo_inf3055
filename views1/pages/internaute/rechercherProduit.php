<?php session_start() ;
	if(!$_SESSION['internauteRecherche']) {
    	header("Location:Accueil.php");
	}
?>
<!DOCTYPE html>
<html  lang="fr">
<head><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/verification.js"></script>
</head>
<body>
		<div class="article">
			<?php include("../../components/internaute/header.php"); ?> 
			<?php include("../../components/internaute/rechercherProduit.php"); ?> 
			<?php include("../../components/internaute/footer.php"); ?> 			
		</div><!-- /container -->

		<script>
			$('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
		</script>
    	<script src="../../plugins/bootstrap.bundle.min.js"></script>

		<script src="../../js/classie.js"></script>
		<script src="../../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html