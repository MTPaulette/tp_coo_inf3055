<?php session_start() ;
	if(!$_SESSION['directeur']) {
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
	<link rel="stylesheet" type="text/css" href="../../styles/css/search.css" />
    <link rel="stylesheet" href="../../styles/css/footer.css">
	
	
	<script src="../../js/modernizr.custom.js"></script>
	<title>Directeur</title>
</head>
<body>
		<div class="main">
			<?php include("../../components/directeur/header.php"); ?> 
			<?php include("../../components/directeur/releveAjout.php"); ?> 
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