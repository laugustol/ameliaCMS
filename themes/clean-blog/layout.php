<?php
require 'language.php';
$organization = new \models\organizationModel;
$org = $organization->query();
if($org["skip_homepage"]){
    header("location: ".url_base."login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?=url_base.(($org["idgallery_favicon"]!=0)? $org["src_favicon"] : 'img/favicon.png')?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$org["description"]?>">
    <meta name="author" content="ameliaCMS">
    <meta name="generator" content="ameliaCMS">
    <title><?=$org["name_one"]?></title>
    <link href="<?=url_base?>themes/clean-blog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=url_base?>themes/clean-blog/css/clean-blog.min.css" rel="stylesheet">
    <link href="<?=url_base?>themes/clean-blog/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php
        if($org["idgallery_header"]!=0){
            echo "<style>
                .header{
                    height: 130px;
                    width: auto;
                    background-image: url('".url_base.$org["src_header"]."');
                    background-size: 100% 130px;
                    background-repeat: no-repeat;
                }
            </style>
            <div class='header'></div>";
        }
        if(isset($_SESSION["iduser"])){
            echo "<style>
                .rotate-left{
                    position: fixed;
                    z-index: 1000;
                }
            </style>
            <div class='rotate-left'>
                <a href='".url_base."dashboard' class='btn btn-default' title='".template_btn_rotate_left."'><i class='fa fa-rotate-left'></i></a>
            </div>";
        }
    ?>
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <?=template_main?> <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=url_base?>"><?=$org["name_one"]?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=url_base?>"><?=template_home?></a></li>
                    <?php
                        $page = new \models\pageModel();
                        $pages = $page->query_all();
                        foreach ($pages as $p) {
                            echo "<li><a href='".(($p["link"]=="0")? url_base."page/show/".$p["url"] : $p["url"])."'>".$p["name"]."</a></li>";
                        }
                    ?>
                    <?=($org["login"]=="1")? "<li><a href='".url_base."login'>".template_login."</a></li>" : ''?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="intro-header" style="background-image: url('<?=url_base?>img/4297.jpg');background-size:1349px 398px;width: 1348px;height: 398px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?=$org["name_two"]?></h1>
                        <!--<hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <?php require "themes/clean-blog/".$view; ?>
        </div>
    </div>
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <?php
                            $social_network = new \models\social_networkModel();
                            $social_networks = $social_network->query_all();
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
                        ?>
                    </ul>
                    <p class="copyright text-muted"><?=$org["rights"]?></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?=url_base?>themes/clean-blog/vendor/jquery/jquery.min.js"></script>
    <script src="<?=url_base?>themes/clean-blog/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=url_base?>themes/clean-blog/js/jqBootstrapValidation.js"></script>
    <script src="<?=url_base?>themes/clean-blog/js/contact_me.js"></script>
    <script src="<?=url_base?>themes/clean-blog/js/clean-blog.min.js"></script>
</body>
</html>
