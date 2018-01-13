<?php
	define('controller_base','homeController');
	define('version','AmeliaCMS V2');
	define('url_base','http://localhost/ameliacms/');
	define('DRIVER','mysql');
	define('HOST','localhost');
	define('PORT','3306');
	define('USER','root');
	define('PASSWORD','1234');
	define('PREFIX','acms_');
	define('DB_TEST','ameliacms_test');
	define('DB_PRODUCTION','ameliacms_production');

	ini_set('max_execution_time','60');
	require_once 'languages/es.php';
?>