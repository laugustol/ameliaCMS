<?php
require 'language.php';
$organization = new \models\organizationModel;
$org = $organization->query();
if($org["skip_homepage"]){
    header("location: ".url_base."home/login");
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
<head>
	<link rel="shortcut icon" href="<?=url_base.(($org["idgallery_favicon"]!=0)? $org["src_favicon"] : 'img/favicon.png')?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$org["description"]?>">
    <meta name="author" content="">
    <title><?=$org["name_one"]?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=url_base?>themes/basica/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="<?=url_base?>themes/basica/css/main.css">
    <link href="<?=url_base?>themes/basica/css/custom.css" rel="stylesheet">
	<script src="//use.edgefonts.net/bebas-neue.js"></script>
    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=url_base?>themes/basica/css/icomoon-social.css">
	<link rel="stylesheet" href="<?=url_base?>themes/basica/css/font-awesome.min.css">
	<script src="<?=url_base?>themes/basica/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
    <body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <?php
                if(isset($_SESSION["iduser"])){
                    echo "<style>
                        .rotate-left{
                            position: fixed;
                            z-index: 1000;
                        }
                    </style>
                    <div class='rotate-left'>
                        <a href='".url_base."home/dashboard' class='btn btn-default' title='".theme_btn_rotate_left."'><i class='glyphicon glyphicon-repeat'></i></a>
                    </div>";
                }
            ?>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?=url_base.(($org["idgallery_favicon"]!=0)? $org["src_favicon"] : 'img/favicon.png')?>" style="width: 190px;height: 27px;" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                	<li><a href="<?=url_base?>"><?=theme_home?></a></li>
                    <?php
                        $page = new \models\pageModel();
                        $pages = $page->query_all_view_main();
                        foreach ($pages as $p) {
                            echo "<li><a href='".url_base."page/show/".$p["url"]."'>".$p["name"]."</a></li>";
                        }
                    ?>
                    <?=($org["login"]=="1")? "<li><a href='".url_base."home/login'>".theme_login."</a></li>" : ''?>
                </ul>
            </div>
        </div>
    </header>
        <?php require "themes/basica/".$view; ?>
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3><?=theme_concact?></h3>
		    			<p class="contact-us-details">
	        				<b><?=theme_concact_address?>:</b> <?=$org["address"]?><br/>
	        				<b><?=theme_concact_phone_one?>:</b> <?=$org["phone_one"]." / ".$org["phone_two"]?><br/>
	        				<?= (!empty($org["phone_three"]))? '<b>'.theme_concact_phone_two.':</b>'.$org["phone_three"].'<br/>' : '' ?>
	        				<b><?=theme_concact_email?>:</b> <a href="mailto:<?=$org["email"]?>"><?=$org["email"]?></a>
	        			</p>
		    		</div>
		    		<?php
                        $social_network = new \models\social_networkModel();
                        $social_networks = $social_network->query_all();
                        if(!empty($social_networks)){
                        	echo "<div class='col-footer col-md-4 col-xs-6'>";
                        		echo "<h3>".theme_our_social_networks."</h3>";
                        		echo "<div>";
		                        foreach ($social_networks as $k => $social) {
		                            echo "<li>
		                                    <a href='".((substr($social["url"], 0,7)!="http://" && substr($social["url"], 0,7)!="https://")? "http://".$social["url"] : $social["url"])."' target='_blank' title='".$social["name"]."'>
		                                        <span class='fa-stack fa-lg'>
		                                            <i class='fa fa-circle fa-stack-2x'></i>
		                                            <i class='".$social["class"]." ".$social["iname"]." fa-stack-1x fa-inverse'></i>
		                                        </span>
		                                    </a>
		                                </li>";
		                        }
		                        echo "</div>";
		                    echo "</div>";
                    	}
                    ?>
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3><?=theme_about_our_Company?></h3>
		    				<p><?=$org["description"]?></p>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright"><?=$org["rights"]?></div>
		    		</div>
		    	</div>
		    </div>
	    </div>
        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=url_base?>themes/basica/js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?=url_base?>themes/basica/js/bootstrap.min.js"></script>
		<!-- Scrolling Nav JavaScript -->
		<script src="<?=url_base?>themes/basica/js/jquery.easing.min.js"></script>
		<script src="<?=url_base?>themes/basica/js/scrolling-nav.js"></script>		

    </body>
</html>