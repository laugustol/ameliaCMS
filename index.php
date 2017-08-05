<?php
	session_start();
	require 'core/config.php';
	require 'core/views.php';
	if((isset($_SESSION["environment"]))? $_SESSION["environment"]:0){
		error_reporting(E_ALL & ~E_NOTICE);
		ini_set("display_errors","on");
	}else{
		error_reporting(0);
		ini_set("display_errors","off");
	}
	spl_autoload_register(function($class){
		$ruta = str_replace("\\", "/", $class).'.php';
		require_once $ruta;
	});
	$u = explode('/',$_GET['url']);
	if(!empty($u[0])){
		if(is_readable('controllers/'.$u[0].'Controller.php')){
			define('controller',$u[0]);
			$controllers = 'controllers\\'.$u[0].'Controller'	;
			$controllers = new $controllers;
		}else{
			\controllers\homeController::e404();
			exit;
		}
	}else{
		$controllers = 'controllers'.'\\'.controller_base;
		$controllers = new $controllers;
	}
	$action = (!empty($u[1]))? $u[1] :'index';
	define("action",$action);
	if(method_exists($controllers, $action)){
		call_user_func( array($controllers, $action ),$u[2] );	
	}else{
		\controllers\homeController::e404();
		exit;
	}
?>