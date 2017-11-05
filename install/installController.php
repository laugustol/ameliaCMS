<?php
namespace install;
class installController{
	private $install;
	public function __construct(){
		
	}
	public function index(){
		view("install.php",4);
	}
	public function installation(){
		
		if(isset($_POST["root"])){
			
		$config = "<?php
	define('controller_base','homeController');
	define('version','AmeliaCMS V2');
	define('url_base','".$_POST["protocol"].$_POST["www"].$_POST["root"]."');
	define('DRIVER','".$_POST["drive_db"]."');
	define('HOST','".$_POST["host_db"]."');
	define('PORT','".$_POST["port_db"]."');
	define('USER','".$_POST["user_db"]."');
	define('PASSWORD','".$_POST["password_db"]."');
	define('PREFIX','".$_POST["prefix_db"]."');
	define('DB_TEST','".$_POST["name_test_db"]."');
	define('DB_PRODUCTION','".$_POST["name_production_db"]."');".PHP_EOL."
	ini_set('max_execution_time','60');
	require_once 'languages/".$_POST["language"].".php';
?>";
		$file = fopen("core/config.php","w");
		fwrite($file, $config);
		fclose($file);
		require 'core/config.php';
		$this->install = new installModel;
		$this->install->prefix=$_POST["prefix_db"];
		$this->install->db_name_test=$_POST["name_test_db"];
		$this->install->db_name_production=$_POST["name_production_db"];
		$this->install->user=$_POST["user"];
		$this->install->email=$_POST["email"];
		$this->install->password=$_POST["password"];
		
		if($_POST["drive_db"] == "mysql"){
			$this->install->mysql();
		}else if($_POST["drive_db"] == "pgsql"){
			$this->install->postgresql();
		}
		
		unset($_SESSION["environment"]);
		unlink("installModel.php");
		unlink("installController.php");
		unlink("install.php");
		header("location: ".url_base);
	}
		
	}
}
?>