<?php
if(!isset($_SESSION["iduser"])){
	$_SESSION["msj"] = login_no_session_alert;
	header("location: ".url_base."home/login");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$organization = new \models\organizationModel;
		$org = $organization->query();
	?>
	<!--Favicon-->
	<link rel="shortcut icon" href="<?=url_base.(($org["idgallery_favicon"]!=0)? $org["src_favicon"] : 'img/icon.png')?>">
	<!--Jquery-->
	<script src="<?=url_base?>third_party/jquery/jquery-3.2.1.min.js"></script>
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/bootstrap/css/bootstrap.min.css">
	<script src="<?=url_base?>third_party/bootstrap/js/bootstrap.min.js"></script>
	<!--Font-awesome-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/font-awesome/css/font-awesome.min.css">
	<!--Pace.js-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/pace.js/themes/blue/pace-theme-minimal.css">
	<script src="<?=url_base?>third_party/pace.js/pace.min.js"></script>
	<!--Datatables-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/datatables/datatables.min.css">
	<script src="<?=url_base?>third_party/datatables/datatables.min.js"></script>
	<!--Bootstrap-select-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/bootstrap-select/css/bootstrap-select.min.css">
	<script src="<?=url_base?>third_party/bootstrap-select/js/bootstrap-select.min.js"></script>
	<!--Bootstrap-datepicker-->
	<link rel="stylesheet" type="text/css" href="<?=url_base?>third_party/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<script src="<?=url_base?>third_party/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?=url_base?>third_party/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
	<!--metisMenu-->
	<link rel="stylesheet" href="<?=url_base?>third_party/metismenu/dist/metisMenu.min.css">
	<script src="<?=url_base?>third_party/metismenu/dist/metisMenu.min.js"></script>
	<!--Toastr-->
	<link rel="stylesheet" href="<?=url_base?>third_party/toastr/build/toastr.min.css">
	<script src="<?=url_base?>third_party/toastr/build/toastr.min.js"></script>
	<!--Bootstrap Tour-->
	<link rel="stylesheet" href="<?=url_base?>third_party/bootstrap-tour/build/css/bootstrap-tour.min.css">
	<script src="<?=url_base?>third_party/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
	<!--Jquery-confirm-->
	<link rel="stylesheet" href="<?=url_base?>third_party/jquery-confirm/dist/jquery-confirm.min.css">
	<script src="<?=url_base?>third_party/jquery-confirm/dist/jquery-confirm.min.js"></script>
	<!--Jquery-UI-sortable-->
	<link rel="stylesheet" href="<?=url_base?>third_party/jquery-ui-1.12.1.custom/jquery-ui.min.css">
	<script src="<?=url_base?>third_party/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<!--Tinymce-->
	<script src="<?=url_base?>third_party/tinymce/tinymce.min.js"></script>
	<!--Jscolor-->
	<script src="<?=url_base?>third_party/jscolor/jscolor.min.js"></script>
	<!--STYLE-->
	<link rel="stylesheet" type="text/css" href="<?=($_SESSION["environment"])? url_base.'css/style.css': url_base.'css/style.min.css' ?>">
	<!--INIT-->
	<script src="<?=($_SESSION["environment"])? url_base.'js/init.js' : url_base.'js/init.min.js'?>"></script>
	<title><?=$org["name_one"]?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
</head>
<body>
	<div id="side-bar" class="side-bar">
		<div class="profile">
			<img src="<?=url_base.$_SESSION["image"]?>">
			<div><?=$_SESSION["pename_one"].' '.$_SESSION["pelast_name_one"]?><br><?=$_SESSION["cname"]?></div>
		</div>
		<div class="btns">
			<a href="<?=url_base?>home/dashboard" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_home?>"><i class="fa fa-home"></i></a>
			<a href="<?=url_base?>user/profile" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_user?>"><i class="fa fa-user"></i></a>
			<a href="<?=url_base?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_rotate_left?>"><i class="fa fa-rotate-left"></i></a>
			<a href="javascript:void(0);" id="ordered" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_list?>"><i class="glyphicon glyphicon-th-list"></i></a>
			<a href="void:javascript(0);" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=($_SESSION["environment"]=='1')? login_environment_option_test : login_environment_option_production?>"><i class="glyphicon glyphicon-globe"></i></a>
			<a  href="javascript:void(0);" id="help-tour" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_commenting?>"><i class="fa fa-commenting"></i></a>
			<!--<a href="" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_refresh?>"><i class="fa fa-refresh"></i></a>-->
			<a href="javascript:void(0);" id="logout" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?=btn_logout?>"><i class="fa fa-power-off"></i></a>
		</div>
		<?php
			$main = new \models\permissionModel;
			$arrmain=$main->generate_main();
			$str_main="<ul>";
			foreach ($arrmain as $k1 => $father) {
				$str_main .= "<li><a href='javascript:void(0);' style='color:#".$father["color"].";' id='".$father["idservice"]."'><i class='".$father["class"]." ".$father["iname"]."'></i> ".$father["name"]."";
				if(!empty($father["childrens"])){
					$str_main .= "<i class='fa arrow'></i></a><ul>";
					foreach ($father["childrens"] as $k2 => $child) {
						$str_main .= "<li><a href='".url_base.$child["url"]."' id='".$child["idservice"]."' style='color:#".$child["color"].";'><i class='".$child["class"]." ".$child["iname"]."'></i> ".$child["name"]."";
						if(!empty($child["secondschildrens"])){
							$str_main .= "<i class='fa arrow'></i></a><ul>";
							foreach ($child["secondschildrens"] as $k3 => $secondchild) {
								$str_main .= "<li><a href='".$secondchild["idservice"]."' id='' style='#color:".$secondchild["color"].";'><i class='".$secondchild["class"]." ".$secondchild["iname"]."'></i> <a href='".$secondchild["url"]."'>".$secondchild["name"]."</a></li>";
							}
							$str_main .= "</ul>";
						}else{
							$str_main .="</a>";
						}
						$str_main .="</li>";
					}
					$str_main .= "</ul>";
				}else{
					$str_main .= "</a>";
				}
				$str_main .="</li>";
			}
			$str_main.="</ul>";
			echo $str_main;
		?>
	</div>
	<div class="btn-side-bar" data-toggle="tooltip" data-placement="bottom" title="<?=btn_side_bar_title2?>">
		<a hrfe="javascript:void(0);"><i class="fa fa-bars fa-2x"></i></a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
					if(isset($_SESSION["msj"]))
						echo "<script>".$_SESSION["msj"]."</script>";
					unset($_SESSION["msj"]);
					require $view;
				?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		document.title = document.title+" <?=$_SESSION["title"]?>";
		var tour = new Tour({
			steps: [
				{
					element: ".profile",
					title: "<?=profile_title?>",
					content: "<?=profile_content?>"
				},
				{
					element: ".btns",
					title: "<?=btns_title?>",
					content: "<?=btns_content?>"
				},
				{
					element: ".btns .fa-home",
					title: "<?=home_title?>",
					content: "<?=home_content?>"
				},
				{
					element: ".btns .fa-user",
					title: "<?=user_title?>",
					content: "<?=user_content?>"
				},
				{
					element: ".btns .fa-rotate-left",
					title: "<?=rotate_left_title?>",
					content: "<?=rotate_left_content?>"
				},
				{
					element: ".btns .glyphicon-th-list",
					title: "<?=list_title?>",
					content: "<?=list_content?>"
				},
				{
					element: ".btns .glyphicon-globe",
					title: "<?=globe_title?>",
					content: "<?=globe_content?>"
				},
				{
					element: ".btns .fa-commenting",
					title: "<?=commenting_title?>",
					content: "<?=commenting_content?>"
				},
				{
					element: ".btns .fa-refresh",
					title: "<?=refresh_title?>",
					content: "<?=refresh_content?>"
				},
				{
					element: ".btns .fa-power-off",
					title: "<?=power_off_title?>",
					content: "<?=power_off_content?>"
				},
				{
					element: ".side-bar>ul",
					title: "<?=ul_title?>",
					content: "<?=ul_content?>"
				},
				{
					element: ".btn-side-bar",
					title: "<?=btn_side_bar_title?>",
					content: "<?=btn_side_bar_content?>"
				},
				{
					element: ".container-fluid>.row",
					title: "<?=row_title?>",
					content: "<?=row_content?>"
				}
			],
			template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn btn-xs btn-default' data-role='prev'>« Previo</button><!--<span data-role='separator'>|</span>--><button class='btn btn-xs btn-default' data-role='next'>Siguiente »</button><button class='btn btn-xs btn-default' data-role='end'>Salir</button></div></div>"
		});	
		localStorage.clear();
		tour.init();
		$("#help-tour").click(function(){
			tour.start();
			localStorage.clear();
		});
		$("#logout").click(function(){
			$.confirm({
			    title: '<?=btn_logout_confirm_title?>',
			    content: '<?=btn_logout_confirm_text?>',
			    draggable: true,
			    buttons: {
			        <?=btn_logout_btn_confirm?>:{				            
			            text: '<?=btn_logout_btn_confirm?>',
			            btnClass: 'btn-red',
			            keys: ['enter', 'shift'],
			            action: function(){
			            	$.dialog({title:'',content:'<?=btn_logout_alert?>'});
			            	setTimeout(function(){ window.location="<?=url_base?>home/logout"; }, 1000);
			            	    
			            }
			        },
			        <?=btn_logout_btn_cancel?>: function () { }
			    }
			});
		});
	});
</script>
<!--aaJS-->
<script src="<?=($_SESSION["environment"])? url_base.'js/aaJS_es.js' : url_base.'js/aaJS_es.min.js'?>"></script>
<script src="<?=($_SESSION["environment"])? url_base.'js/aaJS.js' : url_base.'js/aaJS.min.js'?>"></script>
<link rel="stylesheet" href="<?=($_SESSION["environment"])? url_base.'css/aaJS.css' : url_base.'css/aaJS.min.css'?>">
</html>