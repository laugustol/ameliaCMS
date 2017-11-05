<?php require 'languages/'.((isset($_POST["language"]))? $_POST["language"].'.php' : 'es.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--Favicon-->
	<link rel="shortcut icon" href="img/favicon.png">
	<!--Jquery-->
	<script src="third_party/jquery/jquery-3.2.1.min.js"></script>
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="third_party/bootstrap/css/bootstrap.min.css">
	<script src="third_party/bootstrap/js/bootstrap.min.js"></script>
	<!--Font-awesome-->
	<link rel="stylesheet" type="text/css" href="third_party/font-awesome/css/font-awesome.min.css">
	<!--Pace.js-->
	<link rel="stylesheet" type="text/css" href="third_party/pace.js/themes/blue/pace-theme-minimal.css">
	<script src="third_party/pace.js/pace.min.js"></script>
	<!--Datatables-->
	<link rel="stylesheet" type="text/css" href="third_party/datatables/datatables.min.css">
	<script src="third_party/datatables/datatables.min.js"></script>
	<!--Bootstrap-select-->
	<link rel="stylesheet" type="text/css" href="third_party/bootstrap-select/css/bootstrap-select.min.css">
	<script src="third_party/bootstrap-select/js/bootstrap-select.min.js"></script>
	<!--Bootstrap-datepicker-->
	<link rel="stylesheet" type="text/css" href="third_party/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<script src="third_party/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="third_party/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
	<!--metisMenu-->
	<link rel="stylesheet" href="third_party/metismenu/dist/metisMenu.min.css">
	<script src="third_party/metismenu/dist/metisMenu.min.js"></script>
	<!--Toastr-->
	<link rel="stylesheet" href="third_party/toastr/build/toastr.min.css">
	<script src="third_party/toastr/build/toastr.min.js"></script>
	<!--STYLE-->
	<link rel="stylesheet" type="text/css" href="css/style.min.css">
	<!--INIT-->
	<script id="initjs" src="js/init.min.js"></script>
	<title>AmeliaCMS</title>
	<?php
	if(isset($_SESSION["msj"]))
		echo "<script>$(document).ready(function(){ ".$_SESSION["msj"]." });</script>";
		unset($_SESSION["msj"]);
	?>	
	<style>
		.container{	
			padding-top: 20px;
		}
		.info-text{
			font-size:25px;
		}
	</style>	
</head>
<body class="login">
	<div class="container">
		<div class="row">
			<div class="box">
				<div class="box-tools">
					<div class="box-tool-left">
						<a href="ome/dashboard"><?=install_installation?></a> 
					</div>
					<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
				</div>
				<div class="box-container">
					<style>
						.nav{
							margin-bottom: 20px;
						}
						.nav-tabs > li > a{
							border-radius:0 !important;
						}
					</style>
					<ul class="nav nav-tabs nav-justified">
					  <li id="li_init" class="active"><a href="#init" data-toggle="tab"><?=install_tab_one?></a></li>
					  <li id="li_db"><a href="#db" data-toggle="tab"><?=install_tab_two?></a></li>
					  <li id="li_user"><a href="#user" data-toggle="tab"><?=install_tab_three?></a></li>
					</ul>
					<form name="frm" action="install/installation" method="POST" class='form-horizontal'>
						<input type="hidden" name="event" id="event">
						<div class="tab-content">
							<div id="init" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_language?>:</label>
											<div class="col-md-6">
												<select name="language" id="language" aajs="change{languagex();}" class="width-full" data-toggle="tooltip" title="<?=install_language_title?>">
													<option value="<?=install_language_option_es_value?>"><?=install_language_option_es?></option>
													<option value="<?=install_language_option_en_value?>"><?=install_language_option_en?></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_protocol?>:</label>
											<div class="col-md-2">
												<select name="protocol" id="protocol" class="width-full" data-toggle="tooltip" title="<?=install_protocol_title?>">
													<option value="http://">http://</option>
													<option value="https://">https://</option>
												</select>
											</div>
											
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_www?>:</label>
											<div class="col-md-2">
												<select name="www" id="www" class="width-full" data-toggle="tooltip" title="<?=install_www_title?>">
													<option value=""><?=no?></option>
													<option value="www"><?=yes?></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_path_root?>:</label>
											<div class="col-md-6">
												<input type="text" name="root" id="root" value="<?=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]?>" readonly class="width-full" data-toggle="tooltip" title="<?=install_path_root_title?>" placeholder="<?=install_path_root_placeholder?>">
											</div>
										</div>
									</div>
									<div class="col-md-3 info-text"><?=install_description_init?></div>
									<div class="col-md-3" style="margin-top: 30px;">
										<img src="img/ameliacms.png" alt="" style="width:250px;">
									</div>
								</div>
							</div>
							<div id="db" class="tab-pane fade">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_drive_db?>:</label>
											<div class="col-md-6">
												<select name="drive_db" id="drive_db" class="width-full" aajs="change{portx();}" data-toggle="tooltip" title="<?=install_drive_db_title?>">
													<option value="<?=install_drive_option_mysql_value_db?>"><?=install_drive_option_mysql_db?></option>
													<option value="<?=install_drive_option_postgresql_value_db?>"><?=install_drive_option_postgresql_db?></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_host_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="host_db" id="host_db" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_host_db_title?>" placeholder="<?=install_host_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_port_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="port_db" id="port_db" value="3306" aajs="required,number" class="width-full" data-toggle="tooltip" title="<?=install_port_db_title?>" placeholder="<?=install_port_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_user_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="user_db" id="user_db" value="root" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_user_db_title?>" placeholder="<?=install_user_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_password_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="password_db" id="password_db" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_password_db_title?>" placeholder="<?=install_password_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_prefix_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="prefix_db" id="prefix_db" aajs="required" value="acms_" class="width-full" data-toggle="tooltip" title="<?=install_prefix_db_title?>" placeholder="<?=install_prefix_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_name_test_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="name_test_db" id="name_test_db" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_name_test_db_title?>" placeholder="<?=install_name_test_db_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_name_production_db?>:</label>
											<div class="col-md-6">
												<input type="text" name="name_production_db" id="name_production_db" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_name_production_db_title?>" placeholder="<?=install_name_production_db_placeholder?>">
											</div>
										</div>	
									</div>
									<div class="col-md-3 info-text"><?=install_description_db?></div>
									<div class="col-md-3" style="margin-top: 30px;">
										<img src="img/bd.png" alt="" style="width:250px;">
									</div>
								</div>
							</div>
							<div id="user" class="tab-pane fade">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_user?>:</label>
											<div class="col-md-6">
												<input type="text" name="user" id="user" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_user_title?>" placeholder="<?=install_user_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_email?>:</label>
											<div class="col-md-6">
												<input type="text" name="email" id="email" aajs="required,email" class="width-full" data-toggle="tooltip" title="<?=install_email_title?>" placeholder="<?=install_email_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_password?>:</label>
											<div class="col-md-6">
												<input type="text" name="password" id="password" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_password_title?>" placeholder="<?=install_password_placeholder?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-6 text-right"><?=install_confirm_password?>:</label>
											<div class="col-md-6">
												<input type="text" name="confirm_password" id="confirm_password" aajs="required" class="width-full" data-toggle="tooltip" title="<?=install_confirm_password_title?>" placeholder="<?=install_confirm_password_placeholder?>">
											</div>
										</div>
									</div>
									<div class="col-md-3 info-text"><?=install_description_user?></div>
									<div class="col-md-3" style="margin-top: 30px;">
										<img src="img/male.png" alt="" style="width:250px;">
									</div>
								</div>
							</div>
							<div class='form-group'>
								<div class='col-md-2 col-md-offset-5'>
									<button class='btn1' aajs="send" ><?=profile_send?></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<script>
			function languagex(){
				document.frm.action = "";
				document.frm.submit();
			}
			function portx(){
				if($("#drive_db").val() == "mysql"){
					$("#port_db").val("3306");
					$("#user_db").val("root");
				}else{
					$("#port_db").val("5432");
					$("#user_db").val("postgres");
				}
			}
			</script>
		</div>
	</div>
</body>
<!--aaJS-->
<script src="js/aaJS_es.min.js"></script>
<script src="js/aaJS.js"></script>
<link rel="stylesheet" href="css/aaJS.min.css">
</html>