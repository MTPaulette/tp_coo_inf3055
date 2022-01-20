<?php session_start() ;
	if(!$_SESSION['employe']) {
    	header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html  lang="fr">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/verification.js"></script>
	
	<script src="../../js/modernizr.custom.js"></script>
	<title>employe</title>
</head>
<body>
		<div class="main">
			<?php include("header.php"); ?> 
 
			<div class="main-content">
				<h1><span>DESOLE..... la recherche faite n'a pas été trouvée</span></h1>
			</div>
					
				<?php include("footer.php"); ?> 			
		</div><!-- /container -->

		<script src="../../js/classie.js"></script>
		<script src="../../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html