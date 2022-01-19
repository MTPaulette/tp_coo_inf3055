<?php session_start() ;
	if(!$_SESSION['superadmin']) {
    	header("Location:login.php");
	}
	if(!$_SESSION['searchSuperAdmin']) {
    	header("Location:dashboard.php");
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
	<link rel="stylesheet" type="text/css" href="../../styles/css/searchComponent.css" />
    <link rel="stylesheet" href="../../styles/css/footer.css">
	
	<!--script src="../../plugins/jquery-3.3.1.slim.min.js"></script-->
	<script src="../../plugins/jquery1.1.min.js"></script>
	<script src="../../js/modernizr.custom.js"></script>
	<title>dashbord-adminDirecteur</title>
</head>
<body>
		<div class="">
			<?php include("../../components/superadmin/header.php"); ?> 

			<div id="ajaxSearch">
			<?php include("../../components/superadmin/searchComponent.php"); ?> 
			</div>


			<?php include("../../components/footer.html"); ?> 			
		<!-- /container -->

		<script>
			$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
		</script>
		<script src="../../../controllers/js/authentification.js"></script>
		<script src="../../../controllers/ajax/superadmin/search.js"></script>
    	<script src="../../plugins/bootstrap.bundle.min.js"></script>
		<script src="../../../controllers/ajax/superadmin/searchComponent.js"></script>
		<script src="../../../controllers/ajax/superadmin/supprimerDirecteur.js"></script>
		<!--script src="../../../controllers/ajax/superadmin/suspendreDirecteur.js"></script>
		<script src="../../../controllers/ajax/superadmin/activerDirecteur.js"></script-->

		<script src="../../js/classie.js"></script>
		<script src="../../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
</body>
</html>