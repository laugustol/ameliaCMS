<?php
	session_start();
	if(is_readable('core/config.php')){
		require 'core/config.php';
	}
	require 'core/views.php';
	if((isset($_SESSION["environment"]))? $_SESSION["environment"]:1){
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
	require_once("core/routes.php");
?>
