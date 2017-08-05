<!DOCTYPE html>
<html lang="en">
<head>
	<!--Favicon-->
	<link rel="shortcut icon" href="<?=url_base?>/logo.png">
	<!--Jquery-->
	<script src="<?=url_base?>/third_party/jquery/jquery-3.2.1.min.js"></script>
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/bootstrap/css/bootstrap.min.css">
	<script src="<?=url_base?>/third_party/bootstrap/js/bootstrap.min.js"></script>
	<!--Font-awesome-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/font-awesome/css/font-awesome.min.css">
	<!--Pace.js-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/pace.js/themes/blue/pace-theme-minimal.css">
	<script src="<?=url_base?>/third_party/pace.js/pace.min.js"></script>
	<!--Datatables-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/datatables/datatables.min.css">
	<script src="<?=url_base?>/third_party/datatables/datatables.min.js"></script>
	<!--Bootstrap-select-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/bootstrap-select/css/bootstrap-select.min.css">
	<script src="<?=url_base?>/third_party/bootstrap-select/js/bootstrap-select.min.js"></script>
	<!--Bootstrap-datepicker-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>/third_party/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<script src="<?=url_base?>/third_party/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?=url_base?>/third_party/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
	<!--metisMenu-->
	<link rel="stylesheet" href="<?=url_base?>/third_party/metismenu/dist/metisMenu.min.css">
	<script src="<?=url_base?>/third_party/metismenu/dist/metisMenu.min.js"></script>
	<!--Toastr-->
	<link rel="stylesheet" href="<?=url_base?>/third_party/toastr/build/toastr.min.css">
	<script src="<?=url_base?>/third_party/toastr/build/toastr.min.js"></script>
	<!--STYLE-->
	<link rel="stylesheet" type="text/css" href="<?=($_SESSION["environment"])? url_base.'css/style.css': url_base.'css/style.min.css' ?>">
	<!--INIT-->
	<script src="<?=($_SESSION["environment"])? url_base.'js/init.js' : url_base.'js/init.min.js'?>"></script>
	<?php
	if(isset($_SESSION["msj"]))
		echo "<script>$(document).ready(function(){ ".$_SESSION["msj"]." });</script>";
		unset($_SESSION["msj"]);
	?>	
	<style>
		.container{	
			padding-top: 20px;
		}		
	</style>	
</head>
<body class="login">
	<div class="container">
		<div class="row">
			<?php
				require $view;
			?>
		</div>
	</div>
</body>
</html>