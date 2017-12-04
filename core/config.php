<?php
	define('controller_base','homeController');
	define('version','AmeliaCMS V2');
	define('url_base','http://localhost/ameliacms/');
	define('url_api','http://192.168.1.100/ameliacms/');
	define('DRIVER','mysql');
	define('HOST','localhost');
	define('PORT','3306');
	define('USER','root');
	define('PASSWORD','1234');
	/*define('DRIVER','pgsql');
	define('HOST','localhost');
	define('PORT','5432');
	define('USER','postgres');
	define('PASSWORD','1234');*/

	define('PREFIX','acms_');
	define('DB_TEST','acms_test');
	define('DB_PRODUCTION','acms_production');

	ini_set('max_execution_time','60');
	require_once 'languages/es.php';
?>
